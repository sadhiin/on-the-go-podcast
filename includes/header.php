<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <!-- fornt style  -->
    <style>
        <?php include 'CSS/main.css'; ?><?php include 'CSS/headerstyle.css'; ?>.logo {
            background-color: blueviolet;
        }
    </style>

</head>

<body>

    <div class="header">
        <a href="../index.php" class="logo">On-The-Go</a>
        <div class="header-right">
            <a class="active" href="#home">Home</a>
            <a href="./login.php">Login</a>
            <a href="./registation.php">Signup</a>
        </div>

    </div>  