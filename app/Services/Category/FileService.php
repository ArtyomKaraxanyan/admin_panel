<?php

namespace App\Services\Category;

use App\Models\Company;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FileService
{
    /**
     * @param Company $company
     * @param UploadedFile $uploadedFile
     * @throws \Throwable
     */
    public function uploadLogo(Company $company, UploadedFile $uploadedFile)
    {
        $upload_dir = '/uploads/companies/'.$company->id.'/';
        $fileName = $uploadedFile->hashName();
        $pieces = explode(".", $fileName);
        $fileName = $pieces[0] . '.webp';
        $image = Image::make($uploadedFile);
        Storage::put('public/' . $upload_dir . 'original/' . $fileName, (string) $image->encode('webp'));
        $image->resize(100,100, function ($constraint) {
            $constraint->aspectRatio();
        });
        Storage::put('public/' . $upload_dir . '100x100/' . $fileName, (string) $image->encode('webp'));
        return $fileName;
    }
}
