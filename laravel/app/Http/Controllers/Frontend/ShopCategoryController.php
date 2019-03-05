<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Front\ShopCategory;
use App\Model\Front\ShopProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopCategoryController extends Controller
{
    //

    public function detail ($id) {
        $data = array();

        $data['category'] = ShopCategory::find($id);
        $data['products'] = ShopCategory::getProducts($id);

        return view('frontend.shop.category.detail', $data);
    }
}
