<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopPaymentController extends Controller
{
    //
    public  function index() {
        return view('frontend.payment.index');
    }
}
