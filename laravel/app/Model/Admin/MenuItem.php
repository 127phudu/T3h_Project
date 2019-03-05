<?php

namespace App\Model\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    //
    protected $table = 'menu_items';

    public static function outputLevelCategories ($input_categories, &$output_categories = array(), $parent_id = 0, $lvl = 1) {

        if (count($input_categories) > 0) {
            foreach ($input_categories as $key => $category) {
                $category = (array) $category;
                if ($category['parent_id'] == $parent_id) {
                    $category['level'] = $lvl;
                    $output_categories[] = $category;
                    unset($input_categories[$key]);
                    $newLv = $lvl + 1;
                    self::outputLevelCategories($input_categories, $output_categories, $category['id'], $newLv);
                }
            }
        }
        return $output_categories;
    }

    public static function getLevelCategories () {
        $source = MenuItem::all()->toArray();
        $result = array();
        self::outputLevelCategories($source, $result);
        return $result;
    }

    public static function outputLevelCategoriesExcept ($input_categories, &$output_categories = array(), $parent_id = 0, $lvl = 1, $except) {

        if (count($input_categories) > 0) {
            foreach ($input_categories as $key => $category) {
                $category = (array) $category;
                if ($category['parent_id'] == $parent_id) {
                    $category['level'] = $lvl;
                    if ($category['id'] != $except) {
                        $output_categories[] = $category;
                    }
                    unset($input_categories[$key]);
                    if ($category['id'] != $except) {
                        $newLv = $lvl + 1;
                        self::outputLevelCategoriesExcept($input_categories, $output_categories, $category['id'], $newLv, $except);
                    }
                }
            }
        }
        return $output_categories;

    }

    public static function getLevelCategoriesExcept ($except) {
        $source = MenuItem::all()->toArray();
        $result = array();
        self::outputLevelCategoriesExcept($source, $result,0,1, $except);
        return $result;
    }


    public static function getTypeOfMenuItem () {
        $type = array();
        $type[1] = 'Shop category';
        $type[2] = 'Shop product';
        $type[3] = 'Content category';
        $type[4] = 'Content post';
        $type[5] = 'Content page';
        $type[6] = 'Content tag';
        $type[7] = 'Custom link';

        return $type;
    }

    public static function getMenuItemsByHeader () {
        $menu_header = DB::table('menus')->where('location','=', 1)->first();
        if (isset($menu_header->id)){
            $source = DB::table('menu_items')->where('menu_id','=', $menu_header->id)->orderBy('sort', 'ASC')->get()->toArray();
            $result = array();
            self::outputLevelCategories($source, $result);
        } else {
            $result = array();
        }
        return $result;
    }

    public static function getMenuItemsByFooter1 () {
        $menu_header = DB::table('menus')->where('location','=', 2)->first();
        if (isset($menu_header->id)){
            $menu_items_header = DB::table('menu_items')->where('menu_id','=', $menu_header->id)->get();
        } else {
            $menu_items_header = array();
        }

        return $menu_items_header;
    }

    public static function getMenuItemsByFooter2 () {
        $menu_header = DB::table('menus')->where('location','=', 3)->first();
        if (isset($menu_header->id)){
            $menu_items_header = DB::table('menu_items')->where('menu_id','=', $menu_header->id)->get();
        } else {
            $menu_items_header = array();
        }

        return $menu_items_header;
    }

    public static function getMenuItemsByFooter3 () {
        $menu_header = DB::table('menus')->where('location','=', 4)->first();
        if (isset($menu_header->id)){
            $menu_items_header = DB::table('menu_items')->where('menu_id','=', $menu_header->id)->get();
        } else {
            $menu_items_header = array();
        }
        return $menu_items_header;
    }

    public static function hasChild ($input_categories, $parent_id) {
        foreach ($input_categories as $category) {
            if ($category['parent_id'] == $parent_id) {
                return true;
            }
        }
        return false;
    }

    public static function buildMenuHTML ($input_categories, &$html, $parent_id = 0, $lvl = 1) {
        if (count($input_categories) > 0 && self::hasChild($input_categories, $parent_id)) {

            if ($lvl == 1) {
                $html .= "<ul class=\"nav navbar-nav nav_1\">";
            } elseif ($lvl == 2) {
                $html .= '<ul>';
            }


            foreach ($input_categories as $key => $category) {
                if ($category['parent_id'] == $parent_id) {
                    $category['level'] = $lvl;

                    if ($lvl == 1) {
                        if (self::hasChild($input_categories, $category['id'])) {
                            $html .= '<li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">'. $category["name"] .'<span class="caret"></span></a>
                                            <div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
                                                <div class="w3ls_vegetables">';
                            unset($category[$key]);
                        } else {
                            if ($category['type'] == 7) {
                                $menu_link = $category['link'];
                            } else {
                                $menu_link = url($category['link']);
                            }

                            $html .= '<li><a href="'.$menu_link.'">';
                            $html .= $category['name'];
                            unset($category[$key]);
                        }
                    } elseif ($lvl == 2) {
                        if ($category['type'] == 7) {
                            $menu_link = $category['link'];
                        } else {
                            $menu_link = url($category['link']);
                        }
                        $html .= '<li><a href="'.$menu_link.'">';
                        $html .= $category['name'];
                        unset($category[$key]);
                    }

                    if ($lvl < 2) {
                        self::buildMenuHTML($input_categories, $html, $category['id'], $lvl + 1);
                    }

                    if ($lvl == 1) {
                        if (self::hasChild($input_categories, $category['id'])) {
                            $html .= '</div>
                                        </div>
                                        </li>';
                        } else {
                            $html .= '</a></li>';
                        }
                    } elseif ($lvl == 2) {
                        $html .= '</a></li>';
                    }
                }
            }

            $html .= '</ul>';
        }
    }

    public static function getMenuUlLi($source) {
        $html_menu = '';

        self::buildMenuHTML($source, $html_menu);

        return $html_menu;
    }
}
