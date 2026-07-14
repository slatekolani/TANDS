@extends('master')
@section('title', 'Event - East African Schools Debate Championship 2025')
@section('canonical', 'https://www.tands.or.tz/EASDC-2025')

@section('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
@endsection

<style>
    /* Updated Landing Page Style for 2025 */
    .landing-page3 {
        margin-top: 40px;
        min-height: 80vh;
        box-sizing: border-box;
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/public/Images/EASDCImages/Training Debates.JPG') no-repeat center center;
        background-size: cover;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        padding: 20px;
    }

    .landing-content3 h2 {
        font-size: 3.5rem;
        margin-bottom: 25px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .landing-content3 p {
        font-size: 1.6rem;
        margin-bottom: 30px;
        max-width: 800px;
    }

    /* Animated Text */
    .animated-text {
        display: inline-block;
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 1s ease-out forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Download Button Styles */
    .download-btn-container {
        position: fixed;
        top: 20px;
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
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .download-btn:hover {
        background-color: #218838;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
    }

    /* Image Gallery Button */
    .image-gallery-btn {
        display: inline-block;
        padding: 15px 30px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-size: 1.2rem;
        transition: background-color 0.3s ease;
        margin-top: 20px;
    }

    .image-gallery-btn:hover {
        background-color: #0056b3;
        color: #fff;
    }

    /* Imagery Section */
    .imagery-section {
        padding: 60px 0;
        background-color: #f8f9fa;
    }

    .imagery-section h3 {
        text-align: center;
        font-size: 2.5rem;
        color: #007bff;
        margin-bottom: 30px;
    }

    .image-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        padding: 0 20px;
    }

    .image-item {
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .image-item img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .image-item:hover img {
        transform: scale(1.05);
    }

    /* Debate Motions Section */
    .motions-section {
        padding: 60px 0;
        background-color: #fff;
    }

    .motions-section h3 {
        text-align: center;
        font-size: 2.5rem;
        color: #007bff;
        margin-bottom: 30px;
    }

    .motions-list {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .motion-item {
        margin-bottom: 30px;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .motion-item h4 {
        font-size: 1.4rem;
        color: #333;
        margin-bottom: 10px;
    }

    .motion-item p {
        font-size: 1.1rem;
        color: #555;
        margin: 5px 0;
    }

    /* Feedback Button Styles */
    .feedback-btn {
        position: fixed;
        bottom: 80px;
        left: 20px;
        z-index: 1000;
        padding: 12px 25px;
        background-color: #1E90FF;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 500;
        text-transform: uppercase;
        border: 1px solid #1E90FF;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .feedback-btn:hover {
        background-color: #1873CC;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
    }

    /* Event Schedule Table */
    .event-schedule-table {
        width: 100%;
        margin-top: 40px;
        border-collapse: collapse;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        animation: fadeInUp 1.5s ease-in-out;
    }

    .event-schedule-table th,
    .event-schedule-table td {
        padding: 15px;
        text-align: left;
        border-bottom: 2px solid #ddd;
    }

    .event-schedule-table th {
        background-color: #007bff;
        color: white;
        text-transform: uppercase;
    }

    .event-schedule-table td {
        font-size: 1rem;
        color: #333;
    }

    /* Responsive Table Wrapper */
    .table-responsive {
        overflow-x: auto;
        margin-bottom: 20px;
    }

    /* Responsive Styles */
    @media screen and (max-width: 768px) {
        .landing-content3 h2 {
            font-size: 2.2rem;
        }

        .landing-content3 p {
            font-size: 1.3rem;
        }

        .landing-page3 {
            padding: 10px;
        }

        .image-grid {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        }

        .container {
            padding: 0 10px;
        }

        h3 {
            font-size: 1.8rem;
        }

        p {
            font-size: 1rem;
        }

        .image-gallery-btn {
            font-size: 1rem;
            padding: 10px 20px;
        }

        .download-btn-container {
            top: 10px;
            right: 10px;
        }

        .download-btn {
            padding: 10px 20px;
            font-size: 1rem;
        }

        .event-schedule-table th,
        .event-schedule-table td {
            padding: 10px;
            font-size: 0.9rem;
        }

        .motion-item h4 {
            font-size: 1.2rem;
        }

        .motion-item p {
            font-size: 1rem;
        }

        .feedback-btn {
            padding: 10px 20px;
            font-size: 1rem;
        }
    }
</style>

@section('content')
<!-- Landing Section -->
<section class="landing-page3">
    <div class="landing-content3">
        <h2>
            <span class="animated-text" style="animation-delay: 0.5s;">East African Schools</span>
            <span class="animated-text" style="animation-delay: 1s;">Debate Championship</span>
            <span class="animated-text" style="animation-delay: 1.5s;">2025</span>
        </h2>
        <p class="animated-text" style="animation-delay: 2s;">Empowering the next generation to debate critical issues for a sustainable and inclusive East Africa.</p>
    </div>
</section>

<!-- Feedback Button -->
<section class="my-10">
  <h2 class="text-2xl font-bold mb-4 text-center">Give Event Experience Feedback</h2>
  <div class="relative overflow-hidden rounded-xl shadow-lg" style="height: 700px;">
    <iframe
      src="https://www.jotform.com/form/252670980321052"
      width="100%"
      height="700"
      frameborder="0"
      allowfullscreen
    >
    </iframe>
  </div>
</section>




<!-- Debate Motions Section -->
<section class="motions-section">
    <div class="container">
        <h3 data-aos="fade-up">Debate Motions</h3>
        <div class="motions-list">
            <div class="motion-item" data-aos="fade-up" data-aos-delay="100">
                <h4>Round 1</h4>
                <p><strong>Motion:</strong> This House Believes That achieving long-term poverty eradication in East Africa is impossible without universal access to free and quality education.</p>
            </div>
            <div class="motion-item" data-aos="fade-up" data-aos-delay="200">
                <h4>Round 2</h4>
                <p><strong>Info Slide:</strong> In parts of East Africa, practices such as Female Genital Mutilation (FGM), early marriage, and domestic roles are still used to justify withdrawing girls from school. In the context of this motion, local community leaders include tribal leaders and village elders, excluding local government leaders.</p>
                <p><strong>Motion:</strong> This House Would hold local community leaders more responsible than the state for prolonged cultural practices which prevent girls' access to education.</p>
            </div>
            <div class="motion-item" data-aos="fade-up" data-aos-delay="300">
                <h4>Round 3</h4>
                <p><strong>Motion:</strong> Impromptu (To be announced during the event).</p>
            </div>
            <div class="motion-item" data-aos="fade-up" data-aos-delay="400">
                <h4>Round 5</h4>
                <p><strong>Info Slide:</strong> In 2023, an East African country allocated over 35% of its education budget to universities serving a small urban elite, while rural schools lacked basic infrastructure, teachers, and textbooks.</p>
                <p><strong>Motion:</strong> This House Believes that government spending on higher education should be redirected towards improving primary and secondary education in rural areas.</p>
            </div>
            <div class="motion-item" data-aos="fade-up" data-aos-delay="500">
                <h4>Octo Finals</h4>
                <p><strong>Motion:</strong> This House regrets the rise of identity politics in the 21st century.</p>
            </div>
            <div class="motion-item" data-aos="fade-up" data-aos-delay="600">
                <h4>Quarter Finals</h4>
                <p><strong>Motion:</strong> Impromptu (To be announced during the event).</p>
            </div>
            <div class="motion-item" data-aos="fade-up" data-aos-delay="700">
                <h4>Semi Finals</h4>
                <p><strong>Info Slide:</strong> East Africa faces several ongoing conflicts, including tensions in Eastern Congo, the civil war in South Sudan, border disputes between Ethiopia and Sudan, and the insurgency in Somalia. In the context of the motion: A regional East African-led mediation refers to a conflict resolution effort initiated and managed by East African states or regional organisations such as the East African Community (EAC) or the Intergovernmental Authority on Development (IGAD). In contrast, international intervention involves the active role of external actors such as the United Nations, Western governments, Gulf states, or major international organisations in resolving conflicts.</p>
                <p><strong>Motion:</strong> This House would prioritise regional East African-led mediation over international intervention in resolving conflicts within the region.</p>
            </div>
            <div class="motion-item" data-aos="fade-up" data-aos-delay="800">
                <h4>Finals</h4>
                <p><strong>Motion:</strong> To be released by the East African Legislative Assembly (EALA).</p>
            </div>
        </div>
    </div>
</section>

<!-- Event Schedule Table -->
<section class="event-schedule">
    <div class="container">
        <h3 data-aos="fade-up">Event Schedule</h3>
        <div class="table-responsive">
            <table class="event-schedule-table">
                <thead>
                    <tr>
                        <th>Activity</th>
                        <th>Date</th>
                        <th>Place(s)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Arrival of Participants</td>
                        <td>04/09/2025</td>
                        <td><a href="https://www.schoolofstjude.org" style="text-decoration:none">St. Jude Secondary School (USA River)</a></td>
                    </tr>
                    <tr>
                        <td>Launching & Training</td>
                        <td>05/09/2025</td>
                        <td><a href="https://www.schoolofstjude.org" style="text-decoration:none">St. Jude Secondary School (USA River)</a></td>
                    </tr>
                    <tr>
                        <td>Debate, Public Speaking & Quiz Preliminaries</td>
                        <td>06-07/09/2025</td>
                        <td><a href="https://www.schoolofstjude.org" style="text-decoration:none">St. Jude Secondary School (USA River)</a></td>
                    </tr>
                    <tr>
                        <td>Finals & Closing Ceremony</td>
                        <td>8/09/2025</td>
                        <td><a href="https://www.eac.int" style="text-decoration:none">East African Community (EAC)</a></td>
                    </tr>
                    <tr>
                        <td>Excursion</td>
                        <td>09/09/2025</td>
                        <td><a href="https://reelovestanzania.com/lake-duluti/" style="text-decoration:none">Lake Duluti, Arusha City</a></td>
                    </tr>
                    <tr>
                        <td>Departure</td>
                        <td>10/09/2025</td>
                        <td><a href="https://www.schoolofstjude.org" style="text-decoration:none">St. Jude Secondary School (USA River)</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Attending Schools Table -->
<section class="event-schedule" style="margin-top:100px">
    <div class="container">
        <h3 data-aos="fade-up">Attending Schools</h3>
        <p>Total participants: <b style="color:dodgerblue">TBO</b></p>
        <div class="table-responsive">
            <table class="event-schedule-table">
                <thead>
                    <tr>
                        <th>Participating School</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="https://www.schoolofstjude.org" style="text-decoration:none">St. Jude Secondary School</a></td>
                    </tr>
                    <tr>
                        <td><a href="https://www.cornerstoneschooltanzania.ac.tz" style="text-decoration:none">Cornerstone Leadership Academy Tanzania</a></td>
                    </tr>
                    <tr>
                        <td><a href="https://stmariagoreti.ac.tz" style="text-decoration:none">St. Mariagoreth Secondary School</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- AOS Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true,
    });
</script>
@endsection