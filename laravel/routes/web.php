<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Homepage route
 */

Route::get('/', 'Frontend\HomePageController@index')->name('frontend.home');

/**
 * Frontend route shop category
 */
Route::get('shop/category/{id}', 'Frontend\ShopCategoryController@detail');

/**
 * Frontend route shop product
 */
Route::get('shop/product/{id}', 'Frontend\ShopProductController@detail');
Route::post('shop/product/{id}', 'Frontend\ShopProductController@update');


/**
 * Frontend route CMS page
 */
Route::get('page/{id}', 'Frontend\ContentPageController@detail');

/**
 * Frontend route content category
 */
Route::get('content/category/{id}', 'Frontend\ContentCategoryController@detail');

/**
 * Frontend route content tag
 */
Route::get('content/tag/{id}', 'Frontend\ContentTagController@detail');


/**
 * Frontend route CMS page
 */
Route::get('content/post/{id}', 'Frontend\ContentPostController@detail');

/**
 * Frontend route for customer
 */
Route::get('buyer/newPrize', 'Frontend\userController@newPrize');
Route::get('buyer/bidding', 'Frontend\userController@bidding');
Route::get('buyer/ordered', 'Frontend\userController@ordered');


/**
 * Frontend route payment
 */
Route::get('shop/payment/{id}', 'Frontend\PaymentController@index');
Route::get('shop/payment/after/update/{id}', 'Frontend\PaymentController@afterUpdate');
Route::post('shop/payment', 'Frontend\PaymentController@update');

/**
 * route cho admin
 */
