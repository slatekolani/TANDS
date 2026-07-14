<style>
    .bgimg-1,
    .bgimg-2,
    .bgimg-3 {
        position: relative;
        opacity: 0.95;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

    }


    .bgimg-2 {
        background-image: url("{{ asset('Images/batch2/IMG_8872.jpg') }}");
        min-height: 400px;
        filter: contrast(100%)
    }

    .bgimg-3 {
        background-image: url("{{asset('/Images/batch2/_TM_0317.jpg') }}");
        min-height: 400px;
        filter: contrast(120%)
    }

    .caption {
        position: absolute;
        left: 0;
        top: 50%;
        width: 100%;
        text-align: center;
        color: #000;
    }

    .caption span.border {
        background-color: #111;
        color: #fff;
        padding: 18px;
        font-size: 25px;
        letter-spacing: 10px;
    }



    @media only screen and (max-device-width: 1024px) {

        .bgimg-2,
        .bgimg-3 {
            min-height: 300px;
            background-attachment: scroll;
        }
    }
</style>
<section style="margin-top: 30px">

    <div style="color: black;background-color:white;">
        <h1 style="text-align:center;font-size:30px">ABOUT TANZANIA NATIONAL DEBATE SOCIETY</h3>
        <p><b>Tanzania National Debate Society (TANDS)</b> is a fully registered society in accordance to the Societies
            Act Cap. 337 R.E of 2002 under registration number S.A 21806 with a mission of providing a platform for
            educational institutions to engage in fair, transparent and representative debating competitions so as to be
            able to participate in our Annual Debating Championships.</p>
        <p>At the moment the society is running an annual national tournament labeled as The <b>Tanzania National Debate
                Championship (TNDC)</b> and a regional tournament labeled, <b>The East African Schools Debate
                Championship (EASDC)</b> in partnership with <b>East African Community</b> under the patronage of the
            <b>East African Legislative Assembly (EALA)</b>.</p>
    </div>

    <div class="bgimg-2">
        <div class="caption">
            <span class="border"
                style="background-color:whitesmoke;height:50%;font-size:25px;color:#323366;opacity:0.8"><b>MISSION</b></span>
        </div>
    </div>

    <div style="position:relative;">
        <div style="color:#ddd;background: linear-gradient(to left, #03A3DE, #323366);padding:15px 15px;">
            <p>The Mission of the Society is to provide a platform for primary, secondary and university learners to
                engage in a fair, transparent and representative debating competition to identify an annual debating
                champion.</p>
        </div>
    </div>

    <div class="bgimg-3">
        <div class="caption">
            <span class="border"
                style="background-color:whitesmoke;height:50%;font-size:25px;color:#323366;opacity:0.8"><b>VISION</b></span>
        </div>
    </div>

    <div style="position:relative;">
        <div style="color:#ddd;background: linear-gradient(to left,#323366, #03A3DE);padding:15px 15px;">
            <p>The vision of the Society is to have a generation of well-equipped academicians with soft skills as
                self-confidence, critical thinking and team work.</p>
        </div>
    </div>

</section>
