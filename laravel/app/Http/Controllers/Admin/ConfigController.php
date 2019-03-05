<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index () {
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

        $data = array();
        $data['configs'] = $default;

        return view('admin.content.config.index', $data);
    }

    public function store (Request $request) {
        $input = $request->all();

        $configs = array();
        $configs[] = 'web_name';
        $configs[] = 'header_logo';
        $configs[] = 'footer_logo';
        $configs[] = 'intro';
        $configs[] = 'desc';

        foreach ($configs as $item_config) {
            $record = Config::where('name', $item_config)->first();
            if (isset($record->id)) {
                $item = Config::find($record->id);
                $item->value = isset($input[$item_config]) ? $input[$item_config] : '';
                $item->default = '';
                $item->save();
            } else {
                $item = new Config();
                $item->name = $item_config;
                $item->value = isset($input[$item_config]) ? $input[$item_config] : '';
                $item->default = '';
                $item->save();
            }
        }

        return redirect('/admin/config');
    }
}
