<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StorePostRequest;
use App\Http\Requests\Admin\Post\UpdatePostRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, ImageService $imageService)
    {
        $inputs = $request->validated();

        $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'posts');
        $result = $imageService->createIndexAndSave($request->file('image'));
        if ($result === false) {
            return back();
        }
        $inputs['image'] = $result;

        $post = Post::create($inputs);

        return to_route('admin.post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post, ImageService $imageService)
    {
        $inputs = $request->validated();

        if ($request->hasFile('image')) {
            if (!empty($post->image)) {
                $imageService->deleteDirectoryAndFiles($post->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'posts');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return back();
            }
            $inputs['image'] = $result;
        }

        $result = $post->update($inputs);

        return to_route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, ImageService $imageService)
    {
        if (!empty($post->image)) {
            $imageService->deleteDirectoryAndFiles($post->image['directory']);
        }

        $result = $post->delete();

        return back();
    }

    public function changeStatus(Post $post)
    {
        $result = $post->update([
            'status' => $post->status === 1 ? 0 : 1
        ]);
        return back();
    }
}
