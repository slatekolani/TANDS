<?php

namespace Database\Seeders;

use App\Models\GalleryImage;
use Database\Seeders\Concerns\CopiesLegacyImages;
use Illuminate\Database\Seeder;

class GalleryImageSeeder extends Seeder
{
    use CopiesLegacyImages;

    public function run()
    {
        $images = [
            ['Images/batch2/_TM_0462.jpg', 'Defending her point!', 'It takes courage and confidence', true],
            ['Images/IMG_9169.jpg', 'Food Crushing!', 'When the food is great, who forgets to holler?', true],
            ['Images/IMG_9173.jpg', 'Team work!', 'The boys preparing for the Quiz Challenge', true],
            ['Images/IMG_9175.jpg', 'Team work!', 'The girls preparing for the Quiz Challenge', true],
            ['Images/IMG_9789.jpg', 'Celebration!', 'Team celebrating victory', true],
            ['Images/IMG_9823.jpg', 'Excitement!', "She didn't see it coming", true],
            ['Images/batch2/_TM_0317.jpg', 'Public Speaking!', 'Giving out Facts', false],
            ['Images/batch2/IMG_8872.jpg', 'Mentoring!', 'Students Taking knowledge', false],
            ['Images/batch2/IMG_8967.jpg', 'Debating!', 'Convincing the crowd', false],
        ];

        foreach ($images as $index => [$source, $title, $caption, $featuredHome]) {
            $path = $this->copyLegacyImage($source, 'gallery');
            if (! $path) {
                continue;
            }

            GalleryImage::updateOrCreate(
                ['image_path' => $path],
                ['title' => $title, 'caption' => $caption, 'is_featured_home' => $featuredHome, 'sort_order' => $index]
            );
        }
    }
}
