<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\Menu;

class MenuController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');

        $locations = Menu::getMenuLocation();
        view()->share('locations', $locations);
    }

    public function index() {

        $items = DB::table('menus')->paginate(10);
        $data = array();
        $data['menus'] = $items;

        return view('admin.content.menu.index', $data);
    }

    public function create() {
        $data = array();
        return view('admin.content.menu.submit', $data);
    }

    public function edit($id) {
        $items = Menu::find($id);
        $data = array();
        $data['id'] = $id;
        $data['menu'] = $items;
        return view('admin.content.menu.edit', $data);

    }

    public function delete($id) {
        $items = Menu::find($id);
        $data = array();
        $data['menu'] = $items;
        return view('admin.content.menu.delete', $data);
    }

    public function slugify ($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(á|à|ả|ã|ạ|â|ấ|ầ|ẩ|ẫ|ậ|ắ|ằ|ẳ|ẵ|ặ|ă)/', 'a', $str);
        $str = preg_replace('/(é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ)/', 'e', $str);
        $str = preg_replace('/(í|ì|ỉ|ĩ|ị)/', 'i', $str);
        $str = preg_replace('/(ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ)/', 'o', $str);
        $str = preg_replace('/(ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự)/', 'u', $str);
        $str = preg_replace('/(ý|ỳ|ỷ|ỹ|ỵ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'desc' => 'required',
        ]);

        $input = $request->all();

        $items = new Menu();

        $items->name = $input['name'];
        $items->slug = $input['slug'] ? $this->slugify($input['slug']) : $this->slugify($input['name']);
        $items->desc = $input['desc'];
        $items->location = isset($input['location']) ? $input['location'] : 0;

        $items->save();

        return redirect('/admin/menu');
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'desc' => 'required',
        ]);

        $input = $request->all();
        $items = Menu::find($id);

        $items->name = $input['name'];
        $items->slug = $input['slug'] ? $this->slugify($input['slug']) : $this->slugify($input['name']);
        $items->desc = $input['desc'];
        $items->location = isset($input['location']) ? $input['location'] : 0;

        $items->save();

        return redirect('/admin/menu');
    }

    public function destroy($id) {
        $items = Menu::find($id);

        $items->delete();

        return redirect('/admin/menu');
    }
}
