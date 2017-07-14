<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    //
    public function store(){

        /*$this->validate($request, [
          'tags' => 'required|string'
        ]);*/

        $tags = Tag::all();
        $tagsArray = explode(',','Nice,nice,work,cool,epic,love,lovely,views,insta,photoshop,art,cute,awesome,black,dark,malawi,beautiful,HD,crisp,interests,hotel,lake,beach,goals,destination,wedding,bride,photography,dope,work out,body goals');

        foreach ($tagsArray as $item) {
          if ($tags->contains('slug',str_slug($item)))
              continue;

          $tag = new Tag;
          $tag->title = $item;
          $tag->slug = str_slug($tag->title);

          $tag->save();
        }

        flash('Success! Tags created.','success');
        return redirect()->back();
    }
}
