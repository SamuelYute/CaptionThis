<?php

namespace App\Http\Controllers;

use App\Caption;
use App\Picture;
use App\Reply;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function getReply(Reply $reply)
    {
        $responseMsg = 'Success! Reply Found.';
        return response()->json([
            "message"=>$responseMsg,
            "data"=>$reply],200);
    }

    public function update(Request $request, Reply $reply)
    {
        $this->validate($request, [
            'content' => 'required|string|max:200',
        ]);

        $reply->content = $request['content'];
        $reply->save();

        $responseMsg = 'Success! Reply Updated.';
        return response()->json([
            "message"=>$responseMsg,
            "data"=>$reply],200);
    }

    public function delete(Reply $reply)
    {
        $reply->delete();

        $responseMsg = 'Success! Reply Deleted.';
        return response()->json([
            "message"=>$responseMsg,
            "data"=>$reply],200);
    }
}
