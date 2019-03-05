<?php

namespace App\Http\Controllers;

use App\Model\Shipper;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:shipper')->only('index');
    }

    public function index() {
        return view('shipper.dashboard');
    }

    //view đăng ký
    public function create() {
        return view('shipper.auth.register');
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
        $shipper = new Shipper();
        $shipper->name = $request->name;
        $shipper->email = $request->email;
        $shipper->password = bcrypt($request->password);
        $shipper->save();

        // @todo
        return redirect()->route('shipper.auth.showLoginForm');
    }
}
