<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Database\Seeders\Concerns\CopiesLegacyImages;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    use CopiesLegacyImages;

    public function run()
    {
        $members = [
            [
                'name' => 'Christopher Michoro',
                'role_title' => 'Executive Director',
                'photo' => 'Images/Chris Michoro.jpeg',
                'bio' => 'Christopher Michoro is an accomplished debater known for his strategic thinking and articulate expression. With a background in political science, Christopher has honed his skills in argumentation and public speaking.',
            ],
            [
                'name' => 'Susan Ejalam',
                'role_title' => 'Regional Co-ordinator',
                'photo' => 'Images/batch2/Suzan.jpg',
                'bio' => 'Debate Enthusiast and passionate about intellectually engaging activities with a rich background of coaching and adjudicating in debates and public speaking. She is a self-driven person, a go-getter in her strides and has strong abilities in organizational skills and keen attention to details and having served as the Chair of the Organizing Committee (TANDS) for 5+ years.',
            ],
            [
                'name' => 'ShalomAngela Lengeju',
                'role_title' => 'Legal Affairs Manager',
                'photo' => 'Images/batch2/Shalom.jpg',
                'bio' => "ShalomAngela Lengeju is an accomplished debater and a debate and public speaking trainer. She won first place in the Mwalimu Nyerere Invitational Debate Championship in Kenya (2019), second place in EASDC (2019), and third place in AOSDC (2019). She received the Future Upcoming Speaker award and Best Team from Arusha award at AOSDC (2019), and fifth place in Public Speaking at MNIV Kenya (2019). ShalomAngela debated in MNIV 2019 at Dar es Salaam and has organized and judged tournaments such as EASDC 2023, EASDC 2022, TNDC 2022, and TNDC 2021. She is the founding chairperson of the Debate Club of the Law Student's Association at Tumaini University Makumira, where she was awarded a Bachelor of Laws. ShalomAngela is an alumni of the Girls Livelihood and Mentorship Initiative and is currently a student at the Law School of Tanzania",
            ],
        ];

        foreach ($members as $index => $member) {
            TeamMember::updateOrCreate(
                ['name' => $member['name']],
                [
                    'role_title' => $member['role_title'],
                    'bio' => $member['bio'],
                    'photo_path' => $this->copyLegacyImage($member['photo'], 'team'),
                    'sort_order' => $index,
                    'is_active' => true,
                ]
            );
        }
    }
}
