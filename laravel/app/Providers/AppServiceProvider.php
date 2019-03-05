<?php

namespace App\Providers;

use App\Model\Admin\Menu;
use App\Model\Admin\MenuItem;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Model\Admin\Config;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        Schema::defaultStringLength(191);

        $items = Config::all();

        $configs = array();
        $configs[] = 'web_name';
        $configs[] = 'header_logo';
        $configs[] = 'footer_logo';
        $configs[] = 'intro';
        $configs[] = 'desc';

        $default = array();

        foreach ($configs as $item_config) {
            $default[$item_config] = '';
        }

        foreach ($items as $item) {
            $key = $item->name;
            $default[$key] = $item->value;
        }

        $global_settings = $default;

        $menus_items_header = MenuItem::getMenuItemsByHeader();
        $menus_items_header_html = MenuItem::getMenuUlLi($menus_items_header);
        $menus_items_footer1 = MenuItem::getMenuItemsByFooter1();
        $menus_items_footer2 = MenuItem::getMenuItemsByFooter2();
        $menus_items_footer3 = MenuItem::getMenuItemsByFooter3();

        View::share('fe_global_settings', $global_settings);
        View::share('fe_menus_items_header', $menus_items_header);
        View::share('fe_menus_items_header_html', $menus_items_header_html);
        View::share('fe_menus_items_footer1', $menus_items_footer1);
        View::share('fe_menus_items_footer2', $menus_items_footer2);
        View::share('fe_menus_items_footer3', $menus_items_footer3);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
