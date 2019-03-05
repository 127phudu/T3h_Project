<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //

    public static function getMenuLocation () {
        $location = array();
        $location[1] = 'Header location';
        $location[2] = 'Footer location 1';
        $location[3] = 'Footer location 2';
        $location[4] = 'Footer location 3';

        return $location;
    }


    protected $table = 'menus';
}
