<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flavours;
use App\Engagement;
use DB;
use session;

class FlavourController extends Controller
{
    public function index()
    {
        $all_flavour_info=DB::table('flavours')->get();
        return view('admin.all_flavours')->with('all_flavour_info', $all_flavour_info);
    }

    public function add_flavour()
    {
        return view('admin.add_flavours');
    }

    public function store_flavour(Request $request)
    {
        $data = new Flavours;
        $data->flavour_name = $request['flavour_name'];
        $data->flavour_type = $request['flavour_type'];
        $data->flavour_price = $request['flavour_price'];
        $data->flavour_status = $request['flavour_status'];
        $data->category_id = $request['category_id'];

        $image = $request->file('flavour_image');
        if($image)
        {
            $image_name = time();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'flavour_image/';
            $image_url=$upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success){
                $data->flavour_image= $image_url;
                $data->save();
                //session()->put('message', "Product is added successfully");
                return redirect('/flavour');

            }
        }
    }

    public function inactive_flavour($flavour_id)
    {
        //echo "$category_id";
        DB::table('flavours')->where('flavour_id', $flavour_id)->update(['flavour_status'=>'off']);
        return redirect('/flavour');


    }
    public function active_flavour($flavour_id)
    {
        //echo "$category_id";
        DB::table('flavours')->where('flavour_id', $flavour_id)->update(['flavour_status'=>'on']);
        return redirect('/flavour');

    }

    public function delete_flavour($flavour_id)
    {

        DB::table('flavours')->where('flavour_id', $flavour_id)->delete();
        //session()->put('message', "Category is deleted successfully");
        return redirect('/flavour');
    }
}
