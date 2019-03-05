<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminManagerController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {

        $items = DB::table('admins')->paginate(10);
        $data = array();
        $data['admins'] = $items;

        return view('admin.content.users.index', $data);
    }

    public function create() {
        $data = array();
        return view('admin.content.users.submit', $data);
    }

    public function edit($id) {
        $items = Admin::find($id);
        $data = array();
        $data['id'] = $id;
        $data['admin'] = $items;
        return view('admin.content.users.edit', $data);

    }

    public function delete($id) {
        $items = Admin::find($id);
        $data = array();
        $data['admin'] = $items;
        return view('admin.content.users.delete', $data);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'images' => 'required',
            'intro' => 'required',
        ]);

        $input = $request->all();

        $items = new Admin();

        $items->name = $input['name'];
        $items->images = $input['images'];
        $items->intro = $input['intro'];
        $items->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $items->view = isset($input['view']) ? $input['view'] : 0;

        $items->save();

        return redirect('/admin/frontend');
    }

    public function update(Request $request, $id) {
//        $validatedData = $request->validate([
//            'name' => 'required|max:255',
//            'slug' => 'required',
//            'images' => 'required',
//            'intro' => 'required',
//        ]);
//
//        $input = $request->all();
//        $items = ContentTag::find($id);
//
//        $items->name = $input['name'];
//        $items->slug = $input['slug'];
//        $items->images = $input['images'];
//        $items->intro = $input['intro'];
//        $items->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
//        $items->view = isset($input['view']) ? $input['view'] : 0;
//
//        $items->save();
//
//        return redirect('/admin/content/frontend');
    }

    public function destroy($id) {
//        $items = ContentTag::find($id);
//
//        $items->delete();
//
//        return redirect('/admin/content/frontend');
    }
}