Route::prefix('admin')->group(function () {

    /**
     * URL : /admin
     */
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    //--------------------Route admin authen ------------------------
    //---------------------------------------------------------------
    //---------------------------------------------------------------


    /**
     * URL : /admin/dashboard
     * Route đăng nhập thành công
     */
    Route::get('/dashboard', 'AdminController@index')->name('admin.dasboard');

    /**
     * URL : /admin/register
     * Route trả về view đăng ký tài khoản cho admin
     */
    Route::get('register', 'AdminController@create')->name('admin.register');

    /**
     * URL : /admin/register
     * Route lưu dữ liệu đăng ký admin
     */
    Route::post('register', 'AdminController@store')->name('admin.register.store');

    /**
     * URL : /admin/login
     * Route trả về view đăng nhập
     */
    Route::get('login', 'Auth\Admin\LoginController@showLoginForm')->name('admin.auth.showLoginForm');

    /**
     * URL :
     *
     */
    Route::post('login', 'Auth\Admin\LoginController@login')->name('admin.auth.login');

    /**
     * URL :
     * Route dùng để đăng xuất
     */
    Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');


    //--------------------Route admin shopping ----------------------
    //---------------------------------------------------------------
    //---------------------------------------------------------------

    //---------------------admin category----------------------------
    Route::get('shop/category', 'Admin\ShopCategoryController@index');
    Route::get('shop/category/create', 'Admin\ShopCategoryController@create');
    Route::get('shop/category/{id}/edit', 'Admin\ShopCategoryController@edit');
    Route::get('shop/category/{id}/delete', 'Admin\ShopCategoryController@delete');

    Route::post('shop/category', 'Admin\ShopCategoryController@store');
    Route::post('shop/category/{id}', 'Admin\ShopCategoryController@update');
    Route::post('shop/category/{id}/delete', 'Admin\ShopCategoryController@destroy');


    //---------------------admin product----------------------------
    Route::get('shop/product', 'Admin\ShopProductController@index');
    Route::get('shop/product/create', 'Admin\ShopProductController@create');
    Route::get('shop/product/{id}/edit', 'Admin\ShopProductController@edit');
    Route::get('shop/product/{id}/delete', 'Admin\ShopProductController@delete');

    Route::post('shop/product', 'Admin\ShopProductController@store');
    Route::post('shop/product/{id}', 'Admin\ShopProductController@update');
    Route::post('shop/product/{id}/delete', 'Admin\ShopProductController@destroy');

    //----------------------admin order--------------------------
    Route::get('shop/order', 'Admin\ShopOrderController@index');
    Route::get('shop/order/{id}/edit', 'Admin\ShopOrderController@edit');
    Route::get('shop/order/{id}/delete', 'Admin\ShopOrderController@delete');

    Route::post('shop/order/{id}', 'Admin\ShopOrderController@update');
    Route::post('shop/order/{id}/delete', 'Admin\ShopOrderController@destroy');


    Route::get('shop/review', function () {
        return view('admin/content/shop/review/index');
    });


    Route::get('shop/customer', 'Admin\CustomerManagerController@index');
    Route::get('shop/customer/create', 'Admin\CustomerManagerController@create');
    Route::get('shop/customer/{id}/edit', 'Admin\CustomerManagerController@edit');
    Route::get('shop/customer/{id}/delete', 'Admin\CustomerManagerController@delete');

    Route::post('shop/customer', 'Admin\CustomerManagerController@store');
    Route::post('shop/customer/{id}', 'Admin\CustomerManagerController@update');
    Route::post('shop/customer/{id}/delete', 'Admin\CustomerManagerController@destroy');


    //admin shipper
    Route::get('shop/shipper', 'Admin\ShipperManagerController@index');
    Route::get('shop/shipper/create', 'Admin\ShipperManagerController@create');
    Route::get('shop/shipper/{id}/edit', 'Admin\ShipperManagerController@edit');
    Route::get('shop/shipper/{id}/delete', 'Admin\ShipperManagerController@delete');

    Route::post('shop/shipper', 'Admin\ShipperManagerController@store');
    Route::post('shop/shipper/{id}', 'Admin\ShipperManagerController@update');
    Route::post('shop/shipper/{id}/delete', 'Admin\ShipperManagerController@destroy');


    //admin seller
    Route::get('shop/seller', 'Admin\SellerManagerController@index');
    Route::get('shop/seller/create', 'Admin\SellerManagerController@create');
    Route::get('shop/seller/{id}/edit', 'Admin\SellerManagerController@edit');
    Route::get('shop/seller/{id}/delete', 'Admin\SellerManagerController@delete');

    Route::post('shop/seller', 'Admin\SellerManagerController@store');
    Route::post('shop/seller/{id}', 'Admin\SellerManagerController@update');
    Route::post('shop/seller/{id}/delete', 'Admin\SellerManagerController@destroy');



    //admin shop brand
    Route::get('shop/brand', 'Admin\ShopBrandController@index');
    Route::get('shop/brand/create', 'Admin\ShopBrandController@create');
    Route::get('shop/brand/{id}/edit', 'Admin\ShopBrandController@edit');
    Route::get('shop/brand/{id}/delete', 'Admin\ShopBrandController@delete');

    Route::post('shop/brand', 'Admin\ShopBrandController@store');
    Route::post('shop/brand/{id}', 'Admin\ShopBrandController@update');
    Route::post('shop/brand/{id}/delete', 'Admin\ShopBrandController@destroy');


    Route::get('shop/statistic', function () {
        return view('admin/content/shop/statistic/index');
    });

    Route::get('shop/product/order', function () {
        return view('admin/content/adminOrder/index');
    });

    //--------------------Route admin content ----------------------
    //---------------------------------------------------------------
    //---------------------------------------------------------------


    // content category
    Route::get('content/category', 'Admin\ContentCategoryController@index');
    Route::get('content/category/create', 'Admin\ContentCategoryController@create');
    Route::get('content/category/{id}/edit', 'Admin\ContentCategoryController@edit');
    Route::get('content/category/{id}/delete', 'Admin\ContentCategoryController@delete');

    Route::post('content/category', 'Admin\ContentCategoryController@store');
    Route::post('content/category/{id}', 'Admin\ContentCategoryController@update');
    Route::post('content/category/{id}/delete', 'Admin\ContentCategoryController@destroy');


    // content post
    Route::get('content/post', 'Admin\ContentPostController@index');
    Route::get('content/post/create', 'Admin\ContentPostController@create');
    Route::get('content/post/{id}/edit', 'Admin\ContentPostController@edit');
    Route::get('content/post/{id}/delete', 'Admin\ContentPostController@delete');

    Route::post('content/post', 'Admin\ContentPostController@store');
    Route::post('content/post/{id}', 'Admin\ContentPostController@update');
    Route::post('content/post/{id}/delete', 'Admin\ContentPostController@destroy');


    // content page
    Route::get('content/page', 'Admin\ContentPageController@index');
    Route::get('content/page/create', 'Admin\ContentPageController@create');
    Route::get('content/page/{id}/edit', 'Admin\ContentPageController@edit');
    Route::get('content/page/{id}/delete', 'Admin\ContentPageController@delete');

    Route::post('content/page', 'Admin\ContentPageController@store');
    Route::post('content/page/{id}', 'Admin\ContentPageController@update');
    Route::post('content/page/{id}/delete', 'Admin\ContentPageController@destroy');


    // content tag
    Route::get('content/tag', 'Admin\ContentTagController@index');
    Route::get('content/tag/create', 'Admin\ContentTagController@create');
    Route::get('content/tag/{id}/edit', 'Admin\ContentTagController@edit');
    Route::get('content/tag/{id}/delete', 'Admin\ContentTagController@delete');

    Route::post('content/tag', 'Admin\ContentTagController@store');
    Route::post('content/tag/{id}', 'Admin\ContentTagController@update');
    Route::post('content/tag/{id}/delete', 'Admin\ContentTagController@destroy');

    // menu
    Route::get('menu', 'Admin\MenuController@index');
    Route::get('menu/create', 'Admin\MenuController@create');
    Route::get('menu/{id}/edit', 'Admin\MenuController@edit');
    Route::get('menu/{id}/delete', 'Admin\MenuController@delete');

    Route::post('menu', 'Admin\MenuController@store');
    Route::post('menu/{id}', 'Admin\MenuController@update');
    Route::post('menu/{id}/delete', 'Admin\MenuController@destroy');

    // menu items
    Route::get('menuitems', 'Admin\MenuItemController@index');
    Route::get('menuitems/create', 'Admin\MenuItemController@create');
    Route::get('menuitems/{id}/edit', 'Admin\MenuItemController@edit');
    Route::get('menuitems/{id}/delete', 'Admin\MenuItemController@delete');

    Route::post('menuitems', 'Admin\MenuItemController@store');
    Route::post('menuitems/{id}', 'Admin\MenuItemController@update');
    Route::post('menuitems/{id}/delete', 'Admin\MenuItemController@destroy');

    // config
    Route::get('config', 'Admin\ConfigController@index');

    Route::post('config', 'Admin\ConfigController@store');

    // media
    Route::get('media', 'Admin\MediaManagerController@index');

    // admin user
    Route::get('users', 'Admin\AdminManagerController@index');
    Route::get('users/create', 'Admin\AdminManagerController@create');
    Route::get('users/{id}/edit', 'Admin\AdminManagerController@edit');
    Route::get('users/{id}/delete', 'Admin\AdminManagerController@delete');

    Route::post('users', 'Admin\AdminManagerController@store');
    Route::post('users/{id}', 'Admin\AdminManagerController@update');
    Route::post('users/{id}/delete', 'Admin\AdminManagerController@destroy');


    //--------------------Route admin banner ----------------------
    //---------------------------------------------------------------
    //---------------------------------------------------------------

    Route::get('banners', 'Admin\BannerController@index');
    Route::get('banners/create', 'Admin\BannerController@create');
    Route::get('banners/{id}/edit', 'Admin\BannerController@edit');
    Route::get('banners/{id}/delete', 'Admin\BannerController@delete');

    Route::post('banners', 'Admin\BannerController@store');
    Route::post('banners/{id}', 'Admin\BannerController@update');
    Route::post('banners/{id}/delete', 'Admin\BannerController@destroy');


    //--------------------Route admin newsletters ----------------------
    //---------------------------------------------------------------
    //---------------------------------------------------------------

    Route::get('newsletters', 'Admin\NewslettersController@index');
    Route::get('newsletters/create', 'Admin\NewslettersController@create');
    Route::get('newsletters/{id}/edit', 'Admin\NewslettersController@edit');
    Route::get('newsletters/{id}/delete', 'Admin\NewslettersController@delete');

    Route::post('newsletters', 'Admin\NewslettersController@store');
    Route::post('newsletters/{id}', 'Admin\NewslettersController@update');
    Route::post('newsletters/{id}/delete', 'Admin\NewslettersController@destroy');


});


