<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Front\ShopProduct;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function newPrize () {
        $id = Auth::id();

        $new_orders = DB::table('orders')
                    ->where('user_id', $id)
                    ->where('status', '1')
                    ->get();

        $products = array();
        foreach ($new_orders as $new_order) {
            $products[$new_order->id] = ShopProduct::find($new_order->product_id);
        }
        $data = array();
        $data['products'] = $products;

        return view('frontend.buyer.prize', $data);
    }

    public function bidding () {
        $id = Auth::id();
        $data = array();

        $products_id = DB::table('bid_history')
            ->select('product_id')
            ->groupBy('product_id')
            ->where('bidder_id', $id)
            ->get();


        $products = array();
        $bidders = array();
        foreach ($products_id as $key => $value) {
            $products[$key] = ShopProduct::find($value->product_id);
            $bidders[$key] = User::find($products[$key]->user_id);
        }

        $data['products'] = $products;
        $data['bidders'] = $bidders;

        return view('frontend.buyer.bidding', $data);
    }

    public function ordered () {
        $id = Auth::id();
        $data = array();

        $orders = DB::table('orders')
            ->where('user_id', $id)
            ->where('status', '=', 2)
            ->get();

        $products = array();
        foreach ($orders as $key => $order) {
            $products[$order->id] = ShopProduct::find($order->product_id);
        }

        $data['products'] = $products;
        return view('frontend.buyer.ordered', $data);
    }
}
