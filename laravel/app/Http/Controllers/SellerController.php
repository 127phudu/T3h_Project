<?php

namespace App\Http\Controllers;

use App\Model\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:seller')->only('index');
    }

    public function index() {
        return view('seller.dashboard');
    }

    //view đăng ký
    public function create() {
        return view('seller.auth.register');
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
        $seller = new Seller();
        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->password = bcrypt($request->password);
        $seller->save();

        // @todo
        return redirect()->route('seller.auth.showLoginForm');
    }
}
