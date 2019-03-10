<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    protected $table = 'banners';

    public static function getBannerLocations () {
        $locations = array();
        $locations[1] = 'Main banner';
        $locations[2] = 'Banner Bottom 1';
        $locations[3] = 'Banner Bottom 2';
        $locations[4] = 'Banner Bottom 3';

        return $locations;
    }

}
