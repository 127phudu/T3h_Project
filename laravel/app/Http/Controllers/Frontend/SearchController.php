<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class SearchController extends Controller
{
    //

    public function index(Request $request) {
        $data = array();

        $input = $request->all();

        date_default_timezone_set("Asia/Ho_Chi_Minh");
        if (isset($input['name']) && (strlen($input['name']) > 2)) {
            $result = DB::table('shop_product')
                ->where('name', 'like', '%'.$input['name'].'%')
                ->where('finish', '>', Carbon::now())
                ->paginate(10);
        } else {
            $result = array();
        }

        $data['products'] = $result;

        return view('frontend/search/index', $data);
    }
}
