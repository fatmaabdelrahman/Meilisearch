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
        if ($query = $request->get('query')){
            $results = Post::search($query)->paginate(5);
        }
        return view('search',['results'=>$results]);
    }
}
