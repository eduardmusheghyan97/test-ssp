<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function create(CreatePostRequest $request)
    {
        Post::create($request->all());
        return response()->json(['message' => 'Post successfully created!'],200);
    }
}
