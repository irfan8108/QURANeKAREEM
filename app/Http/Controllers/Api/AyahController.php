<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ayah;
use Illuminate\Http\Request;
use App\Http\Resources\AyahResource;

class AyahController extends Controller
{
    public function index()
    {
        $ayahs = Ayah::with('surah')->paginate(20);
        return AyahResource::collection($ayahs);
    }

    public function show(Ayah $ayah)
    {
        return new AyahResource($ayah->load('surah'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $ayahs = Ayah::search($query)->paginate(20);
        return AyahResource::collection($ayahs);
    }
}
