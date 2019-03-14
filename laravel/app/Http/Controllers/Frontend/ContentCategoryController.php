<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Front\ContentCategory;
use App\Model\Front\ContentPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ContentCategoryController extends Controller
{
    //

    public function detail ($id) {

        $data = array();

        $content_category = ContentCategory::find($id);

        $posts = DB::table('content_posts')
                ->where('cat_id', $id)
                ->paginate(10);

        $data['category'] = $content_category;
        $data['posts'] = $posts;

        return view('frontend.content.category.detail', $data);
    }
}
