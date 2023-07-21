<?php
namespace  App\Repositories ;

use App\Repositories\Interfaces\FileUploadInterface;
use Intervention\Image\Facades\Image;

class FileUploadRepository implements FileUploadInterface {

static public function FileUpload(array $file)
{
    $name = rand() . time() . '.' . $file['cover']->getClientOriginalExtension();
    $destinationPathThumbnail = public_path('/images/'.$file['directory'].'/100x100/');
    $cover100x100 = Image::make($file['cover']);
    $cover100x100->resize(250, 100, function ($constraint) {
        $constraint->aspectRatio();
    })->save($destinationPathThumbnail.'/'.$name);

    $destinationPath = public_path('/images/'.$file['directory'].'/original/');
    $file['cover']->move($destinationPath, $name);
    return $name;
}

}
