<?php

namespace App\Http\Controllers\Auth\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:seller')->except('logout');

    }

    /**
     * view đăng nhập
     */
    public function showLoginForm() {
        return view('seller.auth.login');
    }

    /**
     * đăng nhập
     */
    public function login(Request $request) {
        //validate dữ liệu
        $this->validate($request, array(
            'email' => 'required|email',
            'password' => 'required|min:6'
        ));

        //đăng nhập
        if (Auth::guard('seller')->attempt(
            ['email' => $request->email, 'password' => $request->password], $request->remember
        )) {
            //nếu đăng nhập thành công thì chuyển về dashboard của seller
            return redirect()->intended(route('seller.dashboard'));
        }

        //nếu đăng nhập thất bại thì quay trở về form đăng nhập với giá trị cũ
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    /**
     * đăng xuất
     */
    public function logout() {
        Auth::guard('seller')->logout();

        return redirect()->route('seller.auth.login');
    }
}
