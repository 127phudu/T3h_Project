<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Admin\ShopCategory;
use App\Model\Front\RegistedProducts;
use App\Model\Front\ShopProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;


class SellerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index () {
        $data = array();

        $id = Auth::id();

        $registed_products = DB::table('registed_products')
                ->where('seller_id' , $id)
                ->get();

        $products = array();

        foreach ($registed_products as $key => $registed_product) {
            $products[$key] = ShopProduct::find($registed_product->sell_id);
        }

        $data['registed_products'] = $registed_products;
        $data['products'] = $products;

        return view('frontend.seller.index', $data);
    }

    public function edit($id) {
        $items = RegistedProducts::find($id);
        $cats = ShopCategory::all();
        $data = array();
        $data['id'] = $id;
        $data['product'] = $items;
        $data['cats'] = $cats;
        return view('frontend.seller.edit', $data);

    }

    public function create () {
        $cats = ShopCategory::all();
        $data = array();
        $data['cats'] = $cats;
        return view('frontend.seller.submit', $data);
    }

    public function store(Request $request) {
        $seller_id = Auth::id();
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,jpg,png',
            'priceFirst' => 'required|numeric',
            'finish' => 'required',
        ]);

        $input = $request->all();

        // File này có thực, bắt đầu đổi tên và move
        $images = array();
        foreach ($input['images'] as $image) {
            $fileExtension = $image->getClientOriginalExtension(); // Lấy . của file

            // Filename cực shock để khỏi bị trùng
            $fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $fileExtension;

            // Thư mục upload
            $uploadPath = public_path('/upload'); // Thư mục upload

            //Mảng địa chỉ
            $images[] =  '/upload/'.$fileName;
            // Bắt đầu chuyển file vào thư mục
            $image->move($uploadPath, $fileName);
        }


        $items = new RegistedProducts();

        $items->name = $input['name'];
        $items->images = json_encode($images);
        $items->intro = isset($input['intro']) ? $input['intro'] : '';
        $items->desc = isset($input['desc']) ? $input['desc'] : '';
        $items->priceFirst = $input['priceFirst'];
        $items->price = $input['priceFirst'];
        $items->seller_id = $seller_id;
        $items->status = 0;
        $items->cat_id = $input['cat_id'];
        $items->finish = $input['finish'];

        $items->save();

        return redirect('/seller/selling');
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'images.*' => 'image|mimes:jpeg,jpg,png',
            'priceFirst' => 'required|numeric',
            'finish' => 'required',
        ]);

        $input = $request->all();

//        dd($input);
        $items = RegistedProducts::find($id);

        $images = (array) json_decode($items->images);

        if (isset($input['delete'])) {
            foreach ($input['delete'] as $value) {
                unset($images[$value]);
            }
        }

        if(isset($input['images'])) {
            foreach ($input['images'] as $image) {
                $fileExtension = $image->getClientOriginalExtension(); // Lấy . của file

                // Filename cực shock để khỏi bị trùng
                $fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $fileExtension;

                // Thư mục upload
                $uploadPath = public_path('/upload'); // Thư mục upload

                //Mảng địa chỉ
                $images[] =  '/upload/'.$fileName;
                // Bắt đầu chuyển file vào thư mục
                $image->move($uploadPath, $fileName);
            }
        }

        if (count($images) == 0) {
            $errors = new MessageBag();
            // add your error messages:
            $errors->add('my_error', 'cần ít nhất 1 ảnh');
            return redirect()->back()->withErrors($errors);
        }

        $new_images = array();
        foreach ($images as $image) {
            $new_images[] = $image;
        }


        $items->name = $input['name'];
        $items->images = json_encode($new_images);
        $items->intro = isset($input['intro']) ? $input['intro'] : '';
        $items->desc = isset($input['desc']) ? $input['desc'] : '';
        $items->priceFirst = $input['priceFirst'];
        $items->price = $input['priceFirst'];
        $items->status = 0;
        $items->cat_id = $input['cat_id'];
        $items->finish = $input['finish'];

        $items->save();

        return redirect('/seller/selling');
    }

    public function destroy($id) {
        $items = RegistedProducts::find($id);

        $items->delete();

        return redirect('/seller/selling');
    }
}
