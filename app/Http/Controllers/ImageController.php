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
        if ($request->file('filename')) {
            $image = $request->file('filename');
            $imageName = $image->getClientOriginalName();
            $image->move(Image::IMAGE_PATH, $imageName);
        }
        $image = Image::create([
            'filename' => $imageName
        ]);
        return new Response(['status' => true, 'message' => 'Successfully uploaded', 'data' => new ImageResource($image)], 200);
    }
    public function downloadImage($id)
    {
        $image = Image::find($id);
        if (!$image) {
            return new Response(['status' => false, 'message' => 'Image not found'], 404);
        }
        $filePath = Image::IMAGE_PATH .'/'. $image->filename;
        if (file_exists($filePath)) {
            return response()->download($filePath, $image->filename);
        } else {
            return new Response(['status' => false, 'message' => 'File not found'], 404);
        }
    }
    public function index(){
        $images = Image::all();
        return new Response(['status' => true, 'message' => 'Successfully', 'data' => ImageResource::collection($images)], 200);
    }
}
