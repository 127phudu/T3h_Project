<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Front\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller
{
    //
    public function index () {
        return view('frontend.newsletter.index');
    }

    public function store (Request $request) {
        $validatedData = $request->validate([
            'email' => 'required',
        ]);

        $input = $request->all();


        $newsletter = new Newsletter();

        $newsletter->email = $input['email'];

        $newsletter->save();

        return redirect('newsletter');
    }
}
