<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ShopBrand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShopBrandController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {

        $items = DB::table('shop_brands')->paginate(10);
        $data = array();
        $data['brands'] = $items;

        return view('admin.content.shop.brand.index', $data);
    }

    public function create() {
        $data = array();
        return view('admin.content.shop.brand.submit', $data);
    }

    public function edit($id) {
        $items = ShopBrand::find($id);
        $data = array();
        $data['id'] = $id;
        $data['brand'] = $items;

        return view('admin.content.shop.brand.edit', $data);

    }

    public function delete($id) {
        $items = ShopBrand::find($id);
        $data = array();
        $data['brand'] = $items;
        return view('admin.content.shop.brand.delete', $data);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'required',
            'link' => 'required',
        ]);

        $input = $request->all();

        $items = new ShopBrand();

        $items->name = $input['name'];
        $items->image = $input['image'];
        $items->link = $input['link'];
        $items->intro = isset($input['intro']) ? $input['intro'] : '';
        $items->desc = isset($input['desc']) ? $input['desc'] : '';

        $items->save();

        return redirect('/admin/shop/brand');
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'required',
            'link' => 'required',
        ]);

        $input = $request->all();
        $items = ShopBrand::find($id);

        $items->name = $input['name'];
        $items->image = $input['image'];
        $items->link = $input['link'];
        $items->intro = isset($input['intro']) ? $input['intro'] : '';
        $items->desc = isset($input['desc']) ? $input['desc'] : '';

        $items->save();

        return redirect('/admin/shop/brand');
    }

    public function destroy($id) {
        $items = ShopBrand::find($id);

        $items->delete();

        return redirect('/admin/shop/brand');
    }
}
