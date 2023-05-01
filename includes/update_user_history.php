<?php
session_start();
function db_conn()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "onthego";

    try {
        $conn = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname . ';charset=utf8', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        // var_dump($conn) ;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $conn;
}

function user_history($user_id, $podcast_id)
{
    // Add audio play/pause status to user history
    $conn = db_conn();
    $insert_query = "INSERT INTO history (user_id, podcast_id) VALUES (?, ?)";
    try {
        $stmt = $conn->prepare($insert_query);
        $stmt->execute([$user_id, $podcast_id]);
        $conn = null;
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        // die("Error in storing user history");
        $conn = null;
        return false;
    }
}


if (isset($_SESSION['data']['username'])) {
    if (isset($_REQUEST['audio_id'])) {
        $podcast_id = $_REQUEST['audio_id'];
        $user_id = $_SESSION['data']['user_id'];
        if (!user_history($user_id, $podcast_id)) {
            echo "can't store the user history";
            // exit("can't store the user history");
        } else {
            echo "storing the podcast history";
        }
    } else {
        echo "Not getting the request";
    }
}
