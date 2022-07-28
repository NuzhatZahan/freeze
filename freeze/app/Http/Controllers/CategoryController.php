<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Engagement;
use DB;
use session;



class CategoryController extends Controller
{
    public function index()
    {
        $all_category_info=DB::table('category')
                            ->get();
        return view('admin.all_category')->with('all_category_info', $all_category_info);
    }

    public function add_category()
    {
        return view('admin.add_category');
    }
    public function store_category(Request $request)
    {
        $data = new Category;
        $data->category_name = $request['category_name'];
        $data->category_description = $request['category_description'];
        $data->category_status = $request['category_status'];

        $image = $request->file('category_image');
        if($image)
        {
            $image_name = time();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'category_image/';
            $image_url=$upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success){
                $data->category_image= $image_url;
                $data->save();
                //session()->put('message', "Product is added successfully");
                return redirect('/category');

            }
        }
    }

    public function inactive_category($category_id)
    {
        //echo "$category_id";
        DB::table('category')->where('category_id', $category_id)->update(['category_status'=>'off']);
        return redirect('/category');


    }
    public function active_category($category_id)
    {
        //echo "$category_id";
        DB::table('category')->where('category_id', $category_id)->update(['category_status'=>'on']);
        return redirect('/category');
    }

    public function delete_category($category_id)
    {

        DB::table('category')->where('category_id', $category_id)->delete();
        //session()->put('message', "Category is deleted successfully");
        return redirect('/category');
    }

}
