<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CollectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function getCollections(Request $request)
    {

        $data = Collection::all();

        foreach ($data as $item) {
            $imageContent = Storage::get($item->image);
            $item->image = base64_encode($imageContent);
        }

        return response()->json($data, 200);
    }

    public function storeCollection(Request $request)
    {
        $image = $request->file('image');
        $path = $image->store('public/images');

        Collection::create([
            'name' => $request->name,
            'image' => $path
        ]);

        return response()->json(['path' => $path], 200);
    }
}