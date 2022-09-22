<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\News;
use App\Models\User;
use App\Models\Apply;
use App\Models\Category;
use App\Models\Prospect;
use App\Models\Startup;
use App\Models\Work;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Sukron Anugrah',
            'username' => 'Sukron',
            'email' => 'sukron@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        // ini buat category
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        Category::create([
            'name' => 'Design',
            'slug' => 'design'
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        // ini buat berita boong
        News::Factory(15)->create();
        Prospect::Factory(5)->create();
        Startup::Factory(3)->create();
        Work::Factory(3)->create();
        Work::Factory(3)->create();

        Apply::create([
            'title' => 'mbuh',
            'idcard' => '09374746464847446',
            'name' => 'kacung',
            'gander' => 'laki',
            'address' => 'serang',
            'city' => 'serang',
            // 'different' => 'adds',
            'date' => '09/09/2000',
            'email' => 'samsul@gmail.com',
            'phone' => '085691468025',
            'education' => 'smk',
            'school' => 'smk',
            'major' => 'smk',
            'gpa' => '3.97',
            'graduation' => '090823',
            'course1' => 'gapaernah',
            'course2' => 'gapaerna',
            'course3' => 'gapaerna',
            'experience1' => 'belumpernah',
            'experience2' => 'gapaerna',
            'experience3' => 'gapaerna',
            'cv' => 'cv.pdf',
            'image' => 'gambar'
        ]);
        // ini buat jobst 
        // Prospect::create([
        //     'title' => 'Mobile Developer',
        //     'slug' => 'mobile-developer',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat soluta corporis ut ipsam sit laborum repellendus iure magni impedit id nesciunt saepe ipsum quis veniam enim at nihil temporibus animi modi odit, nulla harum quia! Atque numquam, soluta blanditiis quibusdam eos illum ducimus ipsam culpa eveniet velit similique placeat distinctio!'
        // ]);
        // Prospect::create([
        //     'title' => 'Web Developer',
        //     'slug' => 'web-developer',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat soluta corporis ut ipsam sit laborum repellendus iure magni impedit id nesciunt saepe ipsum quis veniam enim at nihil temporibus animi modi odit, nulla harum quia! Atque numquam, soluta blanditiis quibusdam eos illum ducimus ipsam culpa eveniet velit similique placeat distinctio!'
        // ]);
        // Prospect::create([
        //     'title' => 'Data Scientist',
        //     'slug' => 'data-scentist',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat soluta corporis ut ipsam sit laborum repellendus iure magni impedit id nesciunt saepe ipsum quis veniam enim at nihil temporibus animi modi odit, nulla harum quia! Atque numquam, soluta blanditiis quibusdam eos illum ducimus ipsam culpa eveniet velit similique placeat distinctio!'
        // ]);
        // Prospect::create([
        //     'title' => 'Android Developer',
        //     'slug' => 'android-developer',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat soluta corporis ut ipsam sit laborum repellendus iure magni impedit id nesciunt saepe ipsum quis veniam enim at nihil temporibus animi modi odit, nulla harum quia! Atque numquam, soluta blanditiis quibusdam eos illum ducimus ipsam culpa eveniet velit similique placeat distinctio!'
        // ]);
    }
}

