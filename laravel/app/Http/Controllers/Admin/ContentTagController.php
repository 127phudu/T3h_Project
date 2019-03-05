<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\ContentTag;

class ContentTagController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {

        $items = DB::table('content_tags')->paginate(10);
        $data = array();
        $data['tags'] = $items;

        return view('admin.content.content.tag.index', $data);
    }

    public function create() {
        $data = array();
        return view('admin.content.content.tag.submit', $data);
    }

    public function edit($id) {
        $items = ContentTag::find($id);
        $data = array();
        $data['id'] = $id;
        $data['tag'] = $items;
        return view('admin.content.content.tag.edit', $data);

    }

    public function delete($id) {
        $items = ContentTag::find($id);
        $data = array();
        $data['tag'] = $items;
        return view('admin.content.content.tag.delete', $data);
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
        ]);

        $input = $request->all();

        $items = new ContentTag();

        $items->name = $input['name'];
        $items->slug = $input['slug'] ? $this->slugify($input['slug']) : $this->slugify($input['name']);
        $items->images = $input['images'];
        $items->intro = $input['intro'];
        $items->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $items->view = isset($input['view']) ? $input['view'] : 0;

        $items->save();

        return redirect('/admin/content/tag');
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'images' => 'required',
            'intro' => 'required',
        ]);

        $input = $request->all();
        $items = ContentTag::find($id);

        $items->name = $input['name'];
        $items->slug = $input['slug'] ? $this->slugify($input['slug']) : $this->slugify($input['name']);
        $items->images = $input['images'];
        $items->intro = $input['intro'];
        $items->author_id = isset($input['author_id']) ? $input['author_id'] : 0;
        $items->view = isset($input['view']) ? $input['view'] : 0;

        $items->save();

        return redirect('/admin/content/tag');
    }

    public function destroy($id) {
        $items = ContentTag::find($id);

        $items->delete();

        return redirect('/admin/content/tag');
    }
}
