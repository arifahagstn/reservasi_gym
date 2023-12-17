<?php

namespace App\Http\Controllers;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CloudinaryStorage extends Controller
{
    private const folder_path = 'tutorial';

    public static function path($path)
    {
        return pathinfo($path, PATHINFO_FILENAME);
    }

    public static function upload($image, $filename)
    {
        $newFilename = str_replace(' ', '_', $filename);
        $public_id = date('Y-m-d_His') . '_' . self::path($newFilename);

        try {
            $result = Cloudinary::upload($image, [
                "public_id" => $public_id,
                "folder" => self::folder_path
            ]);

            Log::info('Cloudinary upload result: ' . json_encode($result));

            return $result;
        } catch (\Exception $e) {
            Log::error('Cloudinary upload error: ' . $e->getMessage());
            return null;
        }
    }

    public static function replace($path, $image, $public_id)
    {
        self::delete($path);
        return self::upload($image, $public_id);
    }

    public static function delete($path)
    {
        $public_id = self::folder_path . '/' . self::path($path);

        try {
            $result = Cloudinary::destroy($public_id);
            Log::info('Cloudinary delete result: ' . json_encode($result));
            return $result;
        } catch (\Exception $e) {
            Log::error('Cloudinary delete error: ' . $e->getMessage());
            return null;
        }
    }
}
