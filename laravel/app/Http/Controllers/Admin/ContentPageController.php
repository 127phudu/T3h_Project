<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\ContentPage;

class ContentPageController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {

        $items = DB::table('content_pages')->paginate(10);
        $data = array();
        $data['pages'] = $items;

        return view('admin.content.content.page.index', $data);
    }

    public function create() {
        $data = array();
        return view('admin.content.content.page.submit', $data);
    }

    public function edit($id) {
        $items = ContentPage::find($id);
        $data = array();
        $data['id'] = $id;
        $data['page'] = $items;
        return view('admin.content.content.page.edit', $data);

    }

    public function delete($id) {
        $items = ContentPage::find($id);
        $data = array();
        $data['page'] = $items;
        return view('admin.content.content.page.delete', $data);
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
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',
        ]);

        $input = $request->all();

        $items = new ContentPage();

        $items->name = $input['name'];
        $items->slug = $input['slug'] ? $this->slugify($input['slug']) : $this->slugify($input['name']);
        $items->images = $input['images'];
        $items->intro = $input['intro'];
        $items->desc = $input['desc'];
        $items->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $items->view = isset($input['view']) ? $input['view'] : 0;

        $items->save();

        return redirect('/admin/content/page');
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'images' => 'required',
            'intro' => 'required',
            'desc' => 'required',
        ]);

        $input = $request->all();
        $items = ContentPage::find($id);

        $items->name = $input['name'];
        $items->slug = $input['slug'] ? $this->slugify($input['slug']) : $this->slugify($input['name']);
        $items->images = $input['images'];
        $items->intro = $input['intro'];
        $items->desc = $input['desc'];
        $items->view = isset($input['view']) ? $input['view'] : 0;
        $items->author_id = isset($input['author_id']) ? $input['author_id'] : 0;

        $items->save();

        return redirect('/admin/content/page');
    }

    public function destroy($id) {
        $items = ContentPage::find($id);

        $items->delete();

        return redirect('/admin/content/page');
    }
}
