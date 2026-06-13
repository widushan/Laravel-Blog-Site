<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        

        $user = auth()->user();

        $query = Post::with(['category', 'user', 'media'])
            ->withCount('claps')
            ->latest();

        if ($user) {
            $ids = $user->following()->pluck('users.id');
            $query->whereIn('user_id', $ids);
        }

        $posts = $query->simplePaginate(5);
        
        $users = User::all();

        return view('post.index', 
        [
            
            'posts' => $posts,
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('post.create', [
            'categories'=> $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = Auth::id();
        $data['slug'] = $this->generateUniqueSlug($data['title']);

        $post = Post::create($data);

        if ($request->hasFile('image')) {
            $post->addMediaFromRequest('image')
                ->toMediaCollection();
        }

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username, Post $post)
    {
        return view('post.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $categories = Category::get();
        return view('post.edit', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $data = $request->validated();
        $data['slug'] = $this->generateUniqueSlug($data['title'], $post->id);

        $post->update($data);

        if ($request->hasFile('image')) {
            $post->clearMediaCollection();
            $post->addMediaFromRequest('image')
                ->toMediaCollection();
        }

        return redirect()->route('myPosts', [
            'username' => $post->user->username,
            'post' => $post->slug,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $post->delete();
        return redirect()->route('dashboard');
    }

    private function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $original = $slug;
        $counter = 1;

        while (Post::where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
            ->exists()) {
            $slug = $original . '-' . $counter++;
        }

        return $slug;
    }

    public function category(Category $category)
    {
        $user = auth()->user();

        $query = $category->posts()
            ->with(['category', 'user', 'media'])
            ->withCount('claps')
            ->latest();

        if ($user) {
            $ids = $user->following()->pluck('users.id');
            $query->whereIn('user_id', $ids);
        }

        $posts = $query->simplePaginate(5);
        
        $users = User::all();

        return view('post.index', [
            'posts' => $posts,
            'users' => $users,
        ]);
    }


    public function myPosts()
    {
        $user = auth()->user();

        $query = $user->posts()
            ->with(['category', 'user', 'media'])
            ->withCount('claps')
            ->latest();

        $posts = $query->simplePaginate(5);
        
        $users = User::all();

        return view('post.index', [
            'posts' => $posts,
            'users' => $users,
        ]);
    }

    


}
