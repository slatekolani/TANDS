<?php

namespace Database\Seeders;

use App\Models\HeroSlide;
use Database\Seeders\Concerns\CopiesLegacyImages;
use Illuminate\Database\Seeder;

class HeroSlideSeeder extends Seeder
{
    use CopiesLegacyImages;

    public function run()
    {
        $slides = [
            ['Images/batch3/YZVS7844.JPG', 'Public Speaking at EAC', 'A public speaker grinding out at East African Community HQ'],
            ['Images/batch2/TUN_6094.jpg', 'Team Debate at EAC', 'A debate team at East African community'],
            ['Images/EASDCImages/Training Debates.JPG', 'Debate Training', 'Students enjoying their training for Debates'],
            ['Images/EASDCImages/Quiz Challenge.JPG', 'Quiz Challenge Training', 'Students getting training for Quiz Challenge'],
            ['Images/batch3/YZVS7859.JPG', 'Public Speaking at EAC HQ', 'Public speaking at East African Community HQ'],
            ['Images/batch3/YZVS7167.JPG', 'Making the Argument', 'A student giving out debate points'],
            ['Images/batch3/YZVS7942.JPG', 'Sharing Their Motions', 'Students giving out their motive inside East Africa Community HQ'],
            ['Images/batch3/YZVS8223.JPG', 'Cornerstone Schools, Champions', 'A winning team of Cornerstone Schools'],
            ['Images/batch2/TUN_6363.jpg', 'At the EAC Headquarters', 'At East African Community Head Quaters'],
        ];

        foreach ($slides as $index => [$source, $caption, $description]) {
            $path = $this->copyLegacyImage($source, 'hero');
            if (! $path) {
                continue;
            }

            HeroSlide::updateOrCreate(
                ['image_path' => $path],
                ['caption' => $caption, 'description' => $description, 'sort_order' => $index, 'is_active' => true]
            );
        }
    }
}
