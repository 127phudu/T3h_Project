<?php

namespace App\Http\Controllers;

use App\Model\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    /**
     * AdminController constructor
     */
    public function __construct()
    {
        $this->middleware('auth:admin')->only('index');
    }

    public function index() {
        return view('admin.dashboard');
    }

    //view đăng ký
    public function create() {
        return view('admin.auth.register');
    }

    //lưu thông tin đăng ký
    public function store(Request $request) {
        // validate dữ liệu
        $this->validate($request, array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ));

        // khởi tạo model để lưu
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->save();

        // @todo
        return redirect()->route('admin.auth.showLoginForm');
    }
}
