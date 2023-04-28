    <!-- // this file hold the structure of the app page for podcasts... -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <?php
    // php block to full the information form the database.
    include_once('./controller/podcastLoder.php');
    $rows = getAllPodcasts();
    // var_dump($row);
    // echo count($row);
    // $row = $row->fetchAll(PDO::FETCH_ASSOC)
    // while ($data = $row->fetch()) {
    //     var_dump($data);
    //     echo "<br>";
    //     echo "<br>";
    //     echo "<br>";
    // }
    $index_counter = 0;
    ?>
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-3">Enjoy Podcast 🎙️</h3>
                </div>
                <!-- <div class="col-6 text-right">
                    <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                    <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div> -->
                <div class="col-12">
                    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                            <?php
                            for ($i = $index_counter; $i < count($rows); $i += 3) {
                            ?>
                                <div class="carousel-item active">
                                    <div class="row">

                                        <div class="col-md-4 mb-3">
                                            <!-- <a href="<?php if ($i + 0 < count($rows)) {
                                                                echo $rows[$i + 0]['post_path'];
                                                            } ?>"> -->
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280" src="<?php if ($i + 0 < count($rows)) {
                                                                                                echo $rows[$i + 0]['image'];
                                                                                            } ?>">
                                                <div class="card-body">
                                                    <h4 class="card-title"><?php if ($i + 0 < count($rows)) {
                                                                                echo $rows[$i + 0]['title'];
                                                                            } ?></h4>
                                                    <p class="card-text"><?php if ($i + 0 < count($rows)) {
                                                                                echo substr($rows[$i + 0]['description'], 0, 20) . "...";
                                                                            } ?></p>

                                                </div>

                                            </div>
                                            <!-- </a> -->
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280" src="<?php if ($i + 1 < count($rows)) {
                                                                                                echo $rows[$i + 1]['image'];
                                                                                            } ?>">
                                                <div class="card-body">
                                                    <h4 class="card-title"><?php if ($i + 1 < count($rows)) {
                                                                                echo $rows[$i + 1]['title'];
                                                                            } ?></h4>
                                                    <p class="card-text"><?php if ($i + 1 < count($rows)) {
                                                                                echo substr($rows[$i + 1]['description'], 0, 20) . "...";
                                                                            } ?></p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280" src="<?php if ($i + 1 < count($rows)) {
                                                                                                echo $rows[$i + 0]['image'];
                                                                                            } ?>">
                                                <div class="card-body">
                                                    <h4 class="card-title"><?php if ($i + 2 < count($rows)) {
                                                                                echo $rows[$i + 2]['title'];
                                                                            } ?></h4>
                                                    <p class="card-text"><?php if ($i + 2 < count($rows)) {
                                                                                echo substr($rows[$i + 2]['description'], 0, 20) . "...";
                                                                            } ?></p>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php

                            }
                                ?>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>