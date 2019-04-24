<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Validator;

class ProductsController extends Controller
{
    /**
     * Create a new product for a shop
     * Method: POST
     * @param Request $request
     * @return JsonResponse
     */
    public function createProduct(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'brand' => 'required|string',
            'sales_price' => 'required|numeric',
            'quantity' => 'numeric',
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->first()]);
        }

        $data = $request->all();
        $data['shop_id'] = $request->shop_id;

        $product = new Product($data);
        $product->save();

        return response()->json([
            'product' => $product,
        ], 201);

    }



}
