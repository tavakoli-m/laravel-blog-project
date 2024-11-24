<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Category\StoreCategoryRequest;
use App\Http\Requests\Api\Category\UpdateCategoryRequest;
use App\Http\Resources\Api\Category\CategoryResource;
use App\Http\Resources\Api\Category\CategoryResourceCollection;
use App\Models\Category;
use FastResponse\FastResponse\Facades\Response;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return Response::withStatus(200)->withAppends([new CategoryResourceCollection($categories)])->send();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->validated());

        return Response::withStatus(200)->withAppends([new CategoryResource($category)])->send();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return Response::withStatus(200)->withAppends([new CategoryResource($category)])->send();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return Response::withStatus(200)->withAppends([new CategoryResource($category->fresh())])->send();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return Response::withStatus(200)->withData([])->send();
    }
}
