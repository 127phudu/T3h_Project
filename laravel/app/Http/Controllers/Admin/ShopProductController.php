<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\ShopProduct;
use App\Model\Admin\ShopCategory;
use Illuminate\Support\Facades\DB;

class ShopProductController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index() {

        $items = DB::table('shop_product')->paginate(10);
        $data = array();
        $data['products'] = $items;

        return view('admin.content.shop.product.index', $data);
    }

    public function create() {

        $cats = ShopCategory::all();
        $data = array();
        $data['cats'] = $cats;
        return view('admin.content.shop.product.submit', $data);
    }

    public function edit($id) {
        $items = ShopProduct::find($id);
        $cats = ShopCategory::all();
        $data = array();
        $data['id'] = $id;
        $data['product'] = $items;
        $data['cats'] = $cats;
        return view('admin.content.shop.product.edit', $data);

    }

    public function delete($id) {
        $items = ShopProduct::find($id);
        $data = array();
        $data['product'] = $items;
        return view('admin.content.shop.product.delete', $data);
    }

    public function slugify ($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(á|à|ả|ã|ạ|â|ấ|ầ|ẩ|ẫ|ậ|ắ|ằ|ẳ|ẵ|ặ|ă)/', 'a', $str);
        $str = preg_replace('/(é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ)/', 'e', $str);
        $str = preg_replace('/(í|ì|ỉ|ĩ|ị)/', 'i', $str);
        $str = preg_replace('/(ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ)/', 'o', $str);
        $str = preg_replace('/(ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự)/', 'u', $str);
        $str = preg_replace('/(ý|ỳ|ỷ|ỹ|ỵ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'images' => 'required',
            'priceFirst' => 'required|numeric',
            'finish' => 'required',
        ]);

        $input = $request->all();

        $items = new ShopProduct();

        $items->name = $input['name'];
        $items->slug = $input['slug'] ? $this->slugify($input['slug']) : $this->slugify($input['name']);
        $items->images = json_encode($input['images']);
        $items->intro = isset($input['intro']) ? $input['intro'] : '';
        $items->desc = isset($input['desc']) ? $input['desc'] : '';
        $items->priceFirst = $input['priceFirst'];
        $items->price = $input['priceFirst'];
        $items->user_id = isset($input['user_id']) ? $input['user_id'] : 0;
        $items->cat_id = $input['cat_id'];
        $items->finish = $input['finish'];

        $items->save();

        return redirect('/admin/shop/product');
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'images' => 'required',
            'priceFirst' => 'required|numeric',
            'finish' => 'required',
        ]);

        $input = $request->all();
        $items = ShopProduct::find($id);
        $items->name = $input['name'];
        $items->slug = $input['slug'] ? $this->slugify($input['slug']) : $this->slugify($input['name']);
        $items->images = json_encode($input['images']);
        $items->intro = isset($input['intro']) ? $input['intro'] : '';
        $items->desc = isset($input['desc']) ? $input['desc'] : '';
        $items->priceFirst = $input['priceFirst'];
        $items->price = $input['priceFirst'];
        $items->user_id = isset($input['user_id']) ? $input['user_id'] : 0;
        $items->cat_id = $input['cat_id'];
        $items->finish = $input['finish'];

        $items->save();

        return redirect('/admin/shop/product');
    }

    public function destroy($id) {
        $items = ShopProduct::find($id);

        $items->delete();

        return redirect('/admin/shop/product');
    }
}
