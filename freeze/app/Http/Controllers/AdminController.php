<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use session;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin_login');
    }
    public function signup()
    {
        return view('admin.admin_signup');
    }
    public function admin_register(Request $request)
    {
        $data = new Admin;
        $data->admin_name = $request['admin_name'];
        $data->admin_email = $request['admin_email'];
        $data->admin_password = $request['admin_password'];
        $data->save();

        return redirect('admin');
    }

    public function admin_login(Request $request)
    {
        $admin_email = $request['admin_email'];
        $admin_password = $request['admin_password'];
        $result = DB::table('admin')->where('admin_email', $admin_email)
                                    ->where('admin_password', $admin_password)
                                    ->first();
        if($result)
        {
            session()->put('admin_name', $result->admin_name);
            session()->put('admin_id', $result->admin_id);
            return redirect('dashboard');
        }
        else
        {
            session()->put('message', 'Email or password is not valid');
            return redirect('admin');
        }


    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
