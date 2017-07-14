<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Category;

class CategoriesController extends Controller
{
    //
    public function store(Request $request){

        $this->validate($request, [
          'name' => 'required|string|unique:categories',
          'display_picture' => 'required|image'
        ]);

        $category = new Category;

        $category->name = $request['name'];
        $category->slug = $category->name;

        if ($request->hasFile('display_picture')) {
            $image = $request->file('display_picture');
            $category->display_picture = $this->imageUpload($image,$category);
        }

        $category->save();

        flash('Success! Category created.','success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            flash('Error! Category Not Found.', 'danger');
            return redirect()->back();
        }

        $this->validate($request, [
            'name' => 'required|max:30|unique:categories,id,' . $category->id,
            'display_picture' => 'image',
        ]);

        $category->update([
            'name' => $request['name'],
            'slug' => str_slug($request['name']),
        ]);

        if ($request->hasFile('display_picture'))
        {
            $image = $request->file('display_picture');
            $category->display_picture = $this->imageUpload($image,$category);
            $category->save();
        }

        flash('Success! Category Updated.','success');
        return redirect()->back();
    }

    public function delete($id)
    {
        $category = Category::find($id);

        if (!$category) {
            flash('Error! Category Not Found.', 'danger');
            return redirect()->back();
        }

        $category->delete();

        flash('Success! Category Deleted','success');
        return redirect()->back();
    }

    public function imageUpload($image,$category)
    {
        ini_set('memory_limit','256M');
        $pictureName = time() . '-' . $category->slug . '.' . $image->getClientOriginalExtension();

        $pictureCategoryFolder = storage_path() . '/app/public/category/';
        $pictureDBPath = '/category/';

        if (!File::exists($pictureCategoryFolder)) {
            File::makeDirectory($pictureCategoryFolder);
        }

        Image::make($image)
            ->resize(1360, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($pictureCategoryFolder . '/' . $pictureName);

        return $pictureDBPath.$pictureName;
    }
}
