<?php
function audio_uploader($passedfile)
{
    $target_dir = "audio_files/";
    $target_file = $target_dir . basename($passedfile["name"]);
    $file_name = $passedfile['name'];
    $file_tmp = $passedfile['tmp_name'];
    $file_size = $passedfile['size'];
    $file_type = $passedfile['type'];
    $file_ext = explode('.', $passedfile['name']);;
    $file_ext = strtolower(end($file_ext));

    // echo $target_dir,' ', $target_file,' ',$file_name," ",$file_tmp," ", $file_size, " ", $file_type, " ", $file_ext;

    $extensions = array("mp3", "wav", "ogg");

    $msg = ["err" => '', 'rtn' => true, 'path' => ''];

    if (in_array($file_ext, $extensions) === false) {
        $msg['err'] = "extension not allowed, please choose a MP3, WAV, or OGG file.";
        return $msg;
    }

    if ($file_size > 20971520) {
        $msg['err'] = 'File size must be less than 20 MB';
        return $msg;
    }
    // $target_file .= "." . $file_ext;
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, $target_file);
        echo "File uploaded successfully.";
        $msg['rtn'] = true;
        $msg['path'] = $target_file;
        echo "Rechiving the audio file";
    } else {
        $msg['err'] = "somthing went worng";
        $msg['rtn'] = false;
    }

    return $msg;
}

function thumbnail_uploder($passed)
{
    $target_dir = "thumbnail/";
    $res = ['rtn' => false, 'path' => ''];
    if (strpos($passed['type'], 'image/') !== false) {
        $ext = explode('.', $passed['name']);
        $ext = strtolower(end($ext));
        $moving_path = $target_dir . basename($passed["name"]);
        if (move_uploaded_file($passed["tmp_name"], $moving_path)) {
            $res['rtn'] = true;
            $res['path'] = $moving_path;
        } else {
            $res['rtn'] = false;
        }
    } else {
        $res['rtn'] = false;
    }
    if($res['rtn']==true){
        echo "geting the thumbnail";
    }
    return $res;
}
