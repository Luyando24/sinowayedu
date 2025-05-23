<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published', true)->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        
        // Get related posts (posts in the same category or with similar tags)
        $relatedPosts = Post::where('id', '!=', $post->id)
            ->when($post->category, function($query) use ($post) {
                return $query->where('category', $post->category);
            })
            ->latest()
            ->take(3)
            ->get();
        
        // Get next post for navigation
        $nextPost = Post::where('created_at', '>', $post->created_at)
            ->orderBy('created_at', 'asc')
            ->first();
        
        return view('posts.show', compact('post', 'relatedPosts', 'nextPost'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'featured_image' => 'nullable|image|max:2048',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'meta_keywords' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('posts', 'public');
        }

        Post::create($validated);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    // display news page
    public function newsPage()
    {
        $posts = Post::where('is_published', true)->latest()->paginate(10);
        return view('news', compact('posts'));
    }

    // display post details
    public function postDetails(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}

