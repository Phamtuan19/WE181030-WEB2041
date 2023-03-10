<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Product;

use App\Models\Image;

use Illuminate\Http\Response;

class ApiController extends Controller
{

    public function storeSearch (Request $request) {
        $products = new Product();

        $images = new Image();

        $keySearch = $request->storeSearch;

        if($keySearch) {
            $products = $products->select('id', 'code', 'name', 'price', 'promotion_price')->where('name', 'like', '%' . $keySearch . '%')->take(6)->get()->toArray();
        }

        foreach ($products as $key => $product) {

            $products[$key]['avatar'] = $images->select('path')->where('product_id', $product['id'])->where('is_avatar', 1)->get()->toArray()[0]['path'];
        }

        return response()->json($products, Response::HTTP_OK);
    }
}
