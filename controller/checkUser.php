<?php
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

if (isset($_REQUEST['query'])) {
    $str = $_REQUEST['query'];
    $result = customeQuery("SELECT * FROM users");

    foreach ($result as $row) {
        if ($str == $row['username']) {
            echo "Username already taken";
            break;
        } else {
            echo "Username Available";
            break;
        }
    }
}

if (isset($_REQUEST['email'])) {
    $str = $_REQUEST['email'];
    $result = customeQuery("SELECT * FROM users Where email=$str");
    if (count($result) > 0) {
        echo "Email already used";
    } else {
        echo "Username Available";
    }
}
