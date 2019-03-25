<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CustomerManagerController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {

        $items = DB::table('users')->paginate(10);
        $data = array();
        $data['customers'] = $items;

        return view('admin.content.shop.customer.index', $data);
    }

    public function edit($id) {
        $data = array();

        $customer = User::find($id);

        $data['customer'] = $customer;

        return view('admin.content.shop.customer.edit', $data);
    }

    public function delete($id) {
        $items = User::find($id);
        $data = array();
        $data['customer'] = $items;
        return view('admin.content.shop.customer.delete', $data);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
        ]);

        $input = $request->all();
        $items = User::find($id);
        $items->name = $input['name'];
        $items->email = $input['email'];

        $items->save();

        return redirect('/admin/shop/customer');
    }

    public function destroy($id) {
        $items = User::find($id);

        $items->delete();

        return redirect('/admin/shop/customer');
    }
}
