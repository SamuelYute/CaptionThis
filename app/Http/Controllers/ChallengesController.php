<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Challenge;

class ChallengesController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();

        $challenges = Challenge::where('status', 0)->get();
        $currentChallenges = Challenge::where('status', 1)->get();

        return view('pages.challenges.index', compact('user', 'auth', 'challenges', 'currentChallenges'));
    }

    public function show($slug)
    {
        $user = Auth::user();
        $challenge = Challenge::where('slug', $slug)->get();

        return view('pages.challenges.show', compact('user', 'auth', 'challenge'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:30|unique:challenges',
            'description' => 'required|max:180',
            'display_picture' => 'required|image',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'sponsor' => 'required|max:50'
        ]);

        $challenge = new Challenge;
        $challenge->title = $request['title'];
        $challenge->slug = str_slug($challenge->title);
        $challenge->description = $request['description'];
        $challenge->start_date = $request['start_date'];
        $challenge->end_date = $request['end_date'];
        $challenge->status = 0;
        $challenge->sponsor = $request['sponsor'];

        $image = $request->file('display_picture');
        $challenge->display_picture = $this->imageUpload($image,$challenge);

        $challenge->save();
        flash('Success! Challenge Added.', 'success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $challenge = Challenge::find($id);

        if (!$challenge) {
            flash('Error! Challenge Not Found.', 'danger');
            return redirect()->back();
        }

        $this->validate($request, [
            'title' => 'required|max:30|unique:challenges,id,' . $challenge->id,
            'description' => 'required|max:180',
            'display_picture' => 'image',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'sponsor' => 'required|max:50'
        ]);

        $challenge->update([
            'title' => $request['title'],
            'description' => $request['description'],
            'slug' => str_slug($request['title']),
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            'sponsor' => $request['sponsor']
        ]);

        if ($request->hasFile('display_picture'))
        {
            $image = $request->file('display_picture');
            $challenge->display_picture = $this->imageUpload($image,$challenge);
            $challenge->save();
        }

        flash('Success! Challenge Updated.','success');
        return redirect()->back();
    }

    public function imageUpload($image,$challenge){
        ini_set('memory_limit','256M');
        $pictureName = time() . '-' . $challenge->slug . '.' . $image->getClientOriginalExtension();

        $pictureChallengeFolder = storage_path() . '/app/public/challenges/';
        $pictureDBPath = '/challenges/';

        if (!File::exists($pictureChallengeFolder)) {
            File::makeDirectory($pictureChallengeFolder);
        }

        Image::make($image)
            ->resize(1360, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($pictureChallengeFolder . '/' . $pictureName);

        return $pictureDBPath.$pictureName;
    }

    public function delete($id)
    {
        $challenge = Challenge::find($id);

        if (!$challenge) {
            flash('Error! Challenge Not Found.', 'danger');
            return redirect()->back();
        }

        $challenge->delete();

        flash('Success! Challenge Deleted.','success');
        return redirect()->back();
    }

    public function toggle($id)
    {
        $challenge = Challenge::find($id);

        if ($challenge->status == 0) {
            $challenge->status = 1;
            $msg = 'Set to Current.';
        }else {
            $challenge->status = 0;
            $msg = 'Inactive.';
        }

        $challenge->save();
        flash('Success! Challenge '.$msg,'success');
        return redirect()->back();
    }
}
