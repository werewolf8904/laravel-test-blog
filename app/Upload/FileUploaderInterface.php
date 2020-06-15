<?php

namespace App\Upload;


use Illuminate\Http\UploadedFile;

/**
 * Class FileUploader
 * @package App\Upload
 */
interface FileUploaderInterface
{
    /**
     * @param  UploadedFile  $uploadedFile
     * @param $path
     * @param $name
     * @return false|string
     */
    public function store(UploadedFile $uploadedFile, $path, $name);
}
