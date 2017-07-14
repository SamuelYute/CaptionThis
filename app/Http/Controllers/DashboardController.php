<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Category;
use App\Tag;

class DashboardController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        $categories = Category::all();
        $tags = Tag::all();

        return view('pages.dashboard.index', compact('user','categories','tags'));
    }
}
