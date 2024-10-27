<?php

namespace App\Http\Services;


class UploadService
{
    public function store($request)
    {
        // Kiểm tra xem file đã được gửi lên hay chưa
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads');

            dd($path);
        }

        
    }
}