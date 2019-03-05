<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Front\ContentPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentPostController extends Controller
{
    //

    public function detail ($id) {
        $item = ContentPost::find($id);

        $data = array();
        $data['post'] = $item;
        return view('frontend.content.post.detail', $data);
    }
}
