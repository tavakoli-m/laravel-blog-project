<?php

namespace App;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,Category $category)
    {
        return view('app.category',compact('category'));
    }
}
