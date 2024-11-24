<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Post\StorePostRequest;
use App\Http\Requests\Api\Post\UpdatePostRequest;
use App\Http\Resources\Api\Post\PostResource;
use App\Http\Resources\Api\Post\PostResourceCollection;
use App\Http\Services\Image\ImageService;
use App\Models\Post;
use FastResponse\FastResponse\Facades\Response;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return Response::withStatus(200)->withAppends([new PostResourceCollection($posts)])->send();
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

        return Response::withStatus(200)->withAppends([new PostResource($post)])->send();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return Response::withStatus(200)->withAppends([new PostResource($post)])->send();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, post $post, ImageService $imageService)
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

        return Response::withStatus(200)->withAppends([new PostResource($post->fresh())])->send();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post, ImageService $imageService)
    {
        if (!empty($post->image)) {
            $imageService->deleteDirectoryAndFiles($post->image['directory']);
        }

        $result = $post->delete();

        return Response::withStatus(200)->withData([])->send();
    }

    public function changeStatus(Post $post)
    {
        $result = $post->update([
            'status' => $post->status === 1 ? 0 : 1
        ]);
        return Response::withStatus(200)->withAppends([new PostResource($post->fresh())])->send();

    }
}
