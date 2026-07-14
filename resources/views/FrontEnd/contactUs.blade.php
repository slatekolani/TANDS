@extends('master')

@section('title', 'Contact Us - Tanzania National Debate Society (TANDS)')
@section('canonical', 'https://www.tands.or.tz/contactUs')

@section('head')
    
@endsection

@section('content')

<section class="section13" style="margin-top: 140px">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-3">
                <h1 class="weAreSocial">Contact Information</h1>
                <div
                    style="flex-direction: column; margin-top: 20px;">
                    <address>Tanzania National Debate Society,</address>
                    <address>P.O.BOX 6221,</address>
                    <address>Arusha-Tanzania.</address>
                    <address>+255 787 225 427</address>
                    <address><a href="mailto:info@tands.or.tz" >info@tands.or.tz</a></address> 
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <h1>Get in Touch</h1>
                <form id="messageToGoogleSheets">
                    <div class="mb-3">
                        <label for="fullNames" class="form-label">Full Names</label>
                        <input type="text" class="form-control" name="fullNames" required>
                    </div>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label" >Email Address</label>
                        <input type="email" class="form-control" name="userEmail" aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i>Submit</button>
                </form>
                <span id="notify"></span>
            </div>
    
           
        </div>
    </div>
</section>
<section>
    <div class="col-md-12">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1310.239569570649!2d36.634579909693905!3d-3.2864791893906657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x18371f004990162b%3A0x1cb1658eea444186!2sTanzania%20National%20Debate%20Society!5e0!3m2!1sen!2stz!4v1721834409184!5m2!1sen!2stz" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>
@endsection