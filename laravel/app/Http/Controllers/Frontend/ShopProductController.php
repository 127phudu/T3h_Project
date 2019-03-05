<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Front\ShopProduct;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;


class ShopProductController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->only('update');
    }

    public function detail ($id) {
        $item = ShopProduct::find($id);
        if (Auth::check()) {
            $cur_user_id = Auth::user()->id;
        } else {
            $cur_user_id = 0;
        }

        $best_user = User::find($item->quantityInStock);
        $best_user_name = (isset($best_user) && $best_user) ? $best_user->name : 'Chưa có người đấu giá';


        $data = array();

        $data['product'] = $item;
        $data['cur_user_id'] = $cur_user_id;
        $data['best_user_name'] = $best_user_name;

        return view('frontend.shop.product.detail', $data);
    }

    public function updateAllClient($best_user_name, $price)
    {
        $data['best_user_name'] = $best_user_name;
        $data['price'] = $price;

        $options = array(
            'cluster' => 'ap1',
            'encrypted' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $pusher->trigger('Bidding', 'channel-bid', $data);

    }

    public function update (Request $request, $id) {
        $item = ShopProduct::find($id);

        $minPrice = $item->priceSale + 100000;

        $validatedData = $request->validate([
            'user_id' => 'required',
            'priceSale' => 'required|numeric|min:'. ($minPrice),
        ]);

        $input = $request->all();


        $item->priceSale = $input['priceSale'];
        $item->quantityInStock = $input['user_id'];

        $item->save();

        $best_user = User::find($input['user_id']);
        $best_user_name = $best_user->name;

        $this->updateAllClient($best_user_name ,$input['priceSale']);

        return redirect('/shop/product/'.$id);
    }
}
