<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function edit(Post $post)
    {
        // TODO: $this->authorize('update', $post); を追加する
        // ポリシーで権限チェック
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // TODO: $this->authorize('update', $post); を追加する
         $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        $post->update($validated);

        return redirect()->route($posts.index);
    }

    public function destroy(Post $post)
    {
        // TODO: $this->authorize('delete', $post); を追加する
                $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route($posts.index);
    }
}
