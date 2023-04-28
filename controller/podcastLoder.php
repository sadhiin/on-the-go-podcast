<?php
    // this file will handel the db part of the podcasthome.php file

    include "./model/model.php";

    function getAllPodcasts(){
        $conn = db_conn();
        try {
            $stmt = $conn->query("SELECT * FROM podcasts");
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

?>