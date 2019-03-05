<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class BannerController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index () {
        $items = DB::table('banners')->paginate(10);
        $data = array();
        $data['banners'] = $items;

        return view('admin.content.banners.index', $data);
    }

    public function create() {
        $data = array();
        $data['locations'] = Banner::getBannerLocations();
        return view('admin.content.banners.submit', $data);
    }

    public function edit($id) {
        $items = Banner::find($id);
        $data = array();
        $data['id'] = $id;
        $data['banner'] = $items;
        $data['locations'] = Banner::getBannerLocations();

        return view('admin.content.banners.edit', $data);

    }

    public function delete($id) {
        $items = Banner::find($id);
        $data = array();
        $data['banner'] = $items;
        return view('admin.content.banners.delete', $data);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'required',
            'link' => 'required',
        ]);

        $input = $request->all();

        $items = new Banner();

        $items->name = $input['name'];
        $items->image = $input['image'];
        $items->link = $input['link'];
        $items->location_id = isset($input['location_id']) ? (int) $input['location_id'] : 0;
        $items->intro = isset($input['intro']) ? $input['intro'] : '';
        $items->desc = isset($input['desc']) ? $input['desc'] : '';

        $items->save();

        return redirect('/admin/banners');
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'image' => 'required',
            'link' => 'required',
        ]);

        $input = $request->all();
        $items = Banner::find($id);

        $items->name = $input['name'];
        $items->image = $input['image'];
        $items->link = $input['link'];
        $items->location_id = isset($input['location_id']) ? (int) $input['location_id'] : 0;
        $items->intro = isset($input['intro']) ? $input['intro'] : '';
        $items->desc = isset($input['desc']) ? $input['desc'] : '';

        $items->save();

        return redirect('/admin/banners');
    }

    public function destroy($id) {
        $items = Banner::find($id);

        $items->delete();

        return redirect('/admin/banners');
    }

}
