<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toppings;
use App\Engagement;
use DB;
use session;

class ToppingController extends Controller
{
    public function index()
    {
        $all_topping_info=DB::table('toppings')->get();
        return view('admin.all_toppings')->with('all_topping_info', $all_topping_info);
    }

    public function add_topping()
    {
        return view('admin.add_toppings');
    }

    public function store_topping(Request $request)
    {
        $data = new Toppings;
        $data->topping_name =   $request['topping_name'];
        $data->topping_type =   $request['topping_type'];
        $data->topping_price =  $request['topping_price'];
        $data->topping_status = $request['topping_status'];

        $image = $request->file('topping_image');
        if($image)
        {
            $image_name = time();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'topping_image/';
            $image_url=$upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success){
                $data->topping_image= $image_url;
                $data->save();
                //session()->put('message', "Product is added successfully");
                return redirect('/topping');

            }
        }
    }

    public function inactive_topping($topping_id)
    {
        //echo "$category_id";
        DB::table('toppings')->where('topping_id', $topping_id)->update(['topping_status'=>'off']);
        return redirect('/topping');


    }
    public function active_topping($topping_id)
    {
        //echo "$category_id";
        DB::table('toppings')->where('topping_id', $topping_id)->update(['topping_status'=>'on']);
        return redirect('/topping');
    }

    public function delete_topping($topping_id)
    {

        DB::table('toppings')->where('topping_id', $topping_id)->delete();
        //session()->put('message', "Category is deleted successfully");
        return redirect('/topping');
    }


}
