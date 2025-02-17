<?php

namespace App\Http\Controllers\Homepage;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function post()
    {
        $user = Auth::user();
        $posts = $user->posts()->latest()->paginate(2);
        return view('homepage.post.post', compact('posts'));
    }

    public function create(Request $request)
    {
        $request->validate(
            [
                'title' => ['required', 'max:30'],
                'content' => ['required'],
                'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
            ],
            [
                'title.required' => __('postPage.title_required'),
                'title.max' => __('postPage.title_max'),

                'content.required' => __('postPage.content_required'),

                'image.image' => __('postPage.image'),
                'image.mimes' => __('postPage.mimes'),
                'image.max' => __('postPage.max'),

            ]
        );

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('upload/posts'), $imageName);
            $imagePath = $imageName;
        }

        Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->route('post')->with('success', __('postPage.post_add'));
    }

    public function update($id)
    {
        $post = Post::findOrFail($id);
        return view('homepage.post.update', compact('post'));
    }

    public function updateProcess(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],

            [
                'title.required' => __('postPage.title_required'),
                'title.max' => __('postPage.title_max'),

                'content.required' => __('postPage.content_required'),

                'image.image' => __('postPage.image'),
                'image.mimes' => __('postPage.mimes'),
                'image.max' => __('postPage.max'),

            ]
        );

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;

        if ($request->hasFile('image')) {
            if ($post->image) {
                $filePath = public_path('upload/posts/' . $post->image);

                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            $file = $request->file('image');
            $imageName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('upload/posts'), $imageName);
            $post->image = $imageName;
        }

        $post->save();

        return redirect()->route('post')->with('success', __('postPage.post_update'));
    }


    public function delete($id)
    {
        $post = Post::findOrFail($id);

        if ($post->image) {
            $filePath = public_path('upload/posts/' . $post->image);

            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $post->delete();

        return redirect()->route('post')->with('success', __('postPage.post_delete'));
    }
}
