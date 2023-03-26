<?php

session_start();
if (isset($_SESSION['username'])) {
    session_destroy();
    header("location:index.php");
} else {
    header("location:index.php");
}
if(count($_COOKIE)){
    foreach($_COOKIE as $k => $v) {
        setcookie($k, "", time() - 3600);
    }
}