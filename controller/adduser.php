<?php
include "./model/model.php";

// function to add new user to the db

function addUser($data)
{
    $connection = db_conn();
    $insertUsers = "INSERT into users (username, password, email, name, profilepicpath)
VALUES (:username, :password, :email, :name, :profilepicpath)";
    try {
        $stmt = $connection->prepare($insertUsers);
        $stmt->execute([
            ':username' => $data['username'],
            ':password' => $data['password'],
            ':email' => $data['email'],
            ':name' => $data['name'],
            ':profilepicpath'=>$data['profilepicpath'],
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $connection = null;
    return true;
}
