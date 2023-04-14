<?php
include "./model/model.php";

function updateUserInfo($data)
{
    $connection = db_conn();

    $updateQuery = "UPDATE users SET name=:name, email=:email, password=:password, profilepicpath=:profilepicpath WHERE username=:username";
    try {
        $stmt = $connection->prepare($updateQuery);
        $stmt->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'profilepicpath' => $data['profilepicpath'],
            'username' => $data['username']
        ]);
    } catch (PDOException $e) {

        echo $e->getMessage();
    }
    return true;
}

function getUser($username){
    $conn = db_conn();
    $query = "SELECT * FROM users WHERE username=?";
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute([$username]);
    } catch (PDOException $e) {

        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}
