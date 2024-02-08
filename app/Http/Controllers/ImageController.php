<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Http\Resources\ImageResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ImageController extends Controller
{
    public function uploadImage(StoreImageRequest $request)
    {
        $imageName = null;
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(Image::IMAGE_PATH, $imageName);
        }
        $image = Image::create([
            'image' => $imageName
        ]);
        return new Response(['status' => true, 'message' => 'Successfully uploaded', 'data' => new ImageResource($image)], 200);
    }
}