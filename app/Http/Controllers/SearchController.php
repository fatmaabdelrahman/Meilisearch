<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $results= null;
//        dd($results);
        if ($query = $request->get('query')){
            $results = Product::search($query)->get();
        }


        return ProductResource::collection($results);
//        return view('search',['results'=>$results]);
    }
}
