<?php

namespace App\Model\Front;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class ShopCategory extends Model
{
    //
    protected $table = 'shop_category';

    public static function getProducts ($id) {
//        $products = DB::table('shop_products')->where('location', '=', 2)->get();

        $products = DB::table('shop_product')->where('cat_id', '=', $id)->paginate(12);

        return $products;
    }

}
