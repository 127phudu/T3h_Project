<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //

    public static function getMenuLocation () {
        $location = array();
        $location[1] = 'Banner left location';
        $location[2] = 'Header location';
        $location[3] = 'Footer location 1';
        $location[4] = 'Footer location 2';

        return $location;
    }


    protected $table = 'menus';
}
