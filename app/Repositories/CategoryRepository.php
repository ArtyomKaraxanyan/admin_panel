<?php
namespace App\Repositories;

use App\Models\CategoryImage;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Support\Arr;
use Intervention\Image\Facades\Image;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAllCategories()
    {
        $categories=Category::all();
//        return View::make('blog')->with('posts', $posts);

        return view('dashboard.book_categories.index',["categories"=>$categories]);
    }

    public function getCategoryById($categoryId)
    {
        $category=  Category::findOrFail($categoryId);
        return view('dashboard.book_categories.edit',['category'=>$category]);
    }

    public function deleteCategory($categoryId)
    {
        Category::destroy($categoryId);

    }


    public function createCategory(array $categoryDetails)
    {

        $category= Category::create($categoryDetails);
        if (isset($newDetails['cover']) && count($categoryDetails['cover'])>0){
        foreach ($categoryDetails['cover'] as $cover){
            if ($cover->isFile()){
                $name = rand() . time() . '.' . $cover->getClientOriginalExtension();
                $destinationPathThumbnail = public_path('/image/100x100/');
                $cover100x100 = Image::make($cover->path());
                $cover100x100->resize(250, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPathThumbnail.'/'.$name);

                $destinationPath = public_path('/image/original');
                $cover->move($destinationPath, $name);

               CategoryImage::create(['category_id'=>$category->id,'path'=>$name]);
            }
        }
        }

    }

    public function updateCategory($categoryId, array $newDetails)
    {

        if (isset($newDetails['cover']) && count($newDetails['cover'])>0){

        foreach ($newDetails['cover'] as $cover){
            if ($cover->isFile()){
                $name = rand() . time() . '.' . $cover->getClientOriginalExtension();
                $destinationPathThumbnail = public_path('/image/100x100/');
                $cover100x100 = Image::make($cover->path());
                $cover100x100->resize(250, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPathThumbnail.'/'.$name);

                $destinationPath = public_path('/image/original');
                $cover->move($destinationPath, $name);

                CategoryImage::create(['category_id'=>$categoryId,'path'=>$name]);
            }
        }
        }
         Category::whereId($categoryId)->update($newDetails);
    }

    public function getFulfilledCategory()
    {
        return Category::where('is_fulfilled', true);
    }

    public function deleteCategoryImageById($imageID)
    {
        CategoryImage::destroy($imageID);
    }
}