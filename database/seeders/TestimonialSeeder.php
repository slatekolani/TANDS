<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run()
    {
        $testimonials = [
            [
                'author_name' => 'Glory Epiphany Kisamo',
                'message' => "Hello, I'm Glory Epiphany Kisamo. I had the opportunity to participate in the EASDC's 2023 round at Turkish Maarif Arusha. To be honest, I expected it to be focused solely on debate, public speaking, and quiz challenges, but to my surprise, it led to many life experiences. I learned a lot about the world and how it evolves. I also gained some valuable life skills, and the fun was indescribable. Most importantly, I gained knowledge about climate change, its causes, effects, and measures to overcome it. Overall, the debate championship has built confidence and competitiveness in me",
            ],
            [
                'author_name' => 'Harry Archibald Mangesho',
                'message' => 'My name is Harry Archibald Mangesho, and I am a Form Six graduate from Cornerstone Leadership Academy. I have participated in both national and East Africa debates championships for two years in the quiz challenge category, winning three times in a row with my team. Through these championships, I have learned the importance of teamwork, building confidence through speeches, and developing my IQ by gaining general knowledge about the world. This experience has helped my team and me nurture confidence, consistency, and a spirit of success in everything we do and learn',
            ],
            [
                'author_name' => 'Noreen Wenseslaus Massawe',
                'message' => "My name is Noreen Wenseslaus Massawe, a 2024 graduate from St. Jude High School. I have participated in the National Debates Championships for three years, primarily in the public speaking category. For two years, I reached the finals and held the sixth position for Best Public Speaker. I would be remiss if I didn't appreciate the countless skills I have gained through the championships and the extensive network I have built with different people and students around Tanzania. This experience has increased my creativity and significantly boosted my confidence.",
            ],
            [
                'author_name' => 'Anord Godfrey Magesa',
                'message' => 'My name is Anord Godfrey Magesa, and I am a Form Six graduate from Cornerstone Leadership Academy. I was among the students who participated in the Tanzania National Debates Championship (TNDC) in the quiz challenge category, where my team became the first champions from Cornerstone Leadership Academy. Through these tournaments, I have learned the values of hard work, teamwork, and the art of researching. This experience has helped me not only in various quizzes but also in my daily activities, including academics and extracurricular activities',
            ],
            [
                'author_name' => 'Marystella Cosmas Lyimo',
                'message' => "The Tanzania National Debates Championship (TNDC) has been a wonderful experience for me. It's one of the places where I have had to use my mind a lot, aside from an examination room. I have also been able to come up with creative ways to make my speeches interesting. Overall, TNDC is a great place to showcase your skills and gain more confidence by pushing yourself out of your comfort zone. Additionally, I have met people who have made memorable contributions to my life.",
            ],
        ];

        foreach ($testimonials as $index => $testimonial) {
            Testimonial::updateOrCreate(
                ['author_name' => $testimonial['author_name']],
                ['message' => $testimonial['message'], 'sort_order' => $index, 'is_active' => true]
            );
        }
    }
}
