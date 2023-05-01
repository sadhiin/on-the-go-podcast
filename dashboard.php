<?php
session_start();
if (isset($_SESSION['username'])) {
    $title = "Dashboard";
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
    <?php include("./includes/dash_nav.php") ?>
    <!--Container Main start-->
    <div class="height-100 bg-light">

        <div>
            <?php
            if (isset($_GET['source'])) {
                $source = $_GET['source'];
            } else {
                $source = '';
            }

            switch ($source) {
                case 'fileupload':
                    include 'includes/user/filesupload.php';
                    break;
                case 'edit_post':
                    include "./includes/user/edit_post.php";
                    break;
                case '100':
                    echo "another nice";
                    break;
                default:
                    include './includes/user/history.php';
                    break;
            }

            if(isset($_GET['delete'])){
                $id = $_GET['delete'];
                if (customeQuery_NONRETURN("DELETE FROM history WHERE podcast_id = $id")) {

                    header("Location: dashboard.php");
                }
            }


            ?>

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