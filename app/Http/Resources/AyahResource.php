<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AyahResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'number' => $this->number,
            'text' => $this->text,
            'number_in_surah' => $this->number_in_surah,
            'juz' => $this->juz,
            'manzil' => $this->manzil,
            'page' => $this->page,
            'ruku' => $this->ruku,
            'hizb_quarter' => $this->hizb_quarter,
            'sajda' => $this->sajda,
            'audio' => $this->audio,
            'audio_secondary' => $this->audio_secondary,
        ];
    }
}
