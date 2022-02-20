<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        dd($results);
        if ($query = $request->get('query')){
            $results = Post::search($query,function ($meilisearch,$query,$options){
                return $meilisearch->search($query,$options);
            })->get();
        }
//        dd($results);
        return view('search',['results'=>$results]);
    }
}
