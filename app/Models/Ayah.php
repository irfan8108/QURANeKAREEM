<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ayah extends Model
{
    use HasFactory;

    protected $fillable = [
        'surah_id',
        'number',
        'text',
        'number_in_surah',
        'juz',
        'manzil',
        'page',
        'ruku',
        'hizb_quarter',
        'sajda',
        'audio',
        'audio_secondary'
    ];

    protected $casts = [
        'audio_secondary' => 'array',
        'sajda' => 'boolean'
    ];

    public function surah()
    {
        return $this->belongsTo(Surah::class);
    }

    public function scopeSearch($query, $term)
    {
        return $query->where('text', 'LIKE', "%{$term}%")
            ->orWhere('number', 'LIKE', "%{$term}%");
    }
}
