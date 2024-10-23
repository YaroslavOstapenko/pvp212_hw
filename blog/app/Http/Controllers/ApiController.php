<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ApiController extends Controller
{
    public function index()
    {
        $posts = Post::with('comments', 'user')->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::create([
            'user_id' => $request->user()->id,
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);

        return redirect()->route('posts.index')->with('success', 'Пост успешно создан!');
    }

    public function show($id)
    {
        $post = Post::with('comments')->find($id);

        if (!$post) {
            return redirect()->route('posts.index')->with('error', 'Пост не найден.');
        }

        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->route('posts.index')->with('error', 'Пост не найден.');
        }

        if ($post->user_id !== auth()->id()) {
            return redirect()->route('posts.index')->with('error', 'У вас нет прав редактировать этот пост.');
        }

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->route('posts.index')->with('error', 'Пост не найден.');
        }

        if ($post->user_id !== auth()->id()) {
            return redirect()->route('posts.index')->with('error', 'У вас нет прав редактировать этот пост.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);

        return redirect()->route('posts.index')->with('success', 'Пост успешно обновлен!');
    }


    public function confirmDelete($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->route('posts.index')->with('error', 'Пост не найден.');
        }

        return view('posts.delete', compact('post'));
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->route('posts.index')->with('error', 'Пост не найден.');
        }

        if ($post->user_id !== auth()->id()) {
            return redirect()->route('posts.index')->with('error', 'У вас нет прав удалять этот пост.');
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Пост успешно удален!');
    }

}

