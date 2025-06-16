<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipsKarir; // Import model

class TipsKarirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipsKarir::create([
            'judul' => 'Ketahui Hak Kerja Penyandang Disabilitas dan Peluang Karirnya',
            'link' => 'https://blog.myskill.id/tips-karir/ketahui-hak-kerja-penyandang-disabilitas-dan-peluang-karirnya/',
            'sumber' => 'MySkill.id',
            'gambar_url' => 'https://placehold.co/600x400/3498db/ffffff?text=MySkill.id'
        ]);

        TipsKarir::create([
            'judul' => 'Tips Menyesuaikan Jenis Pekerjaan dengan Kemampuan dan Ragam Disabilitas',
            'link' => 'https://www.tempo.co/politik/tips-menyesuaikan-jenis-pekerjaan-dengan-kemampuan-dan-ragam-disabilitas-455861',
            'sumber' => 'Tempo.co',
            'gambar_url' => 'https://placehold.co/600x400/2ecc71/ffffff?text=Tempo.co'
        ]);

        TipsKarir::create([
            'judul' => 'Tips dari Pengacara Tunadaksa untuk Kesuksesan Karir Penyandang Disabilitas',
            'link' => 'https://www.liputan6.com/amp/4881555/tips-dari-pengacara-tunadaksa-untuk-kesuksesan-karir-penyandang-disabilitas',
            'sumber' => 'Liputan6.com',
            'gambar_url' => 'https://placehold.co/600x400/e74c3c/ffffff?text=Liputan6.com'
        ]);
    }
}