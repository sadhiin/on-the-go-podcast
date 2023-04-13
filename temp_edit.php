<?php
session_start();
if (isset($_SESSION['username'])) {
    $title = "Edit Profile";
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
    <title>Edit Profile</title>
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
                    <a href="dashboard.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span>
                    </a>
                    <a href="temp_edit.php" class="nav_link active">
                        <i class='bi bi-pencil-square nav_icon'></i> <span class="nav_name">Edit Profile</span>
                    </a>

                    <a href="#" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i>
                        <span class="nav_name">Messages</span>
                    </a>

                    <a href="#" class="nav_link">
                        <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bookmark</span>
                    </a>

                    <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span>
                    </a>

                    <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                        <span class="nav_name">Stats</span>
                    </a>
                </div>
            </div> <a href="./logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <h3>Edit Your Profile <?php echo $_SESSION['data']['name']; ?></h3>
        <div>
            <?php

            $name = $email = $username = $gender = $dob = "";
            $nameErr = $emailErr = $usernameErr = $genderErr = $dobErr = $message = "";
            $isValid = true;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo "geting the reqest";

                #----- Name -----#
                if (!isset($_POST['name']) || empty($_POST['name'])) {
                    $nameErr = "Name is required";
                    $isValid = false;
                } else {
                    $name = $_POST['name'];
                    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                        $nameErr = "Only letters, whitespaces, - and ' are acceptable";
                        $isValid = false;
                    } else if (str_word_count($name) < 2) {
                        $nameErr = "Name has to contain at least two words ";
                        $isValid = false;
                    }
                }

                #----- Email -----#
                if (!isset($_POST['email']) || empty($_POST["email"])) {
                    $emailErr = "Email is required";
                    $isValid = false;
                } else {
                    $email = $_POST["email"];
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format";
                        $isValid = false;
                    }
                }

                #----- User Name -----#
                if (!isset($_POST['username']) || empty($_POST['username'])) {
                    $usernameErr = "User Name is required";
                    $isValid = false;
                } else {
                    $username = $_POST['username'];
                    if (!preg_match("/^[a-zA-Z-0-9' ]*$/", $username)) {
                        $usernameErr = "Only letters and white space are allowed";
                        $isValid = false;
                    } elseif (str_word_count($username) > 1) {
                        $usernameErr = "User Name has to contain one word";
                        $isValid = false;
                    }
                }

                if ($isValid) {
                    $setNewData = [
                        'name'            => $_POST['name'],
                        'email'            => $_POST['email'],
                        'username'         => $_SESSION['data']['username'],
                        'password'         => $_SESSION['data']['password'],

                        'profilepicpath'     => $_SESSION['data']['profilepicpath']
                    ];
                    if (updateUserInfo($setNewData)) {
                        $_SESSION['data'] = $setNewData;
                        header('Location:viewprofile.php');
                    }
                }
            }

            ?>

            <div class="container">
                <div class="row gutters">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="account-settings">
                                    <div class="user-profile">
                                        <div class="user-avatar">
                                            <form method="post" action="picupload.php" enctype="multipart/form-data">
                                                <img src="<?php echo $_SESSION['data']['profilepicpath'] ?>" width="280" height="280" alt="<?php echo $_SESSION['data']['name'] ?>">
                                                <!-- change profilepicture -->
                                                <br>
                                                <input type="file" name="file_to_upload" value="Choose a file"> <br>
                                                <input type="submit" name="submit">

                                            </form>
                                        </div>
                                        <h5 class="user-name"><?php echo $_SESSION['data']['name'] ?></h5>
                                        <h6 class="user-email"><?php echo $_SESSION['data']['email'] ?></h6>
                                    </div>
                                    <div class="about">
                                        <h5>About</h5>
                                        <p><?php echo $_SESSION['data']['user_about'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="mb-2 text-primary">Personal Details</h6>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="fullName">Full Name</label>
                                                <input type="text" class="form-control" id="fullName" placeholder="Enter full name" name="name" value="<?= $_SESSION['data']['name'] ?>">
                                                <span class="red"><?php echo $nameErr ?></span>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="eMail">Email</label>
                                                <input type="text" class="form-control" id="eMail" name="email" value="<?= $_SESSION['data']['email'] ?>" placeholder="Enter email ID">
                                                <span class="red"><?php echo $emailErr ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="mt-3 mb-2 text-primary">Credential</h6>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="pass">Password</label>
                                                <input type="password" class="form-control" id="pass" placeholder="Current Password">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="newpass">New Password</label>
                                                <input type="password" class="form-control" id="newpass" placeholder="New Password">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="repass">Confirm Password</label>
                                                <input type="password" class="form-control" id="repass" placeholder="New Password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text-left">
                                                <br>
                                                <input type="button" id="cancle" name="cancle" value="Cancel" class="btn btn-outline-danger"></input>
                                                <input type="button" id="submit" name="submit" value="Update" class="btn btn-outline-primary"></input>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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