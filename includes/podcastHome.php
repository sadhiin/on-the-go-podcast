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
                <div class="col-6 text-right">
                    <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                    <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </div>

                <?php

                // traverse 3 rows at a time
                // for ($i = 0; $i < count($rows); $i += 3) {
                // process 3 rows at a time

                // for ($j = 0; $j < 3 && $i + $j < count($rows); $j++) {
                // if ($i + 0 < count($rows)) {
                //     $data = $rows[$i + 0];

                // $podcast_thambnail = $data['image'];
                // $podcast_title = $data['title'];
                // $podcast_desc = substr($data['description'], 0, 20) . "...";
                // $podcast_path = $data['post_path'];

                // echo count($data[]);
                // print_r($data);
                // echo $podcast_title . "<br>";
                // echo $podcast_thambnail . "<br>";
                // echo $podcast_desc . "<br>";
                // echo $podcast_path . "<br>";
                ?>
                <?php
                //}
                ?>
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
                                <!-- <div class="carousel-item">
                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532771098148-525cefe10c23?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3f317c1f7a16116dec454fbc267dd8e4">
                                            <div class="card-body">
                                                <h4 class="card-title">Special title treatment - 4</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532715088550-62f09305f765?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ebadb044b374504ef8e81bdec4d0e840">
                                            <div class="card-body">
                                                <h4 class="card-title">Special title treatment - 5</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1506197603052-3cc9c3a201bd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=0754ab085804ae8a3b562548e6b4aa2e">
                                            <div class="card-body">
                                                <h4 class="card-title">Special title treatment - 6</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">

                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ee8417f0ea2a50d53a12665820b54e23">
                                            <div class="card-body">
                                                <h4 class="card-title">Special title treatment - 7</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532777946373-b6783242f211?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=8ac55cf3a68785643998730839663129">
                                            <div class="card-body">
                                                <h4 class="card-title">Special title treatment - 8</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532763303805-529d595877c5?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=5ee4fd5d19b40f93eadb21871757eda6">
                                            <div class="card-body">
                                                <h4 class="card-title">Special title treatment - 9</h4>
                                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
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