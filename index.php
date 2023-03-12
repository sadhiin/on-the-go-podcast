<?php
    $title = "On-the-Go Home";
    include "./includes/header.php";
?>
<!-- tag lines -->
<!-- "Listen to the voices that matter: Tune in to our podcast today!"
"Discover new perspectives, ideas, and stories with our podcast."
"Join the conversation: Our podcast is where the best discussions happen."
"Get inspired, entertained, and informed with our podcast."
"Take your listening experience to the next level with our captivating podcast."
"From thought-provoking interviews to hilarious banter, our podcast has it all."
"Your go-to source for insightful commentary, expert opinions, and engaging conversations."
"Join our community of curious minds and stay ahead of the curve with our podcast." -->


<!-- TO-DO 📝📝-->
<!-- compress the images -->

<div class="p-3 m-0 border-0 bd-example">

    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3" class="active" aria-current="true"></button>
        </div>
        <div class="carousel-inner">

            <div class="carousel-item" data-bs-interval="200">
                <img src="./images/img6.jpg" width="1500" height="600" alt="image-1">

                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-primary">Listen to the voices that matter: Tune in to our podcast today!</h5>
                </div>
            </div>

            <div class="carousel-item" data-bs-interval="200">
                <img src="./images/img2.jpg" width="1500" height="600" alt="image-1">

                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-info"> Get inspired, entertained, and informed with our podcast </h5>
                </div>
            </div>

            <div class="carousel-item active">
                <img src="./images/img4.jpg" width="1500" height="600" alt="image-1">

                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-info"> From thought-provoking interviews to hilarious banter, our podcast has it all</h5>
                </div>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>


        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>
</div>

<!-- TO-DO 📝📝-->
<!-- compress the images
dynamically update the creators info -->


<div id="carouselExampleControls" class="carousel slide text-center carousel-dark" data-mdb-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="rounded-circle shadow-1-strong mb-4" src="./images/img (10).webp" alt="avatar" style="width: 150px;" />
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <h5 class="mb-3">Sarah Johnson</h5>
                    <p>Experienced Journalist</p>
                    <p class="text-muted">
                        <i class="fas fa-quote-left pe-2"></i>
                        Sarah is an experienced journalist who has worked for prominent news organizations such as CNN and The New York Times. Her podcast, "The Storyteller," showcases her passion for storytelling by featuring compelling and thought-provoking stories from people from all backgrounds. With her skillful interviewing style, Sarah brings out the best in her guests, making her podcast a must-listen for anyone who loves a good story.
                    </p>
                </div>
            </div>
            <ul class="list-unstyled d-flex justify-content-center text-warning mb-0">
                <li><i class="fas fa-star fa-sm"></i></li>
                <li><i class="fas fa-star fa-sm"></i></li>
                <li><i class="fas fa-star fa-sm"></i></li>
                <li><i class="fas fa-star fa-sm"></i></li>
                <li><i class="far fa-star fa-sm"></i></li>
            </ul>
        </div>
        <div class="carousel-item">
            <img class="rounded-circle shadow-1-strong mb-4" src="./images/img (32).webp" alt="avatar" style="width: 150px;" />
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <h5 class="mb-3">John Lee</h5>
                    <p>Entrepreneur </p>
                    <p class="text-muted">
                        <i class="fas fa-quote-left pe-2"></i>
                        John is a successful business coach whose podcast, "Entrepreneurial Insights," provides practical advice and motivation for aspiring entrepreneurs. His casual conversational style and diverse guests make it an ideal resource for anyone looking to start or grow their own business.
                    </p>
                </div>
            </div>
            <ul class="list-unstyled d-flex justify-content-center text-warning mb-0">
                <li><i class="fas fa-star fa-sm"></i></li>
                <li><i class="fas fa-star fa-sm"></i></li>
                <li><i class="fas fa-star fa-sm"></i></li>
                <li><i class="fas fa-star fa-sm"></i></li>
                <li><i class="far fa-star fa-sm"></i></li>
            </ul>
        </div>
        <div class="carousel-item">
            <img class="rounded-circle shadow-1-strong mb-4" src="./images/img (1).webp" alt="avatar" style="width: 150px;" />
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <h5 class="mb-3">Dr. Maya Patel</h5>
                    <p>Psychologist</p>
                    <p class="text-muted">
                        <i class="fas fa-quote-left pe-2"></i>
                        Dr. Patel's podcast, "The Mindful Life," provides a compassionate guide to mindfulness for individuals seeking to improve their mental health and well-being. With a focus on stress reduction, meditation, and emotional regulation, it is a valuable resource for anyone interested in living a more intentional life.
                    </p>
                </div>
            </div>
            <ul class="list-unstyled d-flex justify-content-center text-warning mb-0">
                <li><i class="fas fa-star fa-sm"></i></li>
                <li><i class="fas fa-star fa-sm"></i></li>
                <li><i class="fas fa-star fa-sm"></i></li>
                <li><i class="fas fa-star fa-sm"></i></li>
                <li><i class="far fa-star fa-sm"></i></li>
            </ul>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<?php
    echo "<center>";
    include "./includes/footer.php";
    echo "</center>";
?>