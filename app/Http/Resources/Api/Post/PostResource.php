<?php

namespace App\Http\Resources\Api\Post;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'category' => new PostCategoryResource($this->category),
            'image' => $this->image,
            'image_base_url' => asset('/')
        ];
    }
}
