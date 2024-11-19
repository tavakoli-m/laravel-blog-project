<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $posts = Post::all();
        return view('app.index',compact('posts'));
    }
}
