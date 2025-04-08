<?php

namespace Database\Seeders;

use App\Models\Surah;
use App\Models\Ayah;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class QuranSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('surahs')->truncate();
        DB::table('ayahs')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $json = File::get(database_path('QURANeKAREEM.json'));
        $data = json_decode($json, true);

        foreach ($data['surahs'] as $surahData) {
            $surah = Surah::create([
                'number' => $surahData['number'],
                'name' => $surahData['name'],
                'english_name' => $surahData['englishName'],
                'english_name_translation' => $surahData['englishNameTranslation'],
                'revelation_type' => $surahData['revelationType'],
            ]);

            foreach ($surahData['ayahs'] as $ayahData) {
                Ayah::create([
                    'surah_id' => $surah->id,
                    'number' => $ayahData['number'],
                    'text' => $ayahData['text'],
                    'number_in_surah' => $ayahData['numberInSurah'],
                    'juz' => $ayahData['juz'],
                    'manzil' => $ayahData['manzil'],
                    'page' => $ayahData['page'],
                    'ruku' => $ayahData['ruku'],
                    'hizb_quarter' => $ayahData['hizbQuarter'],
                    'sajda' => !$ayahData['sajda'] ? false : true,
                    'audio' => $ayahData['audio'],
                    'audio_secondary' => is_array($ayahData['audioSecondary']) ? $ayahData['audioSecondary'][0] : $ayahData['audioSecondary'],
                ]);
            }
        }
    }
}
