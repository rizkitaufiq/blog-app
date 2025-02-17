<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Post;


class HomepageController extends Controller
{
    //
    public function homepage(): View
    {
        $posts = Post::with('user')->latest()->paginate(2, ['*'], 'mainPage');

        $latestPosts = Post::with('user')->orderBy('created_at', 'desc')->paginate(2, ['*'], 'latestPage');
        $oldestPosts = Post::with('user')->orderBy('created_at', 'asc')->paginate(2, ['*'], 'oldestPage');

        return view('homepage.homepage', compact('posts', 'latestPosts', 'oldestPosts'));
    }
}
