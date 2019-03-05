<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Newsletters;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class NewslettersController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    

    public function index () {
        $items = DB::table('newsletters')->paginate(10);
        $data = array();
        $data['newsletters'] = $items;

        return view('admin.content.newsletters.index', $data);
    }

    public function create() {
        $data = array();
        return view('admin.content.newsletters.submit', $data);
    }

    public function edit($id) {
        $items = Newsletters::find($id);
        $data = array();
        $data['id'] = $id;
        $data['newsletter'] = $items;
        return view('admin.content.newsletters.edit', $data);

    }

    public function delete($id) {
        $items = Newsletters::find($id);
        $data = array();
        $data['newsletter'] = $items;
        return view('admin.content.newsletters.delete', $data);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required',
        ]);

        $input = $request->all();

        $items = new Newsletters();

        $items->email = $input['email'];

        $items->save();

        return redirect('/admin/newsletters');
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'email' => 'required',
        ]);

        $input = $request->all();
        $items = Newsletters::find($id);

        $items->email = $input['email'];

        $items->save();

        return redirect('/admin/newsletters');
    }

    public function destroy($id) {
        $items = Newsletters::find($id);

        $items->delete();

        return redirect('/admin/newsletters');
    }


}
