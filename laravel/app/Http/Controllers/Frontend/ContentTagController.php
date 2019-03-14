<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Front\ContentTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ContentTagController extends Controller
{
    //
    public function detail ($id) {
        $data = array();

        $tag = ContentTag::find($id);

        $posts = DB::table('content_posts')
            ->where('tag_id', $id)
            ->paginate(10);

        $data['tag'] = $tag;
        $data['posts'] = $posts;

        return view('frontend.content.tag.detail', $data);
    }
}
