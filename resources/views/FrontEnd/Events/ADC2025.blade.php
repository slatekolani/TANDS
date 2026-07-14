@extends('master')

@section('title', 'Event - Arusha Debate Championship 2025')

@section('canonical', 'https://www.tands.or.tz/ADC')

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
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/public/Images/ADC/Quiz Challenge.jpg') no-repeat center center;
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
        .intro-section, .debate-rounds {
            padding: 60px 0;
            background-color: #f8f9fa;
        }

        .intro-section:nth-child(even), .debate-rounds:nth-child(even) {
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
                text-align:left;
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
            <h2>Arusha Debate Championship 2025</h2>
            <p style="color:white;text-align:center">15th - 16th March 2025 | <a href="https://www.uwcea.org">UWC East Africa</a></p>
        </div>
    </section>
<section class="intro-section">
    <div class="container">
        <h3>Event Gallery</h3>
        <div class="row justify-content-center">
            <div class="col-md-12 activity-item text-center">
                <a href="https://ovamedia53.pixieset.com/arushadebatefinal-1/" class="btn btn-info btn-lg" style="margin-top:10px" target="_blank">Event photos Set 1</a>
                
                <a href="https://ovamedia.pixieset.com/arushadebatechampionship/" class="btn btn-success btn-lg" style="margin-top:10px" target="_blank">Event Photos Set 2</a>
                <a href="https://ovamedia.pixieset.com/arushadebateday2part1/" class="btn btn-primary btn-lg" style="margin-top:10px" target="_blank">Event Photos Set 3</a>
            </div>
        </div>
    </div>
</section>
    <!-- Download Button -->
    <div class="download-btn-container">
        <a href="{{ asset('Documents/ARUSHA DEBATE TOURNAMENT PUBLIC SPEAKING TOPICS.pdf') }}" class="download-btn" download>Download Topics</a>
    </div>

    <!-- Introduction Section -->
    <section class="intro-section" style="margin-top:-50px">
        <div class="container">
            <h3>About the Event</h3>
            <p>The Arusha Debate Championship brings together students from across the region to engage in thought-provoking debates on critical global and regional issues. Hosted at UWC East Africa, this year's championship promises to be an exciting platform for young minds to showcase their debating skills and critical thinking.</p>
        </div>
    </section>

    <!-- Activities Section -->
    <section class="intro-section">
        <div class="container">
            <h3>Activities Included</h3>
            <div class="row">
                <!-- Public Speaking -->
                <div class="col-md-12 activity-item">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h4>Public Speaking</h4>
                            <p>Participants showcased their oratory skills, delivering powerful speeches on a variety of topics. This activity encouraged confidence, articulation, and the ability to engage an audience effectively.</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <img src="{{ url('/public/Images/ADC/Public Speaking6.jpg') }}" class="img-fluid activity-image" alt="Public Speaking">
                        </div>
                    </div>
                </div>

                <!-- Debates -->
                <div class="col-md-12 activity-item">
                    <div class="row align-items-center">
                        <div class="col-md-6 order-md-2">
                            <h4>Debates</h4>
                            <p>Teams faced off in spirited debates, arguing for or against thought-provoking motions. This tested critical thinking, teamwork, and the ability to construct compelling arguments under pressure.</p>
                        </div>
                        <div class="col-md-6 text-center order-md-1">
                            <img src="{{ url('/public/Images/ADC/Adjudicators2.jpg') }}" class="img-fluid activity-image" alt="Debates">
                        </div>
                    </div>
                </div>

                <!-- Quiz Challenge -->
                <div class="col-md-12 activity-item">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h4>Quiz Challenge</h4>
                            <p>A fast-paced trivia competition where participants answered questions across diverse categories. This highlighted quick thinking, knowledge retention, and competitive spirit.</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <img src="{{ url('/public/Images/ADC/Quiz Challenge2.jpg') }}" class="img-fluid activity-image" alt="Quiz Challenge">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Debate Rounds Section -->
    <section class="debate-rounds">
        <div class="container">
            <h3>Debate Rounds</h3>
            <div class="round">
                <h4>First Round</h4>
                <p><strong>Motion:</strong> This house believes that scholarships for tertiary education should strictly be provided to students based on how poor they are as opposed to their talents and potentials.</p>
            </div>
            <div class="round">
                <h4>Second Round</h4>
                <p><strong>Motion:</strong> This House would pause all development of artificial intelligence (AI).</p>
                <div class="info-slide">
                    <p>The Department of Government Efficiency (DOGE), established under the Trump administration by Republicans, aims to streamline government operations and reduce inefficiency. Elon Musk, appointed to lead the department, advocates for using technology and innovation to improve government effectiveness. While Democrats have opposed DOGE, fearing potential job cuts and weakened regulations.</p>
                </div>
            </div>
            <div class="round">
                <h4>Third Round</h4>
                <p><strong>Motion:</strong> This house, as the Democratic Party, would make active efforts to make DOGE bi-partisan instead of opposing it.</p>
            </div>
            <div class="round">
                <h4>Quarter Finals</h4>
                <p><strong>Motion:</strong> This house believes that the government should heavily subsidize post-secondary education.</p>
            </div>
            <div class="round">
                <h4>Semi Finals</h4>
                <p><strong>Motion:</strong> This house would require university students from developing countries who obtained education in the West to work in their country of origin for a number of years after graduation.</p>
                <div class="info-slide">
                    <p>The DRC-Rwanda conflict traces back to the 1994 Rwandan Genocide, after which millions of Hutu refugees, including former genocidaires, fled to eastern DRC, fueling tension. Rwanda has since intervened, citing security threats, while facing accusations. Bodies such as the African Union (AU), East African Community (EAC), and the International Conference on the Great Lakes Region (ICGLR) have historically played roles in mediation, conflict resolution, and peacekeeping within Africa.</p>
                </div>
            </div>
            <div class="round">
                <h4>Grand Finals</h4>
                <p><strong>Motion:</strong> This house would prioritize regional African-led mediation over international intervention in resolving the DRC-Rwanda conflict.</p>
            </div>
        </div>
    </section>
    
    
@endsection