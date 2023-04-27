<?php
function audio_uploader($passedfile)
{
    $target_dir = "uploads2/";
    $target_file = $target_dir . basename($_FILES["audio_file"]["name"]);
    $file_name = $passedfile['name'];
    $file_tmp = $passedfile['tmp_name'];
    $file_size = $passedfile['size'];
    $file_type = $passedfile['type'];
    $file_ext = explode('.', $passedfile['name']);;
    $file_ext = $file_ext[1];

    $extensions = array("mp3", "wav", "ogg");
    $msg = ["err" => '', 'rtn' => true];
    if (in_array($file_ext, $extensions) === false) {
        $msg['err'] = "extension not allowed, please choose a MP3, WAV, or OGG file.";
    }

    if ($file_size > 20971520) {
        $msg['err'] = 'File size must be less than 20 MB';
    }
    $target_file .= "." . $file_ext;
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, $target_file);
        echo "File uploaded successfully.";
        $msg['rtn'] = true;
    } else {
        $msg['err'] = "somthing went worng";
        $msg['rtn'] = false;
    }
    return $msg;
}

function thumbnail_uploder($passed)
{
    $target_dir = "thumbnail/";
    if (strpos($passed['type'], 'image/') !== false) {

        $ext = explode('.', $passed['name']);
        $ext = $ext[1];

        $moving_path = $target_dir . basename($passed["name"]) . '.' . $ext;
        if (move_uploaded_file($passed["tmp_name"], $moving_path)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
