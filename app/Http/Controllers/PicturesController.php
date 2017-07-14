<?php

namespace App\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Picture;
use App\Category;
use App\Like;
use Illuminate\Support\Facades\URL;

class PicturesController extends Controller
{
    //
    public function store(Request $request){
        $this->validate($request, [
          'caption' => 'max:190|string',
          'picture' => 'required|image',
          'category' => 'required|max:3',
        ]);

        $user = Auth::user();
        $category = Category::find($request['category']);

        $picture = new Picture;

        $picture->caption = $request['caption'];
        $picture->linked_caption = $picture->caption;
        $picture->type = "Random";
        $picture->views = 0;
        $picture->downloads = 0;

        $hashTags = $this->getHashTags($picture->caption);
        
        if ($hashTags) {
            $picture->hash_tags = $hashTags;
            $picture->linked_caption = $this->makeHashTagLinks($picture->caption);
        }

        $image = $request->file('picture');
        $lowResolution = time() . '-low-resolution-' . $category->slug . '.' . $image->getClientOriginalExtension();
        $highResolution = time() . '-high-resolution-' . $category->slug . '.' . $image->getClientOriginalExtension();

        $pictureCategoryFolder = storage_path().'/app/public/pictures/'. $category->slug;
        $pictureDBPath = '/pictures/'.$category->slug.'/';

        if (!File::exists($pictureCategoryFolder)) {
            File::makeDirectory($pictureCategoryFolder);
        }

        Image::make($image)
          ->resize(1360, null, function ($constraint) {
              $constraint->aspectRatio();
          })
            ->orientate()
            ->save($pictureCategoryFolder.'/'.$lowResolution);
        Image::make($image)
            ->orientate()
            ->save($pictureCategoryFolder.'/'.$highResolution);

        $picture->low_resolution = $pictureDBPath.$lowResolution;
        $picture->high_resolution = $pictureDBPath.$highResolution;

        $picture->category()->associate($category);
        $picture->user()->associate($user);

        $picture->save();

        flash('Success! Picture added.','success');
        return redirect()->back();
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'caption' => 'max:190|string',
            'category' => 'required|max:3',
        ]);

        $user = Auth::user();
        $category = Category::find($request['category']);

        $picture = Picture::find($id);
        if(!$picture){
            flash('Error! Picture not found.','danger');
            return redirect()->back();
        }

        $picture->caption = $request['caption'];
        $picture->linked_caption = $picture->caption ;

        $hashTags = $this->getHashTags($picture->caption);

        if ($hashTags) {
            $picture->hash_tags = $hashTags;
            $picture->linked_caption = $this->makeHashTagLinks($picture->caption);
        }

        $picture->category()->associate($category);

        $picture->save();

        flash('Success! Picture details updated','success');
        return redirect()->back();
    }

    public function like($id){
        $user = Auth::user();
        $picture = Picture::find($id);

        if (!$picture)
          return response('Error! Picture not found!',404);

        if ($picture->likes->contains('user_id',$user->id))
          return response('Error! Picture already liked',400);

        $like = new Like;
        $like->user()->associate($user);
        $like->picture()->associate($picture);

        $like->save();

        $picture->load('likes');
        
        return response()->json($picture->likes->count());
    }

    public function download($id){
        $picture = Picture::find($id);
        if (!$picture || !Storage::disk('public')->exists($picture->high_resolution)){
          flash('Error! Picture not found!');
          return redirect()->back();
        }

        $picture->downloads++;
        $picture->save();

        return response()->download(public_path().'/storage'.$picture->high_resolution);
    }

    public function view($pictureId){
        $picture = Picture::find($pictureId);
        if (!$picture)
          return response('Error! Picture not found!',404);

        $picture->views++;
        $picture->save();

        return response('Success! Picture view event recorded!',200);
    }

    public function getHashTags($caption){
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
    }



}
