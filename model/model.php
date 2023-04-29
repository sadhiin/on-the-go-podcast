<?php
include "db.php";

$connection = db_conn();

if (!$connection) {
    die("error in db connection");
}

function customeQuery($query, $params = array())
{
    $conn = db_conn();
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute($params);

        $conn = null;
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        // die("Error in CustomeQuery function");
        return null;
    }
}
