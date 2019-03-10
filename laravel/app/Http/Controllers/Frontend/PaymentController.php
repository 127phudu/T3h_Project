<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Front\Order;
use App\Model\Front\ShopProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PaymentController extends Controller
{
    //
    public function index($id) {
        $data = array();

        $order = Order::find($id);

        $data['order'] = $order;

        return view('frontend.payment.index', $data);
    }


    public function update (Request $request) {
        $input = $request->all();
        $id = $input['product_id'];

        $validatedData = $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_email' => 'required',
            'customer_address' => 'required',
            'customer_city' => 'required',
            'customer_country' => 'required',
        ]);

        $order = Order::find($id);

        $order->customer_name = $input['customer_name'];
        $order->customer_phone = $input['customer_phone'];
        $order->customer_email= $input['customer_email'];
        $order->customer_address = $input['customer_address'];
        $order->customer_note = isset($input['customer_note']) ? $input['customer_note'] : '';
        $order->customer_city= $input['customer_city'];
        $order->customer_country = $input['customer_country'];
        $order->status = 2;

        $order->save();

        return redirect('shop/payment/after/update/'.$id);
    }

    public function afterUpdate($id) {
        $order = Order::find($id);
        $product = ShopProduct::find($order->product_id);
        $data = array();
        $data['order'] = $order;
        $data['product'] = $product;
        return view('frontend.payment.success', $data);
    }
}
