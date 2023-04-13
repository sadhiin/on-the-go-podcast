<?php

session_start();
if (isset($_SESSION['username'])) {
  include "./includes/header_logeding.php";
} else {
  include "./includes/header.php";
}
$target_dir = "upload/";
if (strpos($_FILES['file_to_upload']['type'], 'image/') !== false) {

  $ext = substr($_FILES['file_to_upload']['name'], strlen($_FILES['file_to_upload']['name']) - 4, 4);
  if (strtolower($ext) == 'jpeg') {
    $ext = substr($_FILES['file_to_upload']['name'], strlen($_FILES['file_to_upload']['name']) - 5, 5);
  }
  $moving_path = $target_dir . time() . $ext;
  if (move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $moving_path)) {
    if ($_SESSION['data']['profilepicpath'] != 'profilepic/1.jpg') {
      unlink($_SESSION['data']['profilepicpath']);
    }
    $data = json_decode(file_get_contents('data.json'), true);


    foreach ($data as $key => $value) {

      if ($value['username'] ==  $_SESSION['data']['username']) {

        $set = [
          'name'            => $_SESSION['data']['name'],
          'email'           => $_SESSION['data']['email'],
          'username'        => $_SESSION['data']['username'],
          'password'        => $_SESSION['data']['password'],
          'profilepicpath'  => $moving_path
        ];
        $_SESSION['data'] = $set;
        $data[$key] = $_SESSION['data'];
        file_put_contents('data.json', json_encode($data));

        header('Location: dashboard.php');
        break;
      }
    }
  } else {
    echo '<h1>failed to upload file</h1>';
  }
} else {
  echo '<h1>uploaded file not a image</h1>';
}
