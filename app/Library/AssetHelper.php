<?php

namespace App\Library;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class AssetHelper
{

    protected static function createFileName()
    {
        return (string) Str::uuid();
    }

    public static function fileUpload($path, $file, $fileName = null)
    {   
        if (!$fileName) {
            $fileName = AssetHelper::createFileName();
        }
        $type = $file->getClientOriginalExtension();
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
        $imgName = $fileName.'.'.$type;
        $file->move($path, $imgName);
        return $imgName;
    }

    public static function removeFile($path)
    {
        return (!empty(File::exists($path))) ? File::delete($path) : false;
    }
    
    public static function getUploadDir($uploadDir)
    {
        return public_path('').'/uploads/'.$uploadDir;
    }
}
