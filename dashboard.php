<?php
session_start();
if (isset($_SESSION['username'])) {
    include "./includes/dash_header.php";
} else {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.z3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./includes/CSS/dash.css">

    <!-- fontawesome kit -->
    <link rel="stylesheet" href="https://kit.fontawesome.com/4db96eb076.css" crossorigin="anonymous">
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="./index.php" class="nav_logo"> <i class='bi bi-mic nav_logo-icon'></i>
                    <span class="nav_logo-name">On The Go Podcast</span> </a>
                <div class="nav_list">
                    <a href="dashboard.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span></a>
                    <a href="temp_edit.php" class="nav_link">
                        <i class='bi bi-pencil-square nav_icon'></i> <span class="nav_name">Edit Profile</span> </a>
                    <a href="#" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i>
                        <span class="nav_name">Messages</span> </a>
                    <a href="#" class="nav_link">
                        <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bookmark</span> </a>
                    <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span></a>
                    <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                        <span class="nav_name">Stats</span> </a>
                </div>
            </div> <a href="./logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <h3>Welcome <?php echo $_SESSION['data']['name']; ?></h3>
        <div>
            <h1>Another --Container</h1>
        </div>
    </div>
    <!--Container Main end-->

    <script src="./js/dash.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <!-- <link rel="stylesheet" href=""> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link type="'application/javascript" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</body>

</html>