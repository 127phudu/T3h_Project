<?php

namespace App\Model\Front;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ShopCategory extends Model
{
    //
    protected $table = 'shop_category';



    public static function getProducts ($id) {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $products = DB::table('shop_product')
                    ->where('cat_id', '=', $id)
                    ->where('finish', '>', Carbon::now())
                    ->paginate(12);

        return $products;
    }

}
