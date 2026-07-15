<?php

namespace Database\Seeders;

use App\Models\Event;
use Database\Seeders\Concerns\CopiesLegacyImages;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    use CopiesLegacyImages;

    public function run()
    {
        foreach ($this->events() as $data) {
            $event = Event::updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'title' => $data['title'],
                    'series' => $data['series'],
                    'year' => $data['year'],
                    'theme' => $data['theme'] ?? null,
                    'status' => $data['status'],
                    'event_date' => $data['event_date'] ?? null,
                    'location' => $data['location'] ?? null,
                    'banner_image' => $this->copyLegacyImage($data['banner'], 'events'),
                    'description' => $data['description'],
                    'is_published' => true,
                    'sort_order' => $data['sort_order'],
                ]
            );

            $event->sections()->delete();
            foreach ($data['sections'] as $index => $section) {
                $event->sections()->create([
                    'title' => $section['title'],
                    'body' => $section['body'],
                    'sort_order' => $index,
                ]);
            }

            $event->galleryImages()->delete();
            foreach ($data['gallery'] ?? [] as $index => $image) {
                $path = $this->copyLegacyImage($image['source'], 'events/gallery');
                if (! $path) {
                    continue;
                }
                $event->galleryImages()->create([
                    'image_path' => $path,
                    'caption' => $image['caption'] ?? null,
                    'sort_order' => $index,
                ]);
            }
        }
    }

    private function events(): array
    {
        return [
            // ─── EASDC 2024 ─────────────────────────────────────────
            [
                'slug' => 'EASDC',
                'series' => 'EASDC',
                'year' => '2024',
                'title' => 'East African Schools Debate Championship 2024',
                'theme' => 'Fostering access to justice for all and building effective, accountable and inclusive institutions at all levels.',
                'status' => 'past',
                'event_date' => '2024-09-07',
                'location' => 'St. Jude Secondary School, USA River',
                'banner' => 'Images/batch3/YZVS7942.JPG',
                'sort_order' => 10,
                'description' => '<p>Here is where you can access the Tab for East African Schools Debate Championship: <a href="https://easdc2024.calicotab.com/easdc2024/" target="_blank">EASDC 2024 TAB</a></p><p><a href="https://thevisualpowers.pixieset.com/debate/" target="_blank">View full event photo gallery</a></p><p><a href="https://docs.google.com/spreadsheets/d/1oj_41AybU1t7BMvFpwrw7o7XYg-omkqFyYx69LOZIX4/edit?gid=9514195#gid=9514195" target="_blank">Progress overview</a></p>',
                'gallery' => [
                    ['source' => 'Images/EASDCImages/Day 1 Registration.JPG', 'caption' => 'Students arriving at campus'],
                    ['source' => 'Images/EASDCImages/Day 1 Registration1.JPG', 'caption' => 'Registration process'],
                    ['source' => 'Images/EASDCImages/Day 1 Registration2.JPG', 'caption' => 'Students preparing for debates'],
                    ['source' => 'Images/EASDCImages/Day 1 Registration3.JPG', 'caption' => 'Opening ceremony'],
                ],
                'sections' => [
                    [
                        'title' => 'Event Schedule',
                        'body' => '<table><thead><tr><th>Activity</th><th>Date</th><th>Place(s)</th></tr></thead><tbody>'
                            . '<tr><td>Arrival of Participants</td><td>07/09/2024</td><td>St. Jude Secondary School (USA River)</td></tr>'
                            . '<tr><td>Launching &amp; Training</td><td>08/09/2024</td><td>St. Jude Secondary School (USA River)</td></tr>'
                            . '<tr><td>Debate, Public Speaking &amp; Quiz Preliminaries</td><td>09-10/09/2024</td><td>St. Jude Secondary School (USA River)</td></tr>'
                            . '<tr><td>Finals &amp; Closing Ceremony</td><td>11/09/2024</td><td>East African Community (EAC)</td></tr>'
                            . '<tr><td>Excursion</td><td>12/09/2024</td><td>Lake Duluti, Shoppers Supermarket</td></tr>'
                            . '<tr><td>Departure</td><td>13/09/2024</td><td>St. Jude Secondary School (USA River)</td></tr>'
                            . '</tbody></table>',
                    ],
                    [
                        'title' => 'Attending Schools',
                        'body' => '<p>Total participants: <strong>214</strong></p><ul>'
                            . '<li>St. Jude Secondary School</li>'
                            . "<li>St. Jude Girl's Secondary School</li>"
                            . '<li>St. Mariagoreth Secondary School</li>'
                            . '<li>Cornerstone Leadership Academy</li>'
                            . '<li>Pandahill Secondary School</li>'
                            . "<li>St Mary's Duluti</li>"
                            . '<li>Notre Dame Secondary School</li>'
                            . '<li>Henry Gogarty Secondary School</li>'
                            . '</ul>',
                    ],
                ],
            ],

            // ─── EASDC 2025 ─────────────────────────────────────────
            [
                'slug' => 'EASDC2025',
                'series' => 'EASDC',
                'year' => '2025',
                'title' => 'East African Schools Debate Championship 2025',
                'theme' => 'Empowering the next generation to debate critical issues for a sustainable and inclusive East Africa.',
                'status' => 'past',
                'event_date' => '2025-09-04',
                'location' => 'St. Jude Secondary School, USA River',
                'banner' => 'Images/EASDCImages/Training Debates.JPG',
                'sort_order' => 20,
                'description' => '<p>Empowering the next generation to debate critical issues for a sustainable and inclusive East Africa.</p>',
                'sections' => [
                    [
                        'title' => 'Debate Motions',
                        'body' => '<p><strong>Round 1:</strong> This House Believes That achieving long-term poverty eradication in East Africa is impossible without universal access to free and quality education.</p>'
                            . '<p><strong>Round 2 Info Slide:</strong> In parts of East Africa, practices such as Female Genital Mutilation (FGM), early marriage, and domestic roles are still used to justify withdrawing girls from school. In the context of this motion, local community leaders include tribal leaders and village elders, excluding local government leaders.</p>'
                            . "<p><strong>Round 2 Motion:</strong> This House Would hold local community leaders more responsible than the state for prolonged cultural practices which prevent girls' access to education.</p>"
                            . '<p><strong>Round 3:</strong> Impromptu (To be announced during the event).</p>'
                            . '<p><strong>Round 5 Info Slide:</strong> In 2023, an East African country allocated over 35% of its education budget to universities serving a small urban elite, while rural schools lacked basic infrastructure, teachers, and textbooks.</p>'
                            . '<p><strong>Round 5 Motion:</strong> This House Believes that government spending on higher education should be redirected towards improving primary and secondary education in rural areas.</p>'
                            . '<p><strong>Octo Finals:</strong> This House regrets the rise of identity politics in the 21st century.</p>'
                            . '<p><strong>Quarter Finals:</strong> Impromptu (To be announced during the event).</p>'
                            . '<p><strong>Semi Finals Info Slide:</strong> East Africa faces several ongoing conflicts, including tensions in Eastern Congo, the civil war in South Sudan, border disputes between Ethiopia and Sudan, and the insurgency in Somalia. A regional East African-led mediation refers to a conflict resolution effort initiated and managed by East African states or regional organisations such as the East African Community (EAC) or the Intergovernmental Authority on Development (IGAD). In contrast, international intervention involves the active role of external actors such as the United Nations, Western governments, Gulf states, or major international organisations in resolving conflicts.</p>'
                            . '<p><strong>Semi Finals Motion:</strong> This House would prioritise regional East African-led mediation over international intervention in resolving conflicts within the region.</p>'
                            . '<p><strong>Finals:</strong> To be released by the East African Legislative Assembly (EALA).</p>',
                    ],
                    [
                        'title' => 'Event Schedule',
                        'body' => '<table><thead><tr><th>Activity</th><th>Date</th><th>Place(s)</th></tr></thead><tbody>'
                            . '<tr><td>Arrival of Participants</td><td>04/09/2025</td><td>St. Jude Secondary School (USA River)</td></tr>'
                            . '<tr><td>Launching &amp; Training</td><td>05/09/2025</td><td>St. Jude Secondary School (USA River)</td></tr>'
                            . '<tr><td>Debate, Public Speaking &amp; Quiz Preliminaries</td><td>06-07/09/2025</td><td>St. Jude Secondary School (USA River)</td></tr>'
                            . '<tr><td>Finals &amp; Closing Ceremony</td><td>08/09/2025</td><td>East African Community (EAC)</td></tr>'
                            . '<tr><td>Excursion</td><td>09/09/2025</td><td>Lake Duluti, Arusha City</td></tr>'
                            . '<tr><td>Departure</td><td>10/09/2025</td><td>St. Jude Secondary School (USA River)</td></tr>'
                            . '</tbody></table>',
                    ],
                    [
                        'title' => 'Attending Schools',
                        'body' => '<p>Total participants: <strong>TBD</strong></p><ul>'
                            . '<li>St. Jude Secondary School</li>'
                            . '<li>Cornerstone Leadership Academy Tanzania</li>'
                            . '<li>St. Mariagoreth Secondary School</li>'
                            . '</ul>',
                    ],
                ],
            ],

            // ─── ADC 2025 ───────────────────────────────────────────
            [
                'slug' => 'ADC',
                'series' => 'ADC',
                'year' => '2025',
                'title' => 'Arusha Debate Championship 2025',
                'status' => 'past',
                'event_date' => '2025-03-15',
                'location' => 'UWC East Africa',
                'banner' => 'Images/ADC/Quiz Challenge.jpg',
                'sort_order' => 30,
                'description' => "<p>The Arusha Debate Championship brings together students from across the region to engage in thought-provoking debates on critical global and regional issues. Hosted at UWC East Africa, this year's championship promises to be an exciting platform for young minds to showcase their debating skills and critical thinking.</p>"
                    . '<p><a href="https://ovamedia53.pixieset.com/arushadebatefinal-1/" target="_blank">Event photos Set 1</a> &middot; <a href="https://ovamedia.pixieset.com/arushadebatechampionship/" target="_blank">Set 2</a> &middot; <a href="https://ovamedia.pixieset.com/arushadebateday2part1/" target="_blank">Set 3</a></p>',
                'sections' => [
                    [
                        'title' => 'Activities Included',
                        'body' => '<h4>Public Speaking</h4><p>Participants showcased their oratory skills, delivering powerful speeches on a variety of topics. This activity encouraged confidence, articulation, and the ability to engage an audience effectively.</p>'
                            . '<h4>Debates</h4><p>Teams faced off in spirited debates, arguing for or against thought-provoking motions. This tested critical thinking, teamwork, and the ability to construct compelling arguments under pressure.</p>'
                            . '<h4>Quiz Challenge</h4><p>A fast-paced trivia competition where participants answered questions across diverse categories. This highlighted quick thinking, knowledge retention, and competitive spirit.</p>',
                    ],
                    [
                        'title' => 'Debate Rounds',
                        'body' => '<p><strong>First Round:</strong> This house believes that scholarships for tertiary education should strictly be provided to students based on how poor they are as opposed to their talents and potentials.</p>'
                            . '<p><strong>Second Round:</strong> This House would pause all development of artificial intelligence (AI).</p>'
                            . '<p><em>Info slide:</em> The Department of Government Efficiency (DOGE), established under the Trump administration by Republicans, aims to streamline government operations and reduce inefficiency. Elon Musk, appointed to lead the department, advocates for using technology and innovation to improve government effectiveness. While Democrats have opposed DOGE, fearing potential job cuts and weakened regulations.</p>'
                            . '<p><strong>Third Round:</strong> This house, as the Democratic Party, would make active efforts to make DOGE bi-partisan instead of opposing it.</p>'
                            . '<p><strong>Quarter Finals:</strong> This house believes that the government should heavily subsidize post-secondary education.</p>'
                            . '<p><strong>Semi Finals:</strong> This house would require university students from developing countries who obtained education in the West to work in their country of origin for a number of years after graduation.</p>'
                            . '<p><em>Info slide:</em> The DRC-Rwanda conflict traces back to the 1994 Rwandan Genocide, after which millions of Hutu refugees, including former genocidaires, fled to eastern DRC, fueling tension. Rwanda has since intervened, citing security threats, while facing accusations. Bodies such as the African Union (AU), East African Community (EAC), and the International Conference on the Great Lakes Region (ICGLR) have historically played roles in mediation, conflict resolution, and peacekeeping within Africa.</p>'
                            . '<p><strong>Grand Finals:</strong> This house would prioritize regional African-led mediation over international intervention in resolving the DRC-Rwanda conflict.</p>',
                    ],
                ],
            ],

            // ─── ADC 2026 ───────────────────────────────────────────
            [
                'slug' => 'ADC2026',
                'series' => 'ADC',
                'year' => '2026',
                'title' => 'Arusha Debate Championship 2026',
                'theme' => 'Innovating Solutions – Creativity, Technology & Resilience',
                'status' => 'past',
                'event_date' => '2026-03-14',
                'location' => 'Turkish Maarif School, Arusha',
                'banner' => 'Images/ADC2026/hero.jpg',
                'sort_order' => 40,
                'description' => '<p>The Arusha Debate Championship 2026 brought together students from both primary and secondary schools across the region for two days of rigorous debate, eloquent public speaking, and intellectual competition. Hosted at Turkish Maarif School in Arusha on 14th &amp; 15th March 2026 (08:00 AM &ndash; 4:00 PM each day), the tournament was graced by a United Nations Official as Guest of Honor.</p>',
                'sections' => [
                    [
                        'title' => 'Event Gallery',
                        'body' => '<p><a href="https://ovagraphics.pixieset.com/arushadebate2026/" target="_blank">Event Photos — Set 1</a></p>'
                            . '<p><a href="https://ovagraphics.pixieset.com/arushadebate2026day2/" target="_blank">Event Photos — Set 2</a></p>'
                            . '<p><a href="https://ovamedia74.pixieset.com/arushadebateday2ep2/" target="_blank">Event Photos — Set 3</a></p>',
                    ],
                    [
                        'title' => 'Activities Included',
                        'body' => "<h4>Public Speaking</h4><p>Participants delivered powerful, well-crafted speeches on a range of topics. This category tested confidence, articulation, vocal projection, and the ability to hold an audience's attention from the opening word to the final call to action.</p>"
                            . '<h4>Debates</h4><p>Teams clashed in structured rounds, constructing compelling cases for or against challenging motions. Critical thinking, rapid rebuttal, and effective teamwork defined the winners at every stage of the competition.</p>',
                    ],
                ],
                'gallery' => [
                    ['source' => 'Images/ADC2026/DSC07699.jpg', 'caption' => 'Public Speaking at ADC 2026'],
                    ['source' => 'Images/ADC2026/DSC07830.jpg', 'caption' => 'Debates at ADC 2026'],
                    ['source' => 'Images/ADC2026/DSC07792.jpg', 'caption' => 'ADC 2026'],
                ],
            ],

            // ─── TNDC 2025 ──────────────────────────────────────────
            [
                'slug' => 'TNDC2025',
                'series' => 'TNDC',
                'year' => '2025',
                'title' => 'Tanzania National Debate Championship 2025',
                'status' => 'past',
                'event_date' => '2025-06-07',
                'location' => 'The School of St Jude',
                'banner' => 'Images/TNDC2025/Arrival at the tndc.jpg',
                'sort_order' => 50,
                'description' => '<p>The Tanzania National Debate Championship 2025 unites students nationwide to tackle pressing issues through debate. Held at The School of St Jude, it offers a dynamic stage for young debaters to shine and develop their skills.</p>'
                    . '<p><a href="https://herimo.pixieset.com/tndc2025/" target="_blank">Event photos</a></p>'
                    . '<p>Debate Tab Links: <a href="https://tndc.calicotab.com/tndc2025seniors/" target="_blank">Seniors</a> &middot; <a href="https://tndc.calicotab.com/TNDC2025JR/" target="_blank">Juniors</a> &middot; <a href="https://docs.google.com/spreadsheets/d/14DGLq__YiF0UGK4ScWDvHFOh9SX5ycSQtZmXdwqMY3Y/edit?usp=sharing" target="_blank">Public Speaking</a></p>',
                'gallery' => [
                    ['source' => 'Images/TNDC2025/Debating.jpg', 'caption' => 'Intense Debate Sessions'],
                    ['source' => 'Images/TNDC2025/Excitement.jpg', 'caption' => 'Event Excitement'],
                    ['source' => 'Images/TNDC2025/Group Discussing.jpg', 'caption' => 'Team Strategy Moments'],
                    ['source' => 'Images/TNDC2025/Participants discussing.jpg', 'caption' => 'Audience Engagement'],
                ],
                'sections' => [
                    [
                        'title' => 'Debate Motions',
                        'body' => '<p><strong>Round 1:</strong> This house will prioritize large scale education reforms over direct poverty relief programs in developing countries.</p>'
                            . '<p><em>Info slide:</em> The government of the United Republic of Tanzania has started the implementation of The Education and Vocational Training Policy of 2014 (2025 Edition) from January 2025. In the policy, a student is expected to complete secondary education (form 4) at 15 years of age and be ready for work life. According to the national and international laws however, this student is still considered a minor, and therefore they will be required to work as apprentices under supervision until the age of adulthood.</p>'
                            . '<p><strong>Round 2:</strong> This House Will Allow companies to hire child laborers in exchange for skill-based education opportunities.</p>'
                            . '<p><strong>Round 3:</strong> Impromptu</p>',
                    ],
                    [
                        'title' => 'Public Speaking Topics',
                        'body' => '<p><strong>Round 1 (Narrative Speech):</strong> You are a renowned professor in your field of study. Share the story of how you got there with the title "You cannot change the world if you cannot change yourself."</p>'
                            . '<p><strong>Round 2 (Selling Speech):</strong> Sell the idea of resilience while pursuing greatness in education under the title "When you pray for rain, you got to deal with the mud too."</p>'
                            . '<p><strong>Round 3 (Informative Speech):</strong> "Not every rich person had a car growing up; some just had a classroom." Wealth doesn\'t always come from inheritance; it also comes from education. Show how education can be used to break poverty, create wealth, and open doors to success.</p>',
                    ],
                ],
            ],

            // ─── TNDC 2026 ──────────────────────────────────────────
            [
                'slug' => 'TNDC2026',
                'series' => 'TNDC',
                'year' => '2026',
                'title' => 'Tanzania National Debate Championship 2026',
                'theme' => 'Innovating Solutions – Creativity, Technology & Resilience',
                'status' => 'upcoming',
                'event_date' => null,
                'location' => null,
                'banner' => 'Images/TNDC2025/Arrival at the tndc.jpg',
                'sort_order' => 5,
                'description' => '<p>The Tanzania National Debate Championship (TNDC) 2026 brings together students from across the nation to engage in rigorous debate and public speaking competitions. Under the theme <em>Innovating Solutions – Creativity, Technology &amp; Resilience</em>, participants will tackle motions spanning infrastructure, governance, the digital economy, and more.</p>',
                'gallery' => [
                    ['source' => 'Images/TNDC2025/Debating.jpg', 'caption' => 'Intense Debate Sessions'],
                    ['source' => 'Images/TNDC2025/Excitement.jpg', 'caption' => 'Event Excitement'],
                    ['source' => 'Images/TNDC2025/Group Discussing.jpg', 'caption' => 'Team Strategy Moments'],
                    ['source' => 'Images/TNDC2025/Participants discussing.jpg', 'caption' => 'Participants Engaging'],
                ],
                'sections' => [
                    [
                        'title' => 'Debate Motions',
                        'body' => '<h4>Round 1</h4><p><strong>Motion:</strong> This House Regrets the prioritization of mega infrastructure projects such as the SGR and flyovers over the modernization of rural feeder roads.</p>'
                            . '<h4>Round 2</h4><p><strong>Motion:</strong> This House believes that it is in the interest of the Republican Party to impeach Donald Trump.</p>'
                            . '<h4>Round 3</h4><p><strong>Motion:</strong> Impromptu</p>'
                            . '<h4>Round 4</h4><p><strong>Motion:</strong> This House Believes That the future of Tanzania\'s creative economy lies in digital content creation (e.g., vlogging, TikTok) rather than traditional arts such as painting and sculpture.</p>'
                            . '<h4>Round 5</h4><p><strong>Motion:</strong> Assuming feasibility, This House Would choose a world with zero poverty but no privacy.</p>'
                            . '<p><em>Info Slide:</em> A world with zero poverty means that every individual has access to basic needs such as food, shelter, healthcare, and education. A world with no privacy means that all personal information, activities, and communications are fully accessible and transparent.</p>'
                            . '<h4>Knockout Rounds</h4>'
                            . '<h4>Octo-Finals</h4><p><strong>Motion:</strong> This House Supports open borders.</p>'
                            . '<p><em>Info Slide:</em> For this debate, "open borders" is a hypothetical policy that would eliminate all routine immigration barriers, including visas, family caps, work-permit quotas, skill or income tests, and entry fees that exclude people solely because they are non-citizens of the receiving country. Border officials could still conduct customs inspections, enforce public health measures (e.g., temporary quarantine or proof of vaccination), and run narrowly targeted security checks on individuals listed as posing violent threats. Otherwise, anyone could freely enter, work, reside, and reunite with family in any country.</p>'
                            . '<h4>Quarter Finals</h4><p><strong>Motion:</strong> This House Believes That the quality of education in rural Tanzania should be prioritized over expanding universal access to secondary schools.</p>'
                            . '<h4>Semi Finals</h4><p><strong>Motion:</strong> This House Believes That adopting a new constitution should be an absolute priority for Tanzania over further electoral or economic reforms.</p>'
                            . '<h4>Grand Finals</h4><p><strong>Motion:</strong> TBA (To Be Announced)</p>',
                    ],
                    [
                        'title' => 'Public Speaking Topics',
                        'body' => '<h4>Round 1: Narrative Speech</h4><p><strong>Topic:</strong> The night to forget.</p>'
                            . '<p><em>Info Slide:</em> You are an inventor working on a groundbreaking innovation, then suddenly one night all your innovation process is bugged and the codes crash.</p>'
                            . '<h4>Round 2: Creative Speech</h4><p>Give a creative speech in line with the theme, under the title or employing the phrase: "The world is racing faster, but some of us are still running without shoes"</p>'
                            . '<h4>Round 3: Selling Speech</h4><p>Give a speech that sells a creative tech product that helps to train students to become resilient in their academics.</p>'
                            . '<h4>Round 4: Impromptu</h4><p>Topic to be revealed on the day.</p>'
                            . '<h4>Round 5: Inspirational Speech</h4><p>You are either Steve Jobs or Elon Musk; give a speech on the following topic: "Daring the impossible; Turning wild ideas into reality"</p>'
                            . '<h4>Public Speaking Knockout Rounds</h4>'
                            . '<h4>Octo Finals: Informative Speech</h4><p>You are a grandparent with a grandchild who is addicted to social media. Give a speech with the following title: "A generation that lives in updates and internet reactions rather than moments."</p>'
                            . '<h4>Quarter Finals: Impromptu</h4><p>Topic to be revealed on the day.</p>'
                            . '<h4>Semi Finals: Informative Speech</h4><p>Deliver a speech reflecting on the reality of living in two worlds and the impact it has on modern life.</p>'
                            . '<p><em>Info Slide:</em> Today\'s generation spends its life between the physical and digital world. People study, work, socialize and express themselves both in real life and online spaces. However, the dual existence is beginning to raise questions about identity, attention, relationships and what it truly means to be present. End your speech with: "we are the first generation living in two worlds but not fully present in either."</p>'
                            . '<h4>Grand Finals: Special Occasion Speech</h4><p><strong>Theme:</strong> Honoring Innovation</p>'
                            . '<p><em>Info Slide:</em> In an era where society celebrates public figures and powerful voices, many of the people truly shaping the modern world remain unseen — working quietly behind screens, systems and codes. Deliver a speech appreciating the silent innovators behind the scenes.</p>'
                            . '<p>Choose any of the following titles: The Geniuses we never clap for &middot; The spotlight speaks the backstage builds &middot; The silence system behind every spotlight</p>',
                    ],
                    [
                        'title' => 'Primary School Debate Motions',
                        'body' => "<p>TNDC 2026 debate motions for primary school pupils under the theme <em>Innovating Solutions – Creativity, Technology &amp; Resilience</em>.</p>"
                            . '<h4>Round 1</h4><p>This House Would ban children from using social media until they are sixteen years old.</p>'
                            . '<h4>Round 2</h4><p>This House Prefers a world where everyone speaks one global language instead of many local languages.</p>'
                            . '<h4>Round 3</h4><p>Impromptu.</p>'
                            . '<h4>Round 4</h4><p>This House Believes That it is better to fail at something difficult than to succeed at something easy.</p>'
                            . '<h4>Quarter Finals</h4><p>This House Regrets not having a "Failure Day" in every school in Tanzania.</p>'
                            . '<h4>Semi Finals</h4><p>This House Would ban the importation of foreign-made school uniforms and only allow uniforms produced by local tailors using creative designs.</p>'
                            . '<h4>Grand Finals</h4><p>TBA (To Be Announced).</p>',
                    ],
                    [
                        'title' => 'Quiz Challenge Rubric',
                        'body' => '<h4>General Guidelines</h4><ol>'
                            . '<li>Each quiz team shall consist of three members only (Quiz Whizzes).</li>'
                            . '<li>The competition will include Preliminary Rounds (3 matches) and Break Rounds (Quarter Finals, Semi Finals, and Grand Finale).</li>'
                            . '<li>Preliminary rounds will be based on point accumulation, while Break Rounds will follow a knockout format.</li>'
                            . '<li>A random draw will be conducted before each preliminary match to determine pairings.</li>'
                            . '<li>The top 8 teams after preliminaries will advance to the Quarter Finals.</li>'
                            . '<li>Quarter Finals will consist of four matches drawn using a power-protection seeding system.</li>'
                            . '<li>Semi Finals will feature four teams, and the two winners will proceed to the Grand Finale.</li>'
                            . '<li>Each team must select one member to participate in the Spelling Challenge during the Grand Finale.</li>'
                            . '<li>The official language of the quiz will be English; however, other official East African languages may occasionally be used where necessary.</li>'
                            . '<li>Specific rules for each round may be introduced and communicated during briefing sessions.</li>'
                            . '</ol>'
                            . '<h4>Common Quiz Categories</h4><table><thead><tr><th>Category A</th><th>Category B</th></tr></thead><tbody>'
                            . '<tr><td>General Knowledge</td><td>Sports</td></tr>'
                            . '<tr><td>Science</td><td>Pop Culture &amp; Entertainment</td></tr>'
                            . '<tr><td>Arts</td><td>Literature</td></tr>'
                            . '<tr><td>Mathematics</td><td>Current Affairs</td></tr>'
                            . '<tr><td>ICT &amp; Technology</td><td>Religion</td></tr>'
                            . '<tr><td>Logical Reasoning</td><td>Movies &amp; Cinema</td></tr>'
                            . '</tbody></table>'
                            . '<h4>Preliminary Rounds</h4><table><thead><tr><th>Match</th><th>Round</th><th>Details</th></tr></thead><tbody>'
                            . '<tr><td>Match 1</td><td>Round 1</td><td>Category of choice</td></tr>'
                            . '<tr><td>Match 1</td><td>Round 2</td><td>Category of choice</td></tr>'
                            . '<tr><td>Match 1</td><td>Round 3</td><td>Written puzzle questions</td></tr>'
                            . '<tr><td>Match 2</td><td>Round 1</td><td>Brain maze questions</td></tr>'
                            . '<tr><td>Match 2</td><td>Round 2</td><td>Religious questions</td></tr>'
                            . '<tr><td>Match 2</td><td>Round 3</td><td>Category of choice</td></tr>'
                            . '<tr><td>Match 3</td><td>Round 1</td><td>General Knowledge questions</td></tr>'
                            . '<tr><td>Match 3</td><td>Round 2</td><td>Conquer the clue questions</td></tr>'
                            . '<tr><td>Match 3</td><td>Round 3</td><td>Category of choice</td></tr>'
                            . '</tbody></table>'
                            . '<h4>Break Rounds</h4>'
                            . '<p><strong>Quarter Finals:</strong> Round 1: Category of Choice &middot; Round 2: Category of Choice &middot; Round 3: Category of Choice &middot; Round 4: Rapid Fire (15 Questions)</p>'
                            . '<p><strong>Semi Finals:</strong> Round 1: Memory Challenge &middot; Round 2: Category of Choice &middot; Round 3: Friends or Foe - Attempting with Cue Cards &middot; Round 4: Mental Arithmetic</p>'
                            . '<p><strong>Grand Finals:</strong> Round 1: Fork in the Road &middot; Round 2: Spelling Bee &middot; Round 3: Hot Seat Round - Category Based Questions &middot; Round 4: Multimedia &amp; Entertainment &middot; Round 5: Captain\'s Challenge</p>'
                            . '<p><strong>Fork in the Road Categories:</strong> General Knowledge, Pop Culture, Trivias, Brain Storms</p>',
                    ],
                ],
            ],

            // ─── TISDC 2025 ─────────────────────────────────────────
            [
                'slug' => 'TISDC2025',
                'series' => 'TISDC',
                'year' => '2025',
                'title' => 'Tanzania International Schools Debate Championship 2025',
                'theme' => 'Eradicating Poverty Through Education',
                'status' => 'past',
                'event_date' => '2025-11-07',
                'location' => 'UWC East Africa',
                'banner' => 'Images/ADC/Debating.jpg',
                'sort_order' => 60,
                'description' => '<p>Theme: Eradicating Poverty Through Education</p>',
                'sections' => [
                    [
                        'title' => 'Event Details',
                        'body' => '<h4>Event Overview</h4><p>Venue: UWC East Africa<br>Dates: 7th - 9th November 2025<br>Ages: 13 - 19</p>'
                            . '<h4>Registration Information</h4><p>Participation Fee: 95,000 TZS per participant<br>Registration Deadline: 31st October 2025</p>'
                            . '<h4>Payment Details</h4><p>Bank: NMB<br>A/c Name: Tanzania National Debate Society<br>Swift Code: NMBTZ<br>Branch Code: 408<br>Branch Name: Clock Tower<br>A/c No.: 40810113978</p>',
                    ],
                    [
                        'title' => 'Attending Schools',
                        'body' => '<p>Total participants: <strong>TBA</strong></p><ul><li>UWC East Africa</li></ul>',
                    ],
                ],
            ],
        ];
    }
}
