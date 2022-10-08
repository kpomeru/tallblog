<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index ()
    {
        return view('manage.dashboard', [
            'users_count' => User::count(),
            'categories_count' => Category::count(),
            'posts_count' => Post::count(),
            'comments_count' => Comment::count(),
            'likes_count' => Like::count(),
        ]);
    }
}
