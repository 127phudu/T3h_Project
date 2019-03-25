<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\RegistedProducts;
use App\Model\Admin\ShopCategory;
use App\Model\Admin\ShopProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RegistedProductController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {
        $items = DB::table('registed_products')
                ->where('status', 0)
                ->paginate(10);
        $data = array();
        $data['products'] = $items;


        return view('admin.content.registed_product.index', $data);
    }

    public function edit($id) {
        $items = RegistedProducts::find($id);
        $cats = ShopCategory::all();
        $data = array();
        $data['id'] = $id;
        $data['product'] = $items;
        $data['cats'] = $cats;
        return view('admin.content.registed_product.edit', $data);
    }

    public function delete($id) {
        $items = RegistedProducts::find($id);
        $data = array();
        $data['product'] = $items;
        return view('admin.content.registed_product.delete', $data);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'images' => 'required',
            'priceFirst' => 'required|numeric',
            'finish' => 'required',
        ]);

        $input = $request->all();
        $items = RegistedProducts::find($id);
        $items->name = $input['name'];
        $items->images = json_encode($input['images']);
        $items->intro = isset($input['intro']) ? $input['intro'] : '';
        $items->desc = isset($input['desc']) ? $input['desc'] : '';
        $items->priceFirst = $input['priceFirst'];
        $items->price = $input['priceFirst'];
        $items->cat_id = $input['cat_id'];
        $items->finish = $input['finish'];

        $items->save();

        return redirect('/admin/registed_product');
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

    public function approve($id) {
        $registed_product = RegistedProducts::find($id);

        $items = new ShopProduct();

        $items->name = $registed_product->name;
        $items->slug = $this->slugify($registed_product->name);
        $items->images = $registed_product->images;
        $items->intro = isset($registed_product->intro) ? $registed_product->intro : '';
        $items->desc = isset($registed_product->desc) ? $registed_product->desc : '';
        $items->priceFirst = $registed_product->priceFirst;
        $items->price = $registed_product->priceFirst;
        $items->user_id = 0;
        $items->seller_id = $registed_product->seller_id;
        $items->cat_id = $registed_product->cat_id;
        $items->finish = $registed_product->finish;
        $items->recommend = 0;

        $items->save();

        $registed_product->status = 1;
        $registed_product->sell_id = $items->id;
        $registed_product->save();

        return redirect('/admin/registed_product');

    }

    public function destroy($id) {
        $items = RegistedProducts::find($id);

        $items->status = -1;

        $items->save();

        return redirect('/admin/registed_product');
    }
}