/**
 * route cho seller
 */
Route::prefix('seller')->group(function () {
    /**
     * URL : /seller
     */
    Route::get('/', 'SellerController@index')->name('seller.dashboard');

    /**
     * URL : /seller/dashboard
     * Route đăng nhập thành công
     */
    Route::get('/dashboard', 'SellerController@index')->name('seller.dasboard');

    /**
     * URL : /seller/register
     * Route trả về view đăng ký tài khoản cho admin
     */
    Route::get('register', 'SellerController@create')->name('seller.register');

    /**
     * URL : /seller/register
     * Route lưu dữ liệu đăng ký seller
     */
    Route::post('register', 'SellerController@store')->name('seller.register.store');

    /**
     * URL : /seller/login
     * Route trả về view đăng nhập
     */
    Route::get('login', 'Auth\Seller\LoginController@showLoginForm')->name('seller.auth.showLoginForm');

    /**
     * URL :
     *
     */
    Route::post('login', 'Auth\Seller\LoginController@login')->name('seller.auth.login');

    /**
     * URL :
     * Route dùng để đăng xuất
     */
    Route::post('logout', 'Auth\Seller\LoginController@logout')->name('seller.auth.logout');

});

/**
 * route cho shipper
 */
Route::prefix('shipper')->group(function () {

    /**
     * URL : /shipper
     */
    Route::get('/', 'ShipperController@index')->name('shipper.dashboard');

    /**
     * URL : /shipper/dashboard
     * Route đăng nhập thành công
     */
    Route::get('/dashboard', 'ShipperController@index')->name('shipper.dasboard');

    /**
     * URL : /shipper/register
     * Route trả về view đăng ký tài khoản cho shipper
     */
    Route::get('register', 'ShipperController@create')->name('shipper.register');

    /**
     * URL : /shipper/register
     * Route lưu dữ liệu đăng ký admin
     */
    Route::post('register', 'ShipperController@store')->name('shipper.register.store');

    /**
     * URL : /shipper/login
     * Route trả về view đăng nhập
     */
    Route::get('login', 'Auth\Shipper\LoginController@showLoginForm')->name('shipper.auth.showLoginForm');

    /**
     * URL :
     *
     */
    Route::post('login', 'Auth\Shipper\LoginController@login')->name('shipper.auth.login');

    /**
     * URL :
     * Route dùng để đăng xuất
     */
    Route::post('logout', 'Auth\Shipper\LoginController@logout')->name('shipper.auth.logout');
});
