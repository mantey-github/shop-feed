<?php

namespace App\Http\Controllers;

use App\Feed;
use App\Shop;
use App\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class ShopsController extends Controller
{
    /**
     * Create a new shop
     * Method: POST
     * @param Request $request
     * @return JsonResponse
     */
    public function createShop(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'shop_name' => 'required|string',
            'shop_url' => 'required|string|unique:shops',
            'currency' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->first()]);
        }

        $shop = new Shop($request->all());
        $shop->save();

        return response()->json([
            'shop' => $shop,
        ], 201);
    }


    /** Gets all shops
     * Method: GET
     * @param Request $request
     * @return JsonResponse
     */
    public function getShops(Request $request): JsonResponse
    {
        $shops = Shop::all();

        return response()->json([
            'shops' => $shops,
        ], 200);

    }


    /** Create a feed for a shop
     * Method: POST
     * @param Request $request
     * @return JsonResponse
     */
    public function createShopFeed(Request $request): JsonResponse
    {
        $channels = ['google']; //List of accepted channels

        $validator = Validator::make($request->all(), [
            'channel' => [
                'required',
                'string',
                Rule::in($channels)
            ]
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->first()]);
        }

        $shop = Shop::find($request->shop_id);

        if (empty($shop)) {
            return response()->json(['errors' => 'Empty shop found.']);
        }

        $data = array();
        foreach ($shop->products as $product) {
            $feed = [
                "product_name" => $product->title,
                "product_brand" => $product->brand,
                "product_pricing" => $product->sales_price,
                "channel" => $request->channel,
                "product_currency" => $shop->currency,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ];

            array_push($data, $feed);
        }

        DB::table('feeds')->insert($data);

        $feeds = Feed::all();

        return response()->json([
            'feeds' => $feeds,
        ], 200);

    }

}
