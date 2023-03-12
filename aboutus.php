<?php
    $title = "About-Us";
    include "./includes/header.php";
?>
<section>
    <div class="row d-flex justify-content-center">
        <div class="col-md-10 col-xl-8 text-center">
            <h3 class="mb-4">Our Team</h3>
            <p class="mb-4 pb-2 mb-md-5 pb-md-0">
            As developers, we are both creators and problem solvers. We have the power to bring ideas to life and to build innovative solutions that can change the world. We are part of a community that values creativity, collaboration, and continuous learning.
            </p>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-md-4 mb-5 mb-md-0">
            <div class="card testimonial-card">
                <div class="card-up" style="background-color: #9d789b;"></div>
                <div class="avatar mx-auto bg-white">
                    <img src="./images/siddik.png" class="rounded-circle img-fluid" />
                </div>
                <div class="card-body">
                    <h4 class="mb-4">Abu Bakar Siddik</h4>
                    <hr />
                    <p class="dark-grey-text mt-4">
                        <i class="fas fa-quote-left pe-2"></i>Lorem ipsum dolor sit amet eos adipisci,
                        consectetur adipisicing elit.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-5 mb-md-0">
            <div class="card testimonial-card">
                <div class="card-up" style="background-color: #7a81a8;"></div>
                <div class="avatar mx-auto bg-white">
                    <img src="./images/profile.png" class="rounded-circle img-fluid" />
                </div>
                <div class="card-body">
                    <h4 class="mb-4">Shanjidul Islam Sadhin</h4>
                    <hr />
                    <p class="dark-grey-text mt-4">
                        <i class="fas fa-quote-left pe-2"></i>Neque cupiditate assumenda in maiores
                        repudi mollitia architecto.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>

<?php
    echo "<center>";
    include "./includes/footer.php";
    echo "</center>";
?>