<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Front\Banner;
use App\Model\Front\ShopCategory;
use App\Model\Front\ShopProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class HomePageController extends Controller
{
    //
    public function index () {
        $data = array();

        $banner_main_location = Banner::getBannerByLocation(1);
        $banner_bottom_1 = Banner::getBannerByLocation(2);
        $banner_bottom_2 = Banner::getBannerByLocation(3);
        $banner_bottom_3 = Banner::getBannerByLocation(4);

        $cats = ShopCategory::all();
        $top_bidding_id_by_cat = array();
        $top_bidding_by_cat = array();

        date_default_timezone_set("Asia/Ho_Chi_Minh");
        foreach ($cats as $cat) {
            $top_bidding_id_by_cat[$cat->id] = DB::table('bid_history')
                ->select(DB::raw('count(*) as bid_count, product_id'))
                ->where('cat_id', '=', $cat->id)
                ->groupBy('product_id')
                ->orderBy('bid_count', 'DESC')
                ->limit(3)
                ->get();

            $top_bidding_by_cat[$cat->id] = array();
            $count_bid[$cat->id] = array();
            foreach ($top_bidding_id_by_cat[$cat->id] as $item) {
                $top_bidding_by_cat[$cat->id][] = ShopProduct::find($item->product_id);
                $count_bid[$cat->id][$item->product_id] = $item->bid_count;
            }
        }

        $data['main_banners'] = $banner_main_location;
        $data['banner_bottom_1'] = $banner_bottom_1;
        $data['banner_bottom_2'] = $banner_bottom_2;
        $data['banner_bottom_3'] = $banner_bottom_3;
        $data['top_bidding_by_cat'] = $top_bidding_by_cat;
        $data['count_bid'] = $count_bid;

        $data['cats'] = $cats;

        $recommends = DB::table('shop_product')
            ->where('recommend', '=', 1)
            ->orderBy('updated_at', 'ASC')
            ->limit(4)
            ->get();

        $data['recommends'] = $recommends;

        return view('frontend.homepages.home', $data);
    }

}
