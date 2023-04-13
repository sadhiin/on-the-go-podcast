<?php
    include "db.php";

    $connection = db_conn();

    if(!$connection){
        die("error in db connection");
    }


