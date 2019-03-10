<?php

namespace App\Model\Front;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Banner extends Model
{
    //
    protected $table = 'banners';

    public static function getBannerByLocation($location_id){
        $banner = DB::table('banners')
            ->where('location_id', $location_id)
            ->get();

        return $banner;
    }
}
