<?php
include "./model/model.php";

// function to add new user to the db

function loginUser($data)
{
    $connection = db_conn();
    $selectQuery = "SELECT * FROM users WHERE ((username = :username OR email =:email) AND password = :password)";
    $cnt = 0;
    try {
        $stmt = $connection->prepare($selectQuery);
        $stmt->execute([
            'username' => $data['username'],
            'email' => $data['username'],
            'password' => $data['password'],
        ]);
        $cnt = $stmt->rowCount();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    if ($cnt > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $reply = [
            'cnt'    =>      $cnt,
            'row'  =>    $row,
        ];
        return $reply;
    } else {
        $reply = [
            'cnt'    =>      $cnt,
            'row'  =>    null,
        ];
        return $reply;
    }
}

