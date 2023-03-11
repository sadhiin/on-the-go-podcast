<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>

    <!-- Required Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- google font ref -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- own style sheet -->
    <link rel="stylesheet" href="./includes/CSS/style.css">
    <!-- fontawesome kit -->
    <script src="https://kit.fontawesome.com/4db96eb076.js" crossorigin="anonymous"></script>
</head>

<body>

    <nav class="navbar bg-body-tertiary">
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
                    <a class="nav-link" aria-current="page" href="./aboutus.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./registation.php">Register</a>
                </li>
            </ul>
        </div>
    </nav>
    <hr>