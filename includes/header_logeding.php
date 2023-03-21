<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>

    <!-- Required Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- google font ref -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- own style sheet -->
    <link rel="stylesheet" href="./includes/CSS/style.css">
    <!-- fontawesome kit -->
    <link rel="stylesheet" href="https://kit.fontawesome.com/4db96eb076.css" crossorigin="anonymous">
    <style>
        .bg-custom-1 {
            background-color: #85144b;
        }

        .bg-custom-2 {
            background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
        }
    </style>
</head>

<body>

    <!-- <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand brand" href="./index.php">
                <img src="./includes/logo.png" alt="Logo" width="40" height="35" class="d-inline-block align-text-top">
                On-The-Go Podcast
            </a>
            <ul class="nav justify-content-end header">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./dashboard.php">
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo "Welcome " . $_SESSION['username'];
                    }
                    ?>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav> -->
    <header class="p-3 mb-3 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a class="navbar-brand brand" href="./index.php">
                    <img src="./includes/logo.png" alt="Logo" width="40" height="35" class="d-inline-block align-text-top">
                    On-The-Go Podcast
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="./index.php" class="nav-link px-2 link-secondary">Home</a></li>
                    <li>
                        <a class="nav-link" aria-current="page" href="./dashboard.php">
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo "Welcome " . $_SESSION['username'];
                            }
                            ?>
                        </a>
                    </li>
                    <!-- <li><a href="#" class="nav-link px-2 link-dark">Customers</a></li>
                    <li><a href="#" class="nav-link px-2 link-dark">Products</a></li> -->
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                </form>

                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo $_SESSION['data']['profilepicpath'] ?>" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>

                    <ul class="dropdown-menu text-small" style="">
                        <li><a class="dropdown-item" href="./editprofile.php">Editprofile</a></li>
                        <li><a class="dropdown-item" href="./viewprofile.php">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="./logout.php">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <hr>