<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'nama' => 'Admin Kreapedia',
            'email' => 'kreapedianus@gmail.com',
            'no_wa' => '6285161306932',
            'password' => bcrypt('password'),
            'tanggal_lahir' => now(),
            'job' => 'Admin Kreapedia',
            'role' => 'sadmin',
            'status' => true,
            'slug' => 'admin-kreapedia',
        ]);

        \App\Models\About::create([
            'kata_pengantar' => 'Kreapedia Nusa Sejahtera merupakan koperasi yang menghimpun para pelaku ekonomi kreatif dan bergerak di bidang jasa yaitu media, event organizer, digital marketing, dan jasa konsultan. Masing-masing unit usaha kami mempunyai keunggulan sesuai layanan yang ditawarkan. Model koperasi multipihak yang kami bangun di Kreapedia bertujuan agar dapat memberikan dampak ekonomi dan sosial.',
            'title' => 'Menciptakan lingkungan bisnis yang lebih transparan',
            'deskripsi' => 'Kreapedia Nusa Sejahtera merupakan koperasi yang menghimpun para pelaku ekonomi kreatif dan bergerak di bidang jasa yaitu media, event organizer, digital marketing, dan jasa konsultan.',
            'konten' => 'ini konten',
            'video' => 'https://www.youtube.com/embed/XFUFWg-ClWw',
            'visi' => 'Visi Perusahaan',
            'misi' => 'Misi Perusahaan',
            'slug' => 'menciptakan-lingkungan-bisnis-yang-lebih-transparan',
        ]);

        \App\Models\ProfileCompany::create([
            'nama_perusahaan' => 'Kreapedia',
            'alamat' => 'Jl. Raya Jemursari No.76 Blok. D 3-4',
            'kota' => 'Surabaya',
            'negara' => 'Indonesia',
            'no_wa' => '6285161306932',
            'email' => 'kreapedianus@gmail.com',
            'instagram' => 'https://www.instagram.com/kreapediaofficial/',
            'gambar' => 'logo-dashboard.png',
            'slug' => 'kreapedia-nusa-sejahtra',
        ]);

        \App\Models\WelcomeSection::create([
            'kalimat_pertama' => 'Welcome to',
            'kalimat_kedua' => 'Kreapedia',
            'caption' => 'Ini penjelasan dari kreapedia ya gusy ya..',
            'slug' => 'welcome-to-kreapedia',
        ]);
    }
}
