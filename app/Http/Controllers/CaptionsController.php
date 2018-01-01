<?php

namespace App\Http\Controllers;

use App\Caption;
use App\Like;
use App\Picture;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CaptionsController extends Controller
{
    public function getCaption(Caption $caption)
    {
        $caption->load('picture');
        $responseMsg = "Success! Caption Found.";
        return response()->json([
            "message"=>$responseMsg,
            "data"=>$caption],200);
    }

    public function getAllCaptions()
    {
        $captions = Caption::all();
        $captions->load('picture');

        if ($captions->count() < 1)
            $responseMsg = "Warning! Captions not Found.";
        else
            $responseMsg = "Success! Captions Found.";

        return response()->json([
            "message"=>$responseMsg,
            "data"=>$captions],200);
    }

    public function getRandomCaptions()
    {
        $captions = Caption::all();
        $captions->load('picture');

        if ($captions->count() < 1)
            $responseMsg = "Warning! Captions not Found.";
        else
            $responseMsg = "Success! Captions Found.";

        return response()->json([
            "message"=>$responseMsg,
            "data"=>$captions],200);
    }

    public function getCaptionReplies(Caption $caption)
    {
        $replies = $caption->replies;
        if ($replies->count() < 1)
            $responseMsg = "Warning! Caption Replies not Found.";
        else
            $responseMsg = "Success! Caption Replies Found.";

        return response()->json([
            "message"=>$responseMsg,
            "data"=>$replies],200);
    }

    public function getCaptionLikes(Caption $caption)
    {
        $likes = $caption->likes;
        if ($likes->count() < 1)
            $responseMsg = "Warning! Caption Likes not Found.";
        else
            $responseMsg = "Success! Caption Likes Found.";

        return response()->json([
            "message"=>$responseMsg,
            "data"=>$likes],200);
    }

    public function getCaptionPicture(Caption $caption)
    {
        $responseMsg = "Success! Caption Picture Found.";
        return response()->json([
            "message"=>$responseMsg,
            "data"=>$caption->picture],200);
    }

    public function store(Request $request, Picture $picture)
    {
        $this->validate($request, [
            'content' => 'required|string|max:200|unique:captions',
        ]);

        $caption = new Caption;
        $caption->content = $request['content'];

        $caption->user()->associate($request->user);
        $caption->picture()->associate($picture);

        $caption->save();

        $responseMsg = 'Success! Caption Created.';
        return response()->json([
            "message"=>$responseMsg,
            "data"=>$caption],200);
    }

    public function update(Request $request, Caption $caption)
    {
        $this->validate($request, [
            'content' => 'required|string|max:200|unique:captions,content,'.$caption->id,
        ]);

        $caption->content = $request['content'];
        $caption->save();

        $responseMsg = 'Success! Caption Updated.';
        return response()->json([
            "message"=>$responseMsg,
            "data"=>$caption],200);
    }

    public function delete(Caption $caption)
    {
        $caption->delete();

        $responseMsg = 'Success! Caption Deleted.';
        return response()->json([
            "message"=>$responseMsg,
            ],200);
    }

    public function toggleLike(Caption $caption)
    {
        $user = Auth::user();

        if (!$caption->likes->contains('user_id',$user->id)) {
            $like = new Like;
            $like->user()->associate($user);
            $like->likable()->associate($caption);

            $like->save();
            $responseMsg = 'Success! Picture Liked.';
        }
        else {
            $like = $caption->likes->where('user_id',$user->id)->first();
            $like->delete();
            $responseMsg = 'Success! Picture Unliked.';
        }

        $caption->load('likes');

        return response()->json([
            "message"=>$responseMsg,
            "data"=>$caption->likes],200);
    }

    public function sendReply(Request $request, Caption $caption)
    {
        $this->validate($request,[
            'content' => 'required|string|max:150'
        ]);

        $reply = new Reply();
        $reply->content = $request['content'];

        $reply->replyable()->associate($caption);
        $reply->user()->associate($request->user());
        $reply->save();

        $responseMsg = 'Success! Reply sent.';
        return response()->json([
            "message"=>$responseMsg,
            "data"=>$reply],200);

    }
}
