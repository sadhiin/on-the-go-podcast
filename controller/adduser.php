<?php
include "./model/model.php";

// function to add new user to the db

function addUser($data)
{
    $connection = db_conn();
    $insertUsers = "INSERT into users (username, password, email, name)
VALUES (:username, :password, :email, :name)";
    try {
        $stmt = $connection->prepare($insertUsers);
        $stmt->execute([
            ':username' => $data['username'],
            ':password' => $data['password'],
            ':email' => $data['email'],
            ':name' => $data['name'],
        ]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}
