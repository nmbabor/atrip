<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Order;
use App\Models\Product;
use App\Models\SupportTicket;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::where('type','user')->count();
        $totalBlog = Blog::where('status',1)->count();
        $recentBlog = Blog::where('status',1)->take(10)->latest()->get();
        return view('backend.index',compact('totalUser','totalBlog','recentBlog'));
    }

    public function profile()
    {
        $user = auth()->user();
        return view('backend.profile.index', compact('user'));
    }
}
