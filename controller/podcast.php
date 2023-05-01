<?php
include "./model/model.php";

function addPodCast($data)
{
    $connection = db_conn();
    $insert_podcast = "INSERT into podcasts (title, description, image, date, post_path, user_id)
VALUES (:title, :description, :image, :date, :post_path, :user_id)";
    try {
        $stmt = $connection->prepare($insert_podcast);
        $stmt->execute([
            ':title' => $data['title'],
            ':description' => $data['description'],
            ':image' => $data['image'],
            ':date' => $data['date'],
            ':post_path' => $data['post_path'],
            ':user_id' => $_SESSION['data']['user_id'],
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $connection = null;
    return true;
}

function get_user_history($user_id)
{
    $history_query = "SELECT P.podcast_id, title, image,post_path FROM podcasts AS P, history AS H WHERE H.user_id = $user_id AND P.podcast_id = H.podcast_id";
    return customeQuery($history_query);
}
