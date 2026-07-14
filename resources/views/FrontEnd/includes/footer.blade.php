<section class="section8">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <h3 style="color: white">Send us a message</h3>
                <form id="messageToGoogleSheets">
                    <div class="mb-3">
                        <label for="fullNames" class="form-label" style="color: white">Full Names</label>
                        <input type="text" class="form-control" name="fullNames" required>
                    </div>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label" style="color: white">Email Address</label>
                        <input type="email" class="form-control" name="userEmail" aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label" style="color: white">Message</label>
                        <textarea class="form-control" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i>Submit</button>
                </form>
                <span id="notify" style="color: white"></span>
            </div>
            <div class="col-md-4 mb-3">
                <h3 class="usefulLinks" style="color: white">Useful Links</h3>
                <div class="footerLinks">
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('about') }}">About</a>
                    <a href="{{route('gallery')}}">Gallery</a>
                    <a href="{{route('contactUs')}}">Contact us</a>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <h3 class="weAreSocial" style="color: white;text-align:center">We are Social</h3>
                <div class="d-flex justify-content-center align-items-center"
                    style="flex-direction: row; height: 100px; margin-top: 20px;">
                    <a href='#'>
                        <i class="fab fa-instagram" style="font-size: 30px;color:white;padding-right:20px"></i>
                    </a>
                    <a href='#'>
                        <i class="fab fa-twitter" style="font-size: 30px;color:white;padding-right:20px"></i>
                    </a>
                    <a href='#'>
                        <i class="fab fa-facebook-f" style="font-size: 30px;color:white;padding-right:20px"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section9" style="margin-bottom: 60px">
    <p style="text-align: center;font-size:18px">© Tanzania National Debate Society - <span id="year"></span>. Developed by <a href="#">XploSoftwares</a></p>
</section>


<script>
    document.getElementById('year').textContent = new Date().getFullYear();
</script>

<script>

document.addEventListener('DOMContentLoaded', function () {
    const scriptURL = 'https://script.google.com/macros/s/AKfycbxN6HbEanlwHRW9pk0JWwO1WZEjg2aavOChBHLsajgKcdHtJQfq_VRw81F_z-tB6xPS/exec';
    const form = document.getElementById('messageToGoogleSheets');
    const msg = document.getElementById('notify');

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        msg.innerHTML = "Processing...";
        fetch(scriptURL, {
            method: 'POST',
            body: new FormData(form)
        })
        .then(response => {
            msg.innerHTML = "Success! Your message was received.";
            form.reset();
        })
        .catch(error => {
            msg.innerHTML = "Error! Please try again.";
            console.error('Error!', error.message);
        });
    });
});
</script>



