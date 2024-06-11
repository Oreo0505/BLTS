<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

trait Upload
{
    public function UploadFile(UploadedFile $file, $prefix, $directory, $disk)
    {
        $fileName = $prefix . '_' . time() . '.' . $file->getClientOriginalExtension();
        return $file->storeAs($directory, $fileName, $disk);
    }

    public function deleteFile($filePath)
    {
        Storage::disk('public')->delete($filePath);
    }
}
