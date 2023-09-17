<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $blogs = Blog::whereStatus(1)->latest()->take(3)->get();
        return view('frontend.index',compact('blogs'));
    }
}
