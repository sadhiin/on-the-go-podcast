<?php
include "db.php";

    $connection = db_conn();

    if($connection){
        echo "We are connected....";
    }
    else{
        die("error in db connection");
    }

?>