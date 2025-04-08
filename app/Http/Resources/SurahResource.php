<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SurahResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'number' => $this->number,
            'name' => $this->name,
            'english_name' => $this->english_name,
            'english_name_translation' => $this->english_name_translation,
            'revelation_type' => $this->revelation_type,
            'ayahs' => AyahResource::collection($this->whenLoaded('ayahs')),
        ];
    }
}
