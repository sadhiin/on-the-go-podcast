<?php

session_start();
if (isset($_SESSION['username'])) {
  include "./includes/header_logeding.php";
} else {
  include "./includes/header.php";
}
$target_dir = "upload/";
if (strpos($_FILES['file_to_upload']['type'], 'image/') !== false) {

  // $ext = substr($_FILES['file_to_upload']['name'], strlen($_FILES['file_to_upload']['name']) - 4, 4);
  $ext = explode('.', $_FILES['file_to_upload']['name']);
  $ext = $ext[1];
  // if (strtolower($ext) == 'jpeg') {
  //   $ext = substr($_FILES['file_to_upload']['name'], strlen($_FILES['file_to_upload']['name']) - 5, 5);
  // }
  $moving_path = $target_dir . time() . '.' . $ext;
  if (move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $moving_path)) {
    $_SESSION['data']['profilepicpath'] = $moving_path;
    $set = [
      'name'            => $_SESSION['data']['name'],
      'email'           => $_SESSION['data']['email'],
      'username'        => $_SESSION['data']['username'],
      'password'        => $_SESSION['data']['password'],
      'profilepicpath'  => $moving_path
    ];
    include "./controller/updateInfo.php";
    updateUserInfo($set);
    $_SESSION['data'] = getUser($_SESSION['data']['username']);
    header('Location: dashboard.php');
  } else {
    echo '<h1>failed to upload file</h1>';
  }
} else {
  echo '<h1>uploaded file not a image</h1>';
}
