<?php

namespace App\Console\Commands;

use App\Model\Front\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Carbon\Carbon;


class ProductToOrderCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Chuyển các sản phẩm đấu giá thành công qua orders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $products = DB::table('shop_product')
                    ->where('finish', '<', Carbon::now())
                    ->where('user_id', '>', '0')
                    ->get();

        $ordered_products = DB::table('orders')
                            ->select('product_id')
                            ->get();
        $is_ordered_products = array();
        foreach ($ordered_products as $ordered_product) {
            $is_ordered_products[$ordered_product->product_id] = 1;
        }
        foreach ($products as $product) {
            if (!isset($is_ordered_products[$product->id])) {

                $new_order = new Order();

                $new_order->product_id = $product->id;
                $new_order->user_id = $product->user_id;
                $new_order->customer_name = '';
                $new_order->customer_phone = '';
                $new_order->customer_email = '';
                $new_order->customer_note = '';
                $new_order->customer_address = '';
                $new_order->customer_city = '';
                $new_order->customer_country = '';
                $new_order->status = 1;
                $new_order->price = $product->price;

                $new_order->save();

                DB::table('bid_history')->where('product_id', '=', $product->id)->delete();
            }
        }
    }
}
