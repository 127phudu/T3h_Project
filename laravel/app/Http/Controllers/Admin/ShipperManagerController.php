<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShipperManagerController extends Controller
{
    //
    public function index() {

        $items = DB::table('shippers')->paginate(10);
        $data = array();
        $data['shippers'] = $items;

        return view('admin.content.shop.shipper.index', $data);
    }

    public function create() {
        $data = array();
        return view('admin.content.shop.shipper.submit', $data);
    }
}
