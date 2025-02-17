<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Post;


class HomepageController extends Controller
{
    //
    public function homepage(Request $request): View
    {
        $query = Post::with('user');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%")
                    ->orWhere('updated_at', 'like', "%{$search}%");
            });
        }

        $sort = $request->input('sort', 'latest');
        if ($sort === 'oldest') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $posts = $query->latest()->paginate(2, ['*'], 'mainPage')->appends($request->query());

        $latestPosts = Post::with('user')->orderBy('created_at', 'desc')->paginate(2, ['*'], 'latestPage');
        $oldestPosts = Post::with('user')->orderBy('created_at', 'asc')->paginate(2, ['*'], 'oldestPage');

        return view('homepage.homepage', compact('posts', 'latestPosts', 'oldestPosts'));
    }
}
