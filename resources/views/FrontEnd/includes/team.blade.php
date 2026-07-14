<style>
    @media (max-width: 578px) {
        .modal-dialog {
            max-height: 90vh; /* Adjust as needed */
            margin: 1.75rem auto; /* Center the modal */
        }
    
        .modal-content {
            height: 100%; /* Ensure the content takes full height */
        }
    
        .modal-body {
            max-height: 70vh; 
            overflow-y: auto;
        }
    }
    </style>
    
    
<section class="section4">
    <div class="col-md-12" style="margin-top: 50px">
        <h3>TEAM</h3>
        <p class="pheader">Two is better than One</p>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" data-bs-toggle="modal" data-bs-target="#exampleModalToggle1" style="cursor: pointer">
                            <div class="card-body" style="text-align: center">
                                <div class="d-flex justify-content-center align-items-center"
                                    style="flex-direction: column">
                                    <img src="{{ asset('/Images/Chris Michoro.jpeg') }}"
                                        style="border-radius: 50%; width: 200px; height: 200px; object-fit: contain;filter:contrast(140%)" alt="Christopher Michoro">
                                    <p class="pheader2">Christopher Michoro</p>
                                    <p>Executive Director</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" data-bs-toggle="modal" data-bs-target="#exampleModalToggle2" style="cursor: pointer">
                            <div class="card-body" style="text-align: center">
                                <div class="d-flex justify-content-center align-items-center"
                                    style="flex-direction: column">
                                    <img src="{{ asset('/Images/batch2/Suzan.jpg') }}"
                                        style="border-radius: 50%; width: 200px; height: 200px; object-fit: contain;filter:contrast(140%)"
                                         alt="Susan Ejalam">
                                    <p class="pheader2">Susan Ejalam</p>
                                    <p>Regional Co-ordinator</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card" data-bs-toggle="modal" data-bs-target="#exampleModalToggle3" style="cursor: pointer">
                            <div class="card-body" style="text-align: center">
                                <div class="d-flex justify-content-center align-items-center"
                                    style="flex-direction: column">
                                    <img src="{{ asset('/Images/batch2/Shalom2.jpg') }}"
                                        style="border-radius: 50%; width: 200px; height: 200px; object-fit: contain"
                                        alt="ShalomAngela Lengeju">
                                    <p class="pheader2">ShalomAngela Lengeju</p>
                                    <p>Legal Affairs Manager</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->
    <div class="modal fade" id="exampleModalToggle1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel1" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalToggleLabel1">Christopher Michoro</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('/Images/Chris Michoro.jpeg') }}" class="img-fluid mb-3" style="filter:contrast(140%)" alt="Christopher Michoro">
                    <p style="color:dodgerblue">Executive Director</p>
                    <p>Christopher Michoro is an accomplished debater known for his strategic thinking and articulate expression. With a background in political science, Christopher has honed his skills in argumentation and public speaking.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Next </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalToggleLabel2">Susan Ejalam</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('/Images/batch2/Suzan.jpg') }}" class="img-fluid mb-3" style="filter:contrast(140%)" alt="Susan Ejalam">
                    <p style="color:dodgerblue">Regional Co-ordinator</p>
                    <p>Debate Enthusiast and passionate about intellectually engaging activities with a rich background of coaching and adjudicating in debates and public speaking. She is a self-driven person, a go-getter in her strides and has strong abilities in organizational skills and keen attention to details and having served as the Chair of the Organizing Committee (TANDS) for 5+ years.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle1" data-bs-toggle="modal" data-bs-dismiss="modal">Back to Christopher</button>
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal" data-bs-dismiss="modal">Next</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalToggleLabel3">ShalomAngela Lengeju</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('/Images/batch2/Shalom.jpg') }}" class="img-fluid mb-3" alt="ShalomAngela Lengeju">
                    <p style="color:dodgerblue">Legal Affairs Manager</p>
                    <p>ShalomAngela Lengeju is an accomplished debater and a debate and public speaking trainer. She won first place in the Mwalimu Nyerere Invitational Debate Championship in Kenya (2019), second place in EASDC (2019), and third place in AOSDC (2019). She received the Future Upcoming Speaker award and Best Team from Arusha award at AOSDC (2019), and fifth place in Public Speaking at MNIV Kenya (2019). ShalomAngela debated in MNIV 2019 at Dar es Salaam and has organized and judged tournaments such as EASDC 2023, EASDC 2022, TNDC 2022, and TNDC 2021. She is the founding chairperson of the Debate Club of the Law Student's Association at Tumaini University Makumira, where she was awarded a Bachelor of Laws. ShalomAngela is an alumni of the Girls Livelihood and Mentorship Initiative and is currently a student at the Law School of Tanzania</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Back to Suzan</button>
                </div>
            </div>
        </div>
    </div>
</section>
