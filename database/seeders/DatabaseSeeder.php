<?php

namespace Database\Seeders;

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
        $this->call([
            AdminUserSeeder::class,
            SettingSeeder::class,
            HeroSlideSeeder::class,
            GrowthStatSeeder::class,
            ProgramSeeder::class,
            ActivitySeeder::class,
            TeamMemberSeeder::class,
            TestimonialSeeder::class,
            PartnerSeeder::class,
            GalleryImageSeeder::class,
            EventSeeder::class,
        ]);
    }
}
