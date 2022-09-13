<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(CreatePostRequest $request, $websiteID)
    {
        Post::create($request, $websiteID);
        return 'Post successfully created!';
    }
}
