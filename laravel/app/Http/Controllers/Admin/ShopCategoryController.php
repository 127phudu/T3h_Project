<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\ShopCategory;
use Illuminate\Support\Facades\DB;

class ShopCategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {

        $items = DB::table('shop_category')->paginate(10);
        $data = array();
        $data['cats'] = $items;

        return view('admin.content.shop.category.index', $data);
    }

    public function create() {
        $data = array();
        return view('admin.content.shop.category.submit', $data);
    }

    public function edit($id) {
        $items = ShopCategory::find($id);

        $data = array();
        $data['id'] = $id;
        $data['cat'] = $items;
        return view('admin.content.shop.category.edit', $data);

    }

    public function delete($id) {
        $items = ShopCategory::find($id);
        $data = array();
        $data['cat'] = $items;
        return view('admin.content.shop.category.delete', $data);
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
        ]);

        $input = $request->all();

        $items = new ShopCategory();

        $items->name = $input['name'];
        $items->slug = $input['slug'] ? $this->slugify($input['slug']) : $this->slugify($input['name']);
        $items->images = isset($input['images']) ? $input['images'] : '';
        $items->intro = isset($input['intro']) ? $input['intro'] : '';
        $items->desc = isset($input['desc']) ? $input['desc'] : '';

        $items->save();

        return redirect('/admin/shop/category');
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);


        $input = $request->all();
        $items = ShopCategory::find($id);

        $items->name = $input['name'];
        $items->slug = $input['slug'] ? $this->slugify($input['slug']) : $this->slugify($input['name']);
        $items->images = isset($input['images']) ? $input['images'] : '';
        $items->intro = isset($input['intro']) ? $input['intro'] : '';
        $items->desc = isset($input['desc']) ? $input['desc'] : '';

        $items->save();

        return redirect('/admin/shop/category');
    }

    public function destroy($id) {
        $items = ShopCategory::find($id);

        $items->delete();

        return redirect('/admin/shop/category');
    }
}
