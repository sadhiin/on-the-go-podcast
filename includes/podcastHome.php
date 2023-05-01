    <!-- // this file hold the structure of the app page for podcasts... -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <style>
        #popup {
            display: none;
            position: absolute;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            z-index: 9999;
        }
    </style>

    <!-- player script -->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css">

    <?php
    // php block to full the information form the database.
    include_once('./controller/podcastLoder.php');
    $allrows = getAllPodcasts();

    // showing the number of containts per page
    $num_per_page = 6;
    $total_records = count($allrows);
    $total_pages = ceil($total_records / $num_per_page);

    $current_pageNumber = 1;
    if (isset($_GET['page'])) {
        $current_pageNumber = (int)$_GET['page'];
    } else {
        $current_pageNumber = 1;
    }
    $start_from = ($current_pageNumber - 1) * 6;

    $qr_result = customeQuery("SELECT * FROM podcasts limit $start_from, $num_per_page");

    // echo "Total records:" . $total_records;

    // echo $total_pages;

    $index_counter = 0;
    ?>
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-3">Enjoy Podcast 🎙️</h3>
                </div>

                <div class="col-12">
                    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                            <?php
                            for ($i = 0; $i < count($qr_result); $i += 3) {
                            ?>
                                <div class="carousel-item active">
                                    <div class="row">

                                        <div class="col-md-4 mb-3">

                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280" src="<?php if ($i + 0 < count($qr_result)) {
                                                                                                echo $qr_result[$i + 0]['image'];
                                                                                            } ?>">
                                                <div class="card-body">
                                                    <h4 class="card-title"><?php if ($i + 0 < count($qr_result)) {
                                                                                echo substr($qr_result[$i + 0]['title'], 0, 28);
                                                                            } ?></h4>
                                                    <p class="card-text"><?php if ($i + 0 < count($qr_result)) {
                                                                                echo substr($qr_result[$i + 0]['description'], 0, 50) . "...";
                                                                            } ?>
                                                    </p>
                                                    <p class="card-text" id="server-msg1"></p>
                                                    <audio id="player1" controls onclick="trackHistory('player1','server-msg1', <?php echo $qr_result[$i + 0]['podcast_id']; ?>)">
                                                        <source src="<?php if ($i + 0 < count($qr_result)) {
                                                                            echo $qr_result[$i + 0]['post_path'];
                                                                        } ?>" type="audio/mp3">
                                                    </audio>
                                                    <!-- Add Play and Pause buttons -->
                                                    <button class="btn btn-primary" id="playButton1" onclick="trackHistory('player1','server-msg1', <?php echo $qr_result[$i + 0]['podcast_id']; ?>)">Play</button>
                                                    <button class="btn btn-primary" id="pauseButton1">Pause</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280" src="<?php if ($i + 1 < count($qr_result)) {
                                                                                                echo $qr_result[$i + 1]['image'];
                                                                                            } ?>">
                                                <div class="card-body">
                                                    <h4 class="card-title"><?php if ($i + 1 < count($qr_result)) {
                                                                                echo substr($qr_result[$i + 1]['title'], 0, 28);
                                                                            } ?></h4>
                                                    <p class="card-text"><?php if ($i + 1 < count($qr_result)) {
                                                                                echo substr($qr_result[$i + 1]['description'], 0, 50) . "...";
                                                                            } ?>
                                                    </p>
                                                    <p class="card-text" id="server-msg2"></p>
                                                    <audio id="player2" controls onclick="trackHistory('player2','server-msg2', <?php echo $qr_result[$i + 1]['podcast_id']; ?>)">
                                                        <source src="<?php if ($i + 1 < count($qr_result)) {
                                                                            echo $qr_result[$i + 1]['post_path'];
                                                                        } ?>" type="audio/mp3">
                                                    </audio>
                                                    <!-- Add Play and Pause buttons -->
                                                    <button class="btn btn-primary" id="playButton2" onclick="trackHistory('player2', 'server-msg2',<?php echo $qr_result[$i + 1]['podcast_id']; ?>)">Play</button>
                                                    <button class="btn btn-primary" id="pauseButton2">Pause</button>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img class="img-fluid" alt="100%x280" src="<?php if ($i + 1 < count($qr_result)) {
                                                                                                echo $qr_result[$i + 2]['image'];
                                                                                            } ?>">
                                                <div class="card-body">
                                                    <h4 class="card-title"><?php if ($i + 2 < count($qr_result)) {
                                                                                echo substr($qr_result[$i + 2]['title'], 0, 28);
                                                                            } ?></h4>
                                                    <p class="card-text"><?php if ($i + 2 < count($qr_result)) {
                                                                                echo substr($qr_result[$i + 2]['description'], 0, 50) . "...";
                                                                            } ?>
                                                    </p>
                                                    <p class="card-text" id="server-msg3"></p>
                                                    <audio id="player3" controls onclick="trackHistory('player3','server-msg3',<?php echo $qr_result[$i + 2]['podcast_id']; ?>)">
                                                        <source src="<?php if ($i + 2 < count($qr_result)) {
                                                                            echo $qr_result[$i + 2]['post_path'];
                                                                        } ?>" type="audio/mp3">
                                                    </audio>
                                                    <!-- Add Play and Pause buttons -->
                                                    <button class="btn btn-primary" id="playButton3" onclick="trackHistory('player3','server-msg3',<?php echo $qr_result[$i + 2]['podcast_id']; ?>)">Play</button>
                                                    <button class="btn btn-primary" id="pauseButton3">Pause</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php

                            }
                                ?>
                                </div>
                                <!-- secont row -->
                                <?php
                                for ($i = 3; $i < count($qr_result); $i += 3) {
                                ?>
                                    <div class="carousel-item active">
                                        <div class="row">

                                            <div class="col-md-4 mb-3">
                                                <!-- <a href="<?php if ($i + 0 < count($qr_result)) {
                                                                    echo $qr_result[$i + 0]['post_path'];
                                                                } ?>"> -->
                                                <div class="card">
                                                    <img class="img-fluid" alt="100%x280" src="<?php if ($i + 0 < count($qr_result)) {
                                                                                                    echo $qr_result[$i + 0]['image'];
                                                                                                } ?>">
                                                    <div class="card-body">
                                                        <h4 class="card-title"><?php if ($i + 0 < count($qr_result)) {
                                                                                    echo substr($qr_result[$i + 0]['title'], 0, 28);
                                                                                } ?></h4>
                                                        <p class="card-text"><?php if ($i + 0 < count($qr_result)) {
                                                                                    echo substr($qr_result[$i + 0]['description'], 0, 50) . "...";
                                                                                } ?>
                                                        </p>
                                                        <p class="card-text" id="server-msg4"></p>
                                                        <audio id="player4" controls onclick="trackHistory('player4',<?php echo $qr_result[$i + 0]['podcast_id']; ?>)">
                                                            <source src="<?php if ($i + 0 < count($qr_result)) {
                                                                                echo $qr_result[$i + 0]['post_path'];
                                                                            } ?>" type="audio/mp3">
                                                        </audio>
                                                        <!-- Add Play and Pause buttons -->
                                                        <button class="btn btn-primary" id="playButton4" onclick="trackHistory('player4','server-msg4',<?php echo $qr_result[$i + 0]['podcast_id']; ?>)">Play</button>
                                                        <button class="btn btn-primary" id="pauseButton4">Pause</button>
                                                    </div>

                                                </div>
                                                <!-- </a> -->
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="card">
                                                    <img class="img-fluid" alt="100%x280" src="<?php if ($i + 1 < count($qr_result)) {
                                                                                                    echo $qr_result[$i + 1]['image'];
                                                                                                } ?>">
                                                    <div class="card-body">
                                                        <h4 class="card-title"><?php if ($i + 1 < count($qr_result)) {
                                                                                    echo substr($qr_result[$i + 1]['title'], 0, 28);
                                                                                } ?></h4>
                                                        <p class="card-text"><?php if ($i + 1 < count($qr_result)) {
                                                                                    echo substr($qr_result[$i + 1]['description'], 0, 50) . "...";
                                                                                } ?>
                                                        </p>
                                                        <p class="card-text" id='server-msg5'></p>

                                                        <audio id="player5" controls onclick="trackHistory('player5','server-msg5',<?php echo $qr_result[$i + 1]['podcast_id']; ?>)">
                                                            <source src="<?php if ($i + 1 < count($qr_result)) {
                                                                                echo $qr_result[$i + 1]['post_path'];
                                                                            } ?>" type="audio/mp3">
                                                        </audio>
                                                        <!-- Add Play and Pause buttons -->
                                                        <button class="btn btn-primary" id="playButton5" onclick="trackHistory('player5','server-msg5',<?php echo $qr_result[$i + 1]['podcast_id']; ?>)">Play</button>
                                                        <button class="btn btn-primary" id="pauseButton5">Pause</button>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="card">
                                                    <img class="img-fluid" alt="100%x280" src="<?php if ($i + 1 < count($qr_result)) {
                                                                                                    echo $qr_result[$i + 2]['image'];
                                                                                                } ?>">
                                                    <div class="card-body">
                                                        <h4 class="card-title"><?php if ($i + 2 < count($qr_result)) {
                                                                                    echo substr($qr_result[$i + 2]['title'], 0, 28);
                                                                                } ?></h4>
                                                        <p class="card-text"><?php if ($i + 2 < count($qr_result)) {
                                                                                    echo substr($qr_result[$i + 2]['description'], 0, 50) . "...";
                                                                                } ?>
                                                        </p>
                                                        <p class="card-text" id='server-msg6'></p>

                                                        <audio id="player6" controls onclick="trackHistory('player6','server-msg6',<?php echo $qr_result[$i + 2]['podcast_id']; ?>)">
                                                            <source src="<?php if ($i + 2 < count($qr_result)) {
                                                                                echo $qr_result[$i + 2]['post_path'];
                                                                            } ?>" type="audio/mp3">
                                                        </audio>
                                                        <!-- Add Play and Pause buttons -->
                                                        <button class="btn btn-primary" id="playButton6" onclick="trackHistory('player6','server-msg6',<?php echo $qr_result[$i + 2]['podcast_id']; ?>)">Play</button>
                                                        <button class="btn btn-primary" id="pauseButton6">Pause</button>

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
        <!-- pagination section  -->
        <div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link <?php echo ($current_pageNumber == 1) ? "disabled" : "" ?>" href="
                        <?php if ($current_pageNumber > 1) {
                            $pre = $current_pageNumber - 1;
                            echo "?page=$pre";
                        }
                        ?>">Previous</a>
                    </li>
                    <?php
                    for ($i = 1; $i <= $total_pages; $i++) {

                    ?>
                        <li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                    <?php } ?>

                    <a class="page-link <?php echo ($current_pageNumber == $total_pages) ? "disabled" : '' ?>" href="
                    <?php if ($current_pageNumber < $total_pages) {
                        $nxt = $current_pageNumber + 1;
                        echo "?page=$nxt";
                    }
                    ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <script src=" https://cdn.plyr.io/3.6.2/plyr.js"></script>
    <script src="./js/podcasthome.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../includes/CSS/player.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">