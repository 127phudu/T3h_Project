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

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'desc' => 'required',
        ]);

        $input = $request->all();

        $items = new Menu();

        $items->name = $input['name'];
        $items->slug = $input['slug'];
        $items->desc = $input['desc'];
        $items->location = isset($input['location']) ? $input['location'] : 0;

        $items->save();

        return redirect('/admin/menu');
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'desc' => 'required',
        ]);

        $input = $request->all();
        $items = Menu::find($id);

        $items->name = $input['name'];
        $items->slug = $input['slug'];
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
