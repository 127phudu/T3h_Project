<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentTagController extends Controller
{
    //
    public function detail () {
        return view('frontend.content.tag.detail');
    }
}
