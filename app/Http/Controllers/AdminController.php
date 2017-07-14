<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Challenge;
use App\Category;
use App\Tag;
use App\User;
use App\Picture;
use App\Prize;
use ConsoleTVs\Charts\Facades\Charts;

class AdminController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        $challenges = Challenge::all();
        $tags = Tag::all();
        $categories = Category::all();
        $users = User::all();
        $pictures = Picture::all();

        $appActivity = Charts::database($pictures, 'line', 'highcharts')
            ->title('Pictures Activity')
            ->elementLabel('Uploads')
            ->dimensions(1000, 500)
            ->responsive(true)
            ->lastByMonth(6, true);

        return view('pages.admin.index',compact('user','users','challenges','categories','tags','pictures','appActivity'));
    }
}
