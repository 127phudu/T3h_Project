<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ShopOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ShopOrderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {

        $items = DB::table('orders')->paginate(10);
        $data = array();
        $data['orders'] = $items;

        return view('admin/content/shop/order/index', $data);
    }

    public function edit($id) {
        $items = ShopOrder::find($id);
        $data = array();
        $data['id'] = $id;
        $data['order'] = $items;
        return view('admin.content.shop.order.edit', $data);

    }

    public function delete($id) {
        $items = ShopOrder::find($id);
        $data = array();
        $data['order'] = $items;
        return view('admin.content.shop.order.delete', $data);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_email' => 'required',
            'customer_address' => 'required',
            'customer_city' => 'required',
            'customer_country' => 'required',
            'status' => 'required',
        ]);

        $input = $request->all();
        $order = ShopOrder::find($id);

        $order->customer_name = $input['customer_name'];
        $order->customer_phone = $input['customer_phone'];
        $order->customer_email= $input['customer_email'];
        $order->customer_address = $input['customer_address'];
        $order->customer_note = isset($input['customer_note']) ? $input['customer_note'] : '';
        $order->customer_city= $input['customer_city'];
        $order->customer_country = $input['customer_country'];
        $order->status = $input['status'];

        $order->save();

        return redirect('/admin/shop/order');
    }

    public function destroy($id) {
        $items = ShopOrder::find($id);

        $items->delete();

        return redirect('/admin/shop/order');
    }
}
