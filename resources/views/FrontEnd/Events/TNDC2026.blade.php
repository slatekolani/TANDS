@extends('master')

@section('title', 'Event - Tanzania National Debate Championship 2026')

@section('canonical', 'https://www.tands.or.tz/TNDC2026')

@section('head')
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .landing-page {
            min-height: 80vh;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/public/Images/TNDC2025/Arrival at the tndc.jpg') no-repeat center center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 20px;
        }

        .landing-content h2 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .landing-content p {
            font-size: 1.5rem;
        }

        .intro-section, .debate-rounds, .gallery-section, .quiz-section {
            padding: 60px 0;
            background-color: #f8f9fa;
        }

        .intro-section:nth-child(even), .debate-rounds:nth-child(even), .gallery-section:nth-child(even), .quiz-section:nth-child(even) {
            background-color: #fff;
        }

        h3 {
            text-align: center;
            font-size: 2.5rem;
            color: #007bff;
            margin-bottom: 30px;
        }

        h4 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
        }

        p {
            font-size: 1rem;
            color: #555;
        }

        .intro-section p {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 30px;
        }

        .activity-item {
            margin-bottom: 40px;
            padding: 20px 0;
        }

        .round {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .info-slide {
            margin-top: 15px;
            padding: 15px;
            background-color: #e9f7ff;
            border-left: 5px solid #007bff;
            border-radius: 5px;
        }

        .info-slide p {
            margin: 0;
            font-size: 1rem;
        }

        .upcoming-badge {
            display: inline-block;
            background-color: #ffc107;
            color: #333;
            font-weight: bold;
            padding: 6px 18px;
            border-radius: 20px;
            font-size: 1rem;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }

        .gallery-section {
            overflow: hidden;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            animation: fadeIn 1s ease-in-out;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .gallery-item:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.8);
        }

        .gallery-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .gallery-image {
            opacity: 0.8;
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 123, 255, 0.7);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-overlay p {
            margin: 0;
            font-size: 1.2rem;
            text-align: center;
            padding: 10px;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
        }

        .section-divider {
            border: none;
            border-top: 3px solid #007bff;
            margin: 0 auto 40px;
            width: 80px;
        }

        .content-kicker {
            text-align: center;
            color: #555;
            max-width: 860px;
            margin: -15px auto 35px;
        }

        .round-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 20px;
        }

        .round-grid .round {
            margin-bottom: 0;
            height: 100%;
        }

        .round-label {
            display: inline-block;
            color: #ff6b00;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .guideline-list,
        .round-list {
            margin: 0;
            padding-left: 22px;
            color: #555;
        }

        .guideline-list li,
        .round-list li {
            margin-bottom: 8px;
        }

        .table-wrap {
            overflow-x: auto;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .event-table {
            width: 100%;
            min-width: 640px;
            border-collapse: collapse;
            background: #fff;
        }

        .event-table th {
            background: #e4f7ff;
            color: #064a75;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .02em;
        }

        .event-table th,
        .event-table td {
            border: 1px solid #03a3de;
            padding: 10px 14px;
            vertical-align: top;
        }

        .quiz-layout {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 10px;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @media screen and (max-width: 768px) {
            .landing-page { min-height: 50vh; }
            .landing-content h2 { font-size: 2rem; }
            .landing-content p { font-size: 1.2rem; }
            h3 { font-size: 2rem; text-align: left; }
            h4 { font-size: 1.3rem; }
            .gallery-grid { grid-template-columns: 1fr; }
            .content-kicker { text-align: left; }
        }
    </style>
@endsection

@section('content')
    <!-- Landing Page Section -->
    <section class="landing-page">
        <div class="landing-content">
            <span class="upcoming-badge">UPCOMING EVENT</span>
            <h2>Tanzania National Debate Championship 2026</h2>
            <p style="color:white;text-align:center">Theme: Innovating Solutions – Creativity, Technology &amp; Resilience</p>
        </div>
    </section>

    <!-- About Section -->
    <section class="intro-section">
        <div class="container">
            <h3>About the Event</h3>
            <hr class="section-divider">
            <p>The Tanzania National Debate Championship (TNDC) 2026 brings together students from across the nation to engage in rigorous debate and public speaking competitions. Under the theme <em>Innovating Solutions – Creativity, Technology &amp; Resilience</em>, participants will tackle motions spanning infrastructure, governance, the digital economy, and more.</p>
        </div>
    </section>

    <!-- Gallery Preview -->
    <section class="gallery-section">
        <div class="container">
            <h3>From Previous Championships</h3>
            <hr class="section-divider">
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="{{ url('/public/Images/TNDC2025/Debating.jpg') }}" alt="Debate Action" class="gallery-image">
                    <div class="gallery-overlay"><p>Intense Debate Sessions</p></div>
                </div>
                <div class="gallery-item">
                    <img src="{{ url('/public/Images/TNDC2025/Excitement.jpg') }}" alt="Event Excitement" class="gallery-image">
                    <div class="gallery-overlay"><p>Event Excitement</p></div>
                </div>
                <div class="gallery-item">
                    <img src="{{ url('/public/Images/TNDC2025/Group Discussing.jpg') }}" alt="Team Huddle" class="gallery-image">
                    <div class="gallery-overlay"><p>Team Strategy Moments</p></div>
                </div>
                <div class="gallery-item">
                    <img src="{{ url('/public/Images/TNDC2025/Participants discussing.jpg') }}" alt="Participants" class="gallery-image">
                    <div class="gallery-overlay"><p>Participants Engaging</p></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Debate Motions: Preliminary Rounds -->
    <section class="debate-rounds">
        <div class="container">
            <h3>Debate Motions</h3>
            <hr class="section-divider">

            <div class="round">
                <h4>Round 1</h4>
                <p><strong>Motion:</strong> This House Regrets the prioritization of mega infrastructure projects such as the SGR and flyovers over the modernization of rural feeder roads.</p>
            </div>

            <div class="round">
                <h4>Round 2</h4>
                <p><strong>Motion:</strong> This House believes that it is in the interest of the Republican Party to impeach Donald Trump.</p>
            </div>

            <div class="round">
                <h4>Round 3</h4>
                <p><strong>Motion:</strong> Impromptu</p>
            </div>

            <div class="round">
                <h4>Round 4</h4>
                <p><strong>Motion:</strong> This House Believes That the future of Tanzania's creative economy lies in digital content creation (e.g., vlogging, TikTok) rather than traditional arts such as painting and sculpture.</p>
            </div>

            <div class="round">
                <h4>Round 5</h4>
                <p><strong>Motion:</strong> Assuming feasibility, This House Would choose a world with zero poverty but no privacy.</p>
                <div class="info-slide">
                    <p><strong>Info Slide:</strong> A world with zero poverty means that every individual has access to basic needs such as food, shelter, healthcare, and education. A world with no privacy means that all personal information, activities, and communications are fully accessible and transparent.</p>
                </div>
            </div>

            <h3 style="margin-top:50px">Knockout Rounds</h3>
            <hr class="section-divider">

            <div class="round">
                <h4>Octo-Finals</h4>
                <p><strong>Motion:</strong> This House Supports open borders.</p>
                <div class="info-slide">
                    <p><strong>Info Slide:</strong> For this debate, "open borders" is a hypothetical policy that would eliminate all routine immigration barriers, including visas, family caps, work-permit quotas, skill or income tests, and entry fees that exclude people solely because they are non-citizens of the receiving country. Border officials could still conduct customs inspections, enforce public health measures (e.g., temporary quarantine or proof of vaccination), and run narrowly targeted security checks on individuals listed as posing violent threats. Otherwise, anyone could freely enter, work, reside, and reunite with family in any country.</p>
                </div>
            </div>

            <div class="round">
                <h4>Quarter Finals</h4>
                <p><strong>Motion:</strong> This House Believes That the quality of education in rural Tanzania should be prioritized over expanding universal access to secondary schools.</p>
            </div>

            <div class="round">
                <h4>Semi Finals</h4>
                <p><strong>Motion:</strong> This House Believes That adopting a new constitution should be an absolute priority for Tanzania over further electoral or economic reforms.</p>
            </div>

            <div class="round">
                <h4>Grand Finals</h4>
                <p><strong>Motion:</strong> TBA (To Be Announced)</p>
            </div>
        </div>
    </section>

    <!-- Public Speaking Topics: Preliminary Rounds -->
    <section class="intro-section">
        <div class="container">
            <h3>Public Speaking Topics</h3>
            <hr class="section-divider">

            <div class="round">
                <h4>Round 1: Narrative Speech</h4>
                <p><strong>Topic:</strong> The night to forget.</p>
                <div class="info-slide">
                    <p><strong>Info Slide:</strong> You are an inventor working on a groundbreaking innovation, then suddenly one night all your innovation process is bugged and the codes crash.</p>
                </div>
            </div>

            <div class="round">
                <h4>Round 2: Creative Speech</h4>
                <p>Give a creative speech in line with the theme, under the title or employing the phrase:</p>
                <p><strong>"The world is racing faster, but some of us are still running without shoes"</strong></p>
            </div>

            <div class="round">
                <h4>Round 3: Selling Speech</h4>
                <p>Give a speech that sells a creative tech product that helps to train students to become resilient in their academics.</p>
            </div>

            <div class="round">
                <h4>Round 4: Impromptu</h4>
                <p>Topic to be revealed on the day.</p>
            </div>

            <div class="round">
                <h4>Round 5: Inspirational Speech</h4>
                <p>You are either Steve Jobs or Elon Musk; give a speech on the following topic:</p>
                <p><strong>"Daring the impossible; Turning wild ideas into reality"</strong></p>
            </div>

            <h3 style="margin-top:50px">Public Speaking Knockout Rounds</h3>
            <hr class="section-divider">

            <div class="round">
                <h4>Octo Finals: Informative Speech</h4>
                <p>You are a grandparent with a grandchild who is addicted to social media. Give a speech with the following title:</p>
                <p><strong>"A generation that lives in updates and internet reactions rather than moments."</strong></p>
            </div>

            <div class="round">
                <h4>Quarter Finals: Impromptu</h4>
                <p>Topic to be revealed on the day.</p>
            </div>

            <div class="round">
                <h4>Semi Finals: Informative Speech</h4>
                <p>Deliver a speech reflecting on the reality of living in two worlds and the impact it has on modern life.</p>
                <div class="info-slide">
                    <p><strong>Info Slide:</strong> Today's generation spends its life between the physical and digital world. People study, work, socialize and express themselves both in real life and online spaces. However, the dual existence is beginning to raise questions about identity, attention, relationships and what it truly means to be present.</p>
                    <p style="margin-top:10px"><em>End your speech with: "we are the first generation living in two worlds but not fully present in either."</em></p>
                </div>
            </div>

            <div class="round">
                <h4>Grand Finals: Special Occasion Speech</h4>
                <p><strong>Theme: Honoring Innovation</strong></p>
                <div class="info-slide">
                    <p><strong>Info Slide:</strong> In an era where society celebrates public figures and powerful voices, many of the people truly shaping the modern world remain unseen — working quietly behind screens, systems and codes. Deliver a speech appreciating the silent innovators behind the scenes.</p>
                </div>
                <p style="margin-top:15px"><strong>Choose any of the following titles:</strong></p>
                <ol>
                    <li>The Geniuses we never clap for</li>
                    <li>The spotlight speaks the backstage builds</li>
                    <li>The silence system behind every spotlight</li>
                </ol>
            </div>
        </div>
    </section>

    <!-- Primary School Debate Motions -->
    <section class="debate-rounds">
        <div class="container">
            <h3>Primary School Debate Motions</h3>
            <hr class="section-divider">
            <p class="content-kicker">TNDC 2026 debate motions for primary school pupils under the theme <em>Innovating Solutions – Creativity, Technology &amp; Resilience</em>.</p>

            <div class="round-grid">
                <div class="round">
                    <h4>Round 1</h4>
                    <p>This House Would ban children from using social media until they are sixteen years old.</p>
                </div>

                <div class="round">
                    <h4>Round 2</h4>
                    <p>This House Prefers a world where everyone speaks one global language instead of many local languages.</p>
                </div>

                <div class="round">
                    <h4>Round 3</h4>
                    <p>Impromptu.</p>
                </div>

                <div class="round">
                    <h4>Round 4</h4>
                    <p>This House Believes That it is better to fail at something difficult than to succeed at something easy.</p>
                </div>

                <div class="round">
                    <h4>Quarter Finals</h4>
                    <p>This House Regrets not having a "Failure Day" in every school in Tanzania.</p>
                </div>

                <div class="round">
                    <h4>Semi Finals</h4>
                    <p>This House Would ban the importation of foreign-made school uniforms and only allow uniforms produced by local tailors using creative designs.</p>
                </div>

                <div class="round">
                    <h4>Grand Finals</h4>
                    <p>TBA (To Be Announced).</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Quiz Challenge Rubric -->
    <section class="quiz-section">
        <div class="container">
            <h3>Quiz Challenge Rubric</h3>
            <hr class="section-divider">

            <div class="round">
                <h4>General Guidelines</h4>
                <ol class="guideline-list">
                    <li>Each quiz team shall consist of three members only (Quiz Whizzes).</li>
                    <li>The competition will include Preliminary Rounds (3 matches) and Break Rounds (Quarter Finals, Semi Finals, and Grand Finale).</li>
                    <li>Preliminary rounds will be based on point accumulation, while Break Rounds will follow a knockout format.</li>
                    <li>A random draw will be conducted before each preliminary match to determine pairings.</li>
                    <li>The top 8 teams after preliminaries will advance to the Quarter Finals.</li>
                    <li>Quarter Finals will consist of four matches drawn using a power-protection seeding system.</li>
                    <li>Semi Finals will feature four teams, and the two winners will proceed to the Grand Finale.</li>
                    <li>Each team must select one member to participate in the Spelling Challenge during the Grand Finale.</li>
                    <li>The official language of the quiz will be English; however, other official East African languages may occasionally be used where necessary.</li>
                    <li>Specific rules for each round may be introduced and communicated during briefing sessions.</li>
                </ol>
            </div>

            <h3 style="margin-top:50px">Common Quiz Categories</h3>
            <hr class="section-divider">

            <div class="table-wrap">
                <table class="event-table">
                    <thead>
                        <tr>
                            <th>Category A</th>
                            <th>Category B</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>General Knowledge</td>
                            <td>Sports</td>
                        </tr>
                        <tr>
                            <td>Science</td>
                            <td>Pop Culture &amp; Entertainment</td>
                        </tr>
                        <tr>
                            <td>Arts</td>
                            <td>Literature</td>
                        </tr>
                        <tr>
                            <td>Mathematics</td>
                            <td>Current Affairs</td>
                        </tr>
                        <tr>
                            <td>ICT &amp; Technology</td>
                            <td>Religion</td>
                        </tr>
                        <tr>
                            <td>Logical Reasoning</td>
                            <td>Movies &amp; Cinema</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h3 style="margin-top:50px">Preliminary Rounds</h3>
            <hr class="section-divider">

            <div class="table-wrap">
                <table class="event-table">
                    <thead>
                        <tr>
                            <th>Match</th>
                            <th>Round</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Match 1</td>
                            <td>Round 1</td>
                            <td>Category of choice</td>
                        </tr>
                        <tr>
                            <td>Match 1</td>
                            <td>Round 2</td>
                            <td>Category of choice</td>
                        </tr>
                        <tr>
                            <td>Match 1</td>
                            <td>Round 3</td>
                            <td>Written puzzle questions</td>
                        </tr>
                        <tr>
                            <td>Match 2</td>
                            <td>Round 1</td>
                            <td>Brain maze questions</td>
                        </tr>
                        <tr>
                            <td>Match 2</td>
                            <td>Round 2</td>
                            <td>Religious questions</td>
                        </tr>
                        <tr>
                            <td>Match 2</td>
                            <td>Round 3</td>
                            <td>Category of choice</td>
                        </tr>
                        <tr>
                            <td>Match 3</td>
                            <td>Round 1</td>
                            <td>General Knowledge questions</td>
                        </tr>
                        <tr>
                            <td>Match 3</td>
                            <td>Round 2</td>
                            <td>Conquer the clue questions</td>
                        </tr>
                        <tr>
                            <td>Match 3</td>
                            <td>Round 3</td>
                            <td>Category of choice</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h3 style="margin-top:50px">Break Rounds</h3>
            <hr class="section-divider">

            <div class="quiz-layout">
                <div class="round">
                    <h4>Quarter Finals</h4>
                    <ul class="round-list">
                        <li>Round 1: Category of Choice</li>
                        <li>Round 2: Category of Choice</li>
                        <li>Round 3: Category of Choice</li>
                        <li>Round 4: Rapid Fire (15 Questions)</li>
                    </ul>
                </div>

                <div class="round">
                    <h4>Semi Finals</h4>
                    <ul class="round-list">
                        <li>Round 1: Memory Challenge</li>
                        <li>Round 2: Category of Choice</li>
                        <li>Round 3: Friends or Foe - Attempting with Cue Cards</li>
                        <li>Round 4: Mental Arithmetic</li>
                    </ul>
                </div>

                <div class="round">
                    <h4>Grand Finals</h4>
                    <ul class="round-list">
                        <li>Round 1: Fork in the Road</li>
                        <li>Round 2: Spelling Bee</li>
                        <li>Round 3: Hot Seat Round - Category Based Questions</li>
                        <li>Round 4: Multimedia &amp; Entertainment</li>
                        <li>Round 5: Captain's Challenge</li>
                    </ul>
                </div>

                <div class="round">
                    <h4>Fork in the Road Categories</h4>
                    <ul class="round-list">
                        <li>General Knowledge</li>
                        <li>Pop Culture</li>
                        <li>Trivias</li>
                        <li>Brain Storms</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
