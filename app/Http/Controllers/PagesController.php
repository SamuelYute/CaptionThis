<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Picture;
use App\Challenge;

class PagesController extends Controller
{
    //
    public function index(){
        $randomCrip = Picture::all();
        $categories = Category::all();
        $currentChallenges = Challenge::where('status',0)->get();

        return view('index',compact('randomCrip','categories','currentChallenges'));
    }

    public function mesho(){
        return view('pages.misc.mesho');
    }

    public function showTagPictures($hashTag){
        $pictures = Picture::where('hash_tags', 'LIKE', '%'.$hashTag.'%')->get();

        return view('pages.misc.hash-tag-pictures',compact('pictures','hashTag'));
    }
}
