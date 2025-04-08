<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Surah;
use Illuminate\Http\Request;
use App\Http\Resources\SurahResource;

class SurahController extends Controller
{
    public function index()
    {
        $surahs = Surah::with('ayahs')->paginate(20);
        return SurahResource::collection($surahs);
    }

    public function show(Surah $surah)
    {
        return new SurahResource($surah->load('ayahs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => 'required|integer|unique:surahs',
            'name' => 'required|string',
            'english_name' => 'required|string',
            'english_name_translation' => 'required|string',
            'revelation_type' => 'required|string',
        ]);

        $surah = Surah::create($validated);
        return new SurahResource($surah);
    }

    public function update(Request $request, Surah $surah)
    {
        $validated = $request->validate([
            'name' => 'string',
            'english_name' => 'string',
            'english_name_translation' => 'string',
            'revelation_type' => 'string',
        ]);

        $surah->update($validated);
        return new SurahResource($surah);
    }

    public function destroy(Surah $surah)
    {
        $surah->delete();
        return response()->json(['message' => 'Surah deleted successfully']);
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $surahs = Surah::search($query)->paginate(20);
        return SurahResource::collection($surahs);
    }
}
