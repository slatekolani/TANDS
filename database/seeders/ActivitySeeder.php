<?php

namespace Database\Seeders;

use App\Models\Activity;
use Database\Seeders\Concerns\CopiesLegacyImages;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    use CopiesLegacyImages;

    public function run()
    {
        $activities = [
            [
                'title' => 'DEBATES',
                'description' => "The debate program in the Tanzania National Debate Society trains participants in structured argumentation and critical thinking. Debates are organized on a range of topics, allowing participants to research, formulate, and present arguments both for and against a given motion. This program emphasizes the importance of evidence-based reasoning, quick thinking, and respectful rebuttal. By participating in debates, individuals develop the skills necessary to engage in intellectual discussions, promote diverse viewpoints, and advocate for their positions effectively, aligning with the society's mission to cultivate informed and persuasive debaters.",
                'images' => ['Images/batch3/YZVS7167.JPG', 'Images/batch3/YZVS7142.JPG'],
            ],
            [
                'title' => 'QUIZ CHALLENGE',
                'description' => 'The quiz challenge program of the Tanzania National Debate Society engages participants in a competitive and educational format that tests their knowledge on various subjects, including history, science, current events, and general knowledge. Teams or individuals answer a series of questions under timed conditions, promoting quick thinking and broad intellectual engagement. This program aims to stimulate curiosity and learning among participants, fostering a culture of knowledge and academic excellence. By participating in quiz challenges, individuals enhance their cognitive abilities and learn to collaborate and compete in a spirited yet educational environment.',
                'images' => ['Images/batch3/YZVS7420.JPG', 'Images/IMG_9173.jpg'],
            ],
            [
                'title' => 'PUBLIC SPEAKING',
                'description' => "In the Tanzania National Debate Society, the public speaking program focuses on enhancing participants' oratory skills by allowing them to present on various topics to diverse audiences. Participants learn to express ideas clearly and confidently, honing their ability to engage and persuade listeners. This program includes workshops on speech writing, voice modulation, and effective body language. Public speaking events encourage individuals to articulate their thoughts coherently and compellingly, reflecting the society's goal to foster articulate and informed citizens capable of contributing to public discourse.",
                'images' => ['Images/batch3/YZVS7844.JPG', 'Images/batch3/YZVS7859.JPG'],
            ],
        ];

        foreach ($activities as $index => $activity) {
            [$image1, $image2] = $activity['images'];

            Activity::updateOrCreate(
                ['title' => $activity['title']],
                [
                    'description' => $activity['description'],
                    'image_path_1' => $this->copyLegacyImage($image1, 'activities'),
                    'image_path_2' => $this->copyLegacyImage($image2, 'activities'),
                    'sort_order' => $index,
                    'is_active' => true,
                ]
            );
        }
    }
}
