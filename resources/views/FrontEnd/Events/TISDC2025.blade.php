@extends('master')
@section('title', 'Event - Tanzania International Schools Debate Championship 2025')
@section('canonical', 'https://www.tands.or.tz/TISDC-2025')

@section('head')
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
@endsection

<style>
    /* Updated Landing Page Style for 2025 */
    .landing-page3 {
        margin-top: 40px;
        min-height: 80vh;
        box-sizing: border-box;
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/public/Images/ADC/Debating.jpg') no-repeat center center;
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

    /* Feedback Button Styles */
    .feedback-btn {
        position: fixed;
        bottom: 20px;
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

    /* Event Details Section */
    .event-details-section {
        padding: 60px 0;
        background-color: #fff;
    }

    .event-details-section h3 {
        text-align: center;
        font-size: 2.5rem;
        color: #007bff;
        margin-bottom: 30px;
    }

    .details-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        max-width: 1000px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .detail-card {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        text-align: left;
    }

    .detail-card h4 {
        font-size: 1.4rem;
        color: #007bff;
        margin-bottom: 10px;
    }

    .detail-card p {
        font-size: 1.1rem;
        color: #333;
        margin: 5px 0;
    }

    /* Registration Form Section */
    .registration-form-section {
        padding: 60px 0;
        background-color: #f8f9fa;
    }

    .registration-form-section h3 {
        text-align: center;
        font-size: 2.5rem;
        color: #007bff;
        margin-bottom: 30px;
    }

    .registration-form-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 20px;
        text-align: center;
    }

    .register-btn {
        display: inline-block;
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

    .register-btn:hover {
        background-color: #1873CC;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
    }

    /* Attending Schools Table */
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

        .container {
            padding: 0 10px;
        }

        .details-grid {
            grid-template-columns: 1fr;
        }

        h3 {
            font-size: 1.8rem;
        }

        .detail-card h4 {
            font-size: 1.2rem;
        }

        .detail-card p {
            font-size: 1rem;
        }

        .download-btn-container {
            top: 10px;
            right: 10px;
        }

        .download-btn {
            padding: 10px 20px;
            font-size: 1rem;
        }

        .feedback-btn {
            padding: 10px 20px;
            font-size: 1rem;
        }

        .register-btn {
            padding: 10px 20px;
            font-size: 1rem;
        }

        .event-schedule-table th,
        .event-schedule-table td {
            padding: 10px;
            font-size: 0.9rem;
        }
    }
</style>

@section('content')
<!-- Landing Section -->
<section class="landing-page3">
    <div class="landing-content3">
        <h2>
            <span class="animated-text" style="animation-delay: 0.5s;">Tanzania International Schools</span>
            <span class="animated-text" style="animation-delay: 1s;">Debate Championship</span>
            <span class="animated-text" style="animation-delay: 1.5s;">2025</span>
        </h2>
        <p class="animated-text" style="animation-delay: 2s;">Theme: Eradicating Poverty Through Education</p>
    </div>
</section>

<!-- Feedback Button -->
<!--<a href="javascript:void(window.open('https://form.jotform.com/252670980321052','blank','scrollbars=yes,toolbar=no,width=700,height=500'))" class="feedback-btn">Send Feedback</a>-->

<!-- Event Details Section -->
<section class="event-details-section">
    <div class="container">
        <h3 data-aos="fade-up">Event Details</h3>
        <div class="details-grid" data-aos="fade-up" data-aos-delay="100">
            <div class="detail-card">
                <h4>Event Overview</h4>
                <p>Venue: <a href="https://www.uwcea.org" style="text-decoration:none">UWC East Africa</a></p>
                <p>Dates: 7th - 9th November 2025</p>
                <p>Ages: 13 - 19</p>
            </div>
            <div class="detail-card">
                <h4>Registration Information</h4>
                <p>Participation Fee: 95,000 TZS per participant</p>
                <p>Registration Deadline: 31st October 2025</p>
            </div>
            <div class="detail-card">
                <h4>Payment Details</h4>
                <p>Bank: NMB</p>
                <p>A/c Name: Tanzania National Debate Society</p>
                <p>Swift Code: NMBTZ</p>
                <p>Branch Code: 408</p>
                <p>Branch Name: Clock Tower</p>
                <p>A/c No.: 40810113978</p>
            </div>
        </div>
    </div>
</section>

<!-- Registration Form Section -->
<section class="registration-form-section">
    <div class="container">
        <h3 data-aos="fade-up">Registration</h3>
        <div class="registration-form-container" data-aos="fade-up" data-aos-delay="100">
            <a
  href="javascript:void(window.open('https://www.jotform.com/form/252672608852060','blank','scrollbars=yes,toolbar=no,width=700,height=500'))"
  class="register-btn"
>
  Register Here for the Event
</a>

        </div>
    </div>
</section>

<!-- Attending Schools Table -->
<section class="event-schedule" style="margin-top:100px">
    <div class="container">
        <h3 data-aos="fade-up">Attending Schools</h3>
        <p>Total participants: <b style="color:dodgerblue">TBA</b></p>
        <div class="table-responsive">
            <table class="event-schedule-table">
                <thead>
                    <tr>
                        <th>Participating School</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Placeholder: Update with actual 2025 schools -->
                    <tr>
                        <td><a href="https://www.uwcea.org" style="text-decoration:none">UWC East Africa</a></td>
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