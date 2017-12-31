<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Picture;
use App\Like;
use Illuminate\Support\Facades\URL;

class PicturesController extends Controller
{

    public function getPicture(Picture $picture)
    {
        $responseMsg = "Success! Picture Found.";

        return response()->json([
            "message"=>$responseMsg,
            "data"=>$picture],200);
    }

    public function getAllPictures()
    {
        $pictures = Picture::all();
        if ($pictures->count() < 1)
            $responseMsg = "Warning! Pictures not Found.";
        else
            $responseMsg = "Success! Pictures Found.";

        return response()->json([
            "message"=>$responseMsg,
            "data"=>$pictures],200);
    }

    public function getPictureReplies(Picture $picture)
    {
        $replies = $picture->replies;
        if ($replies->count() < 1)
            $responseMsg = "Warning! Pictures Replies not Found.";
        else
            $responseMsg = "Success! Pictures Replies Found.";

        return response()->json([
            "message"=>$responseMsg,
            "data"=>$replies],200);
    }

    public function getPictureCaptions(Picture $picture)
    {
        $captions = $picture->captions;
        if ($captions->count() < 1)
            $responseMsg = "Warning! Pictures Captions not Found.";
        else
            $responseMsg = "Success! Pictures Captions Found.";

        return response()->json([
            "message"=>$responseMsg,
            "data"=>$captions],200);

    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'picture' => 'required|image',
        ]);

        $user = $request->user();

        $picture = new Picture;

        $image = $request->file('picture');
        $pictureName = time().'_'.$user->username.'.'.$image->getClientOriginalExtension();

        $pictureCategoryFolder = storage_path().'/app/public/pictures/';
        $pictureDBPath = '/pictures/';

        if (!File::exists($pictureCategoryFolder)) {
            File::makeDirectory($pictureCategoryFolder);
        }

        Image::make($image)
          ->resize(1360, null, function ($constraint) {
              $constraint->aspectRatio();
          })
            ->orientate()
            ->save($pictureCategoryFolder.'/'.$pictureName);

        $picture->path = $pictureDBPath.$pictureName;
        $picture->user()->associate($user);

        $picture->save();

        $responseMsg = 'Success! Picture Stored.';
        return response()->json([
            "message"=>$responseMsg,
            "data"=>$picture],200);
    }

    public function delete(Picture $picture)
    {
        $picture->delete();

        $responseMsg = 'Success! Picture Deleted.';
        return response()->json([
            "message"=>$responseMsg,
           ],200);
    }

    public function toggleLike(Picture $picture){
        $user = Auth::user();

        if (!$picture->likes->contains('user_id',$user->id)) {
            $like = new Like;
            $like->user()->associate($user);
            $like->likable()->associate($picture);

            $like->save();
        }
        else {
            $like = $picture->likes->where('user_id',$user->id)->first();
            $like->delete();
        }

        $picture->load('likes');

        $responseMsg = 'Success! Reply sent.';
        return response()->json([
            "message"=>$responseMsg,
            "data"=>$picture->likes],200);
    }

    public function sendReply(Request $request, Picture $picture)
    {
        $this->validate($request,[
            'content' => 'required|string|max:150'
        ]);

        $reply = new Reply;
        $reply->content = $request['content'];

        $reply->replyable()->associate($picture);
        $reply->user()->associate($request->user());
        $reply->save();

        $responseMsg = 'Success! Reply Sent.';
        return response()->json([
            "message"=>$responseMsg,
            "data"=>$reply],200);
    }

    /*public function download($id){
        $picture = Picture::find($id);
        if (!$picture || !Storage::disk('public')->exists($picture->high_resolution)){
          flash('Error! Picture not found!');
          return redirect()->back();
        }

        $picture->downloads++;
        $picture->save();

        return response()->download(public_path().'/storage'.$picture->high_resolution);
    }*/

    /*public function view($pictureId){
        $picture = Picture::find($pictureId);
        if (!$picture)
          return response('Error! Picture not found!',404);

        $picture->views++;
        $picture->save();

        return response('Success! Picture view event recorded!',200);
    }*/

    /*public function getHashTags($caption){
        $pattern = '/(^|[^a-z0-9_])#([a-z0-9_]+)/i';
        preg_match_all($pattern,$caption,$hashTags);

        $allTags = '';
        if (!empty($hashTags[0])){
            foreach ($hashTags[0] as $tag){
                $allTags.=preg_replace("/[^a-z0-9_]+/i", "", $tag).',';
            }
        }
        rtrim($allTags, ',');

        return $allTags;
    }

    public function makeHashTagLinks($description){
        $pattern = '/(^|[^a-z0-9_])#([a-z0-9_]+)/i';

        $parsedDescription = preg_replace_callback($pattern, function ($matches){
            $replacement = "{$matches[1]}<a href=\"". URL::route('showHashTagPictures',$matches[2]) ."\">$matches[0]</a>";
            return $replacement;
        } ,$description);

        return $parsedDescription;
    }*/
}
