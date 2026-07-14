<style>
    .carousel-item {
        position: relative;
        overflow: hidden;
        height: 100%;
    }

    .carousel-item img {
        width: 100%;
        height: 100%;
        min-height: 60vh;
        object-fit: cover;
        filter: contrast(1.2);
        transition: transform 0.5s ease-in-out;
    }

    .carousel-item:hover img {
        transform: scale(1.1);
    }

    .overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 40%;
        background: linear-gradient(to top, rgba(50, 51, 102, 1.5), rgba(50, 51, 102, 0) 50%);
        display: flex;
        justify-content: center;
        align-items: flex-end;
        padding: 10px;
        box-sizing: border-box;
    }

    .description {
        color: white;
        font-weight: bolder;
        padding: 10px;
        font-size: 1.5em;
        text-align: center;
    }

    .descriptionText {
        font-size: 15px;
    }

    .programDescription {
        margin-top: 40px;
    }

    @media (max-width: 578px) {
        .programDescription {
            margin-top: 40;
        }
      
    }
</style>
<section class="section4">
    <div class="col-md-12" style="margin-top: 50px">
        <h3>ACTIVITIES</h3>
        <p class="pheader">Our Mission is best served by these activities</p>
        <div class="row">
            <div class="col-md-6" style="position: relative;">
                <div id="programsCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            
                            <a data-fancybox="gallery" 
                               data-caption="Debating!"
                               href="{{asset('/Images/batch3/YZVS7167.JPG')}}" >
                                <img src="{{asset('/Images/batch3/YZVS7167.JPG')}}" loading="lazy" alt="Listening Carefully!" style="filter: contrast(140%)">
                                
                            </a>
                            
                        </div>
                        
                        <div class="carousel-item">
                            <a data-fancybox="gallery" 
                               data-caption="Listening Carefully!"
                               href="{{ asset('/Images/batch3/YZVS7142.JPG
') }}" >
                                <img src="{{ asset('/Images/batch3/YZVS7142.JPG
') }}" loading="lazy" alt="Listening Carefully!" style="filter: contrast(140%)">
                                
                            </a>
                        </div>
                    </div>

                    <ol class="carousel-indicators">
                        <li data-bs-target="#programsCarousel" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#programsCarousel" data-bs-slide-to="1"></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-6 programDescription">
                <h3>DEBATES</h3>
                <p class="descriptionText">The debate program in the Tanzania National Debate Society trains
                    participants in structured argumentation and critical thinking. Debates are organized on a range of
                    topics, allowing participants to research, formulate, and present arguments both for and against a
                    given motion. This program emphasizes the importance of evidence-based reasoning, quick thinking,
                    and respectful rebuttal. By participating in debates, individuals develop the skills necessary to
                    engage in intellectual discussions, promote diverse viewpoints, and advocate for their positions
                    effectively, aligning with the society’s mission to cultivate informed and persuasive debaters.</p>
            </div>
        </div>

        <div class="row" style="margin-top: 10px">
            <div class="col-md-6 programDescription">
                <h3>QUIZ CHALLENGE</h3>
                <p class="descriptionText">The quiz challenge program of the Tanzania National Debate Society engages
                    participants in a competitive and educational format that tests their knowledge on various subjects,
                    including history, science, current events, and general knowledge. Teams or individuals answer a
                    series of questions under timed conditions, promoting quick thinking and broad intellectual
                    engagement. This program aims to stimulate curiosity and learning among participants, fostering a
                    culture of knowledge and academic excellence. By participating in quiz challenges, individuals
                    enhance their cognitive abilities and learn to collaborate and compete in a spirited yet educational
                    environment.</p>
            </div>
            <div class="col-md-6" style="position: relative;">
                <div id="programsCarousel" class="carousel slide" data-bs-ride="carousel">
                    
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            
                            <a data-fancybox="gallery" 
                               data-caption="Brainstorming!"
                               href="{{asset('/Images/batch3/YZVS7420.JPG
')}}" >
                                <img src="{{asset('/Images/batch3/YZVS7420.JPG')}}" loading="lazy" alt="Brainstorming" style="filter: contrast(140%)">
                                
                            </a>
                            
                        </div>
                        
                        <div class="carousel-item">
                            <a data-fancybox="gallery" 
                               data-caption="Brainstorming!"
                               href="{{ asset('/Images/IMG_9173.jpg

') }}" >
                                <img src="{{ asset('/Images/IMG_9173.jpg') }}" loading="lazy" alt="Brainstorming" style="filter: contrast(140%)">
                                
                            </a>
                        </div>
                    </div>
                    
                    
                    

                    <ol class="carousel-indicators">
                        <li data-bs-target="#programsCarousel" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#programsCarousel" data-bs-slide-to="1"></li>
                    </ol>
                </div>
            </div>

        </div>

        <div class="row" style="margin-top: 10px">
            <div class="col-md-6" style="position: relative;">
                <div id="programsCarousel" class="carousel slide" data-bs-ride="carousel">
                    
                    
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            
                            <a data-fancybox="gallery" 
                               data-caption="Public Speaking!"
                               href="{{asset('/Images/batch3/YZVS7844.JPG')}}" >
                                <img src="{{asset('/Images/batch3/YZVS7844.JPG')}}" loading="lazy" alt="Public Speaking!" style="filter: contrast(140%)">
                            </a>
                            
                        </div>
                        
                        <div class="carousel-item">
                            <a data-fancybox="gallery" 
                               data-caption="Public Speaking!"
                               href="{{asset('/Images/batch3/YZVS7859.JPG')}}" >
                                <img src="{{asset('/Images/batch3/YZVS7859.JPG')}}" loading="lazy" alt="Public Speaking!" style="filter: contrast(140%)">
                            </a>
                        </div>
                    </div>
                    
                    
                    

                    <ol class="carousel-indicators">
                        <li data-bs-target="#programsCarousel" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#programsCarousel" data-bs-slide-to="1"></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-6 programDescription">
                <h3>PUBLIC SPEAKING</h3>
                <p class="descriptionText">In the Tanzania National Debate Society, the public speaking program focuses
                    on enhancing participants' oratory skills by allowing them to present on various topics to diverse
                    audiences. Participants learn to express ideas clearly and confidently, honing their ability to
                    engage and persuade listeners. This program includes workshops on speech writing, voice modulation,
                    and effective body language. Public speaking events encourage individuals to articulate their
                    thoughts coherently and compellingly, reflecting the society’s goal to foster articulate and
                    informed citizens capable of contributing to public discourse.</p>
            </div>

        </div>
    </div>
</section>
