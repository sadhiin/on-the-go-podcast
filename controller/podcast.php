<?php
include "./model/model.php";

// function to add new user to the db

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
