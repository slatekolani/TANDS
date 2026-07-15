<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run()
    {
        $programs = [
            [
                'icon_class' => 'fas fa-trophy', 'icon_color' => 'gold', 'title' => 'Tournaments',
                'description' => 'Participate in exciting tournaments and competitions designed to challenge and inspire participants to achieve excellence.',
            ],
            [
                'icon_class' => 'fas fa-briefcase', 'icon_color' => 'darkblue', 'title' => 'Internship',
                'description' => 'Gain hands-on experience and professional skills through our comprehensive internship programs tailored to your career goals.',
            ],
            [
                'icon_class' => 'fas fa-graduation-cap', 'icon_color' => 'green', 'title' => 'Training',
                'description' => 'Enhance your knowledge and skills with our expert-led training sessions designed for personal and professional growth.',
            ],
            [
                'icon_class' => 'fas fa-campground', 'icon_color' => 'brown', 'title' => 'Camps',
                'description' => 'Join our adventurous camps that offer unique experiences, team-building activities, and a chance to connect with nature.',
            ],
        ];

        foreach ($programs as $index => $program) {
            Program::updateOrCreate(['title' => $program['title']], $program + ['sort_order' => $index, 'is_active' => true]);
        }
    }
}
