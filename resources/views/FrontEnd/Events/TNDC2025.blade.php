@extends('master')

@section('title', 'Event - Tanzania National Debate Championship 2025')

@section('canonical', 'https://www.tands.or.tz/TNDC2025')

@section('head')
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Landing Page Styles */
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

        .landing-content a {
            color: #fff;
            text-decoration: underline;
        }

        /* Section Styles */
        .intro-section, .debate-rounds, .gallery-section {
            padding: 60px 0;
            background-color: #f8f9fa;
        }

        .intro-section:nth-child(even), .debate-rounds:nth-child(even), .gallery-section:nth-child(even) {
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

        /* Activity Layout */
        .activity-item {
            margin-bottom: 40px;
        }

        .activity-image {
            max-height: 400px;
            width: auto;
            object-fit: cover;
        }

        /* Debate Rounds */
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

        /* Download Button */
        .download-btn-container {
            position: fixed;
            top: 100px;
            right: 20px;
            z-index: 1000;
        }

        .download-btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 500;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .download-btn:hover {
            background-color: #218838;
            transform: translateY(-2px);
            color: #fff;
        }

        .btn-sm {
            padding: 8px 20px;
            font-size: 1rem;   
        }
        
        .mx-2 {
            margin-left: 10px;  
            margin-right: 10px;
        }
        
        .activity-item {
            padding: 20px 0; 
        }

        /* Gallery Section Styles */
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

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .landing-page {
                min-height: 50vh;
            }

            .landing-content h2 {
                font-size: 2rem;
            }

            .landing-content p {
                font-size: 1.2rem;
            }

            h3 {
                font-size: 2rem;
                text-align: left;
            }

            h4 {
                font-size: 1.3rem;
            }

            p {
                font-size: 1rem;
            }

            .activity-image {
                max-height: 200px;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .download-btn-container {
                top: 10px;
                right: 10px;
            }

            .download-btn {
                padding: 10px 20px;
                font-size: 1rem;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Landing Page Section -->
    <section class="landing-page">
        <div class="landing-content">
            <h2>Tanzania National Debate Championship 2025</h2>
            <p style="color:white;text-align:center">7th - 12th June 2025 | <a href="https://www.schoolofstjude.org">The School of St Jude</a></p>
        </div>
    </section>
    <section class="intro-section">
        <div class="container">
            <h3>Event Gallery</h3>
            <div class="row justify-content-center">
                <div class="col-md-12 activity-item text-center">
                    <a href="https://herimo.pixieset.com/tndc2025/" class="btn btn-info btn-lg" style="margin-top:10px" target="_blank">Event photos</a>
                </div>
            </div>
        </div>
    </section>
    
    <section class="intro-section">
        <div class="container">
            <h3>Debate Tab Links</h3>
            <div class="row justify-content-center">
                <div class="col-md-12 activity-item text-center">
                    <a href="https://tndc.calicotab.com/tndc2025seniors/" class="btn btn-info btn-lg" style="margin-top:10px" target="_blank">Seniors</a>
                    <a href="https://tndc.calicotab.com/TNDC2025JR/" class="btn btn-success btn-lg" style="margin-top:10px" target="_blank">Juniors</a>
                    <a href="https://docs.google.com/spreadsheets/d/14DGLq__YiF0UGK4ScWDvHFOh9SX5ycSQtZmXdwqMY3Y/edit?usp=sharing" class="btn btn-primary btn-lg" style="margin-top:10px" target="_blank">Public Speaking</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Download Button -->
    <div class="download-btn-container">
        <a href="{{ asset('/Documents/TANDS-WSDF-MANUAL-TNDC25.pdf') }}" class="download-btn" download>Download TNDC Manual</a>
    </div>

    <!-- Introduction Section -->
    <section class="intro-section" style="margin-top:-50px">
        <div class="container">
            <h3>About the Event</h3>
            <p>The Tanzania National Debate Championship 2025 unites students nationwide to tackle pressing issues through debate. Held at The School of St Jude, it offers a dynamic stage for young debaters to shine and develop their skills.</p>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section">
        <div class="container">
            <h3>What's Happening at TNDC 2025</h3>
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="{{ url('/public/Images/TNDC2025/Debating.jpg
') }}" alt="Debate Action" class="gallery-image">
                    <div class="gallery-overlay">
                        <p>Intense Debate Sessions</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{ url('/public/Images/TNDC2025/Excitement.jpg
') }}" alt="Event Excitement" class="gallery-image">
                    <div class="gallery-overlay">
                        <p>Event Excitement</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{ url('/public/Images/TNDC2025/Group Discussing.jpg') }}" alt="Team Huddle" class="gallery-image">
                    <div class="gallery-overlay">
                        <p>Team Strategy Moments</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="{{ url('/public/Images/TNDC2025/Participants discussing.jpg') }}" alt="Audience Engage" class="gallery-image">
                    <div class="gallery-overlay">
                        <p>Audience Engagement</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Debate Rounds Section -->
    <section class="debate-rounds">
        <div class="container">
            <h3>Debate Motions</h3>
            <div class="round">
                <h4>Round 1</h4>
                <p><strong>Motion:</strong> This house will prioritize large scale education reforms over direct poverty relief programs in developing countries.</p>
                <div class="info-slide">
                    <p>The government of the United Republic of Tanzania has started the implementation of The Education and Vocational Training Policy of 2014 (2025 Edition) from January 2025. In the policy, a student is expected to complete secondary education (form 4) at 15 years of age and be ready for work life. According to the national and international laws however, this student is still considered a minor, and therefore they will be required to work as apprentices under supervision until the age of adulthood.</p>
                </div>
            </div>
            <div class="round">
                <h4>Round 2</h4>
                <p><strong>Motion:</strong> This House Will Allow companies to hire child laborers in exchange for skill-based education opportunities.</p>
            </div>
            <div class="round">
                <h4>Round 3</h4>
                <p><strong>Motion:</strong> Impromptu</p>
            </div>
        </div>
    </section>

    <!-- Public Speaking Topics Section -->
    <section class="debate-rounds">
        <div class="container">
            <h3>Public Speaking Topics</h3>
            <div class="round">
                <h4>Round 1: Narrative Speech</h4>
                <p>You are a renowned professor in your field of study. Share the story of how you got there with the title.</p>
                <p>You cannot change the world if you cannot change yourself.</p>
            </div>
            <div class="round">
                <h4>Round 2: Selling Speech</h4>
                <p>Sell the idea of resilience while pursuing greatness in education under the title.</p>
                <p>When you pray for rain, you got to deal with the mud too.</p>
            </div>
            <div class="round">
                <h4>Round 3: Informative Speech</h4>
                <p>"Not every rich person had a car growing up; some just had a classroom."</p>
                <p>Wealth doesn’t always come from inheritance; it also comes from education. Show how education can be used to break poverty, create wealth, and open doors to success.</p>
            </div>
        </div>
    </section>
@endsection