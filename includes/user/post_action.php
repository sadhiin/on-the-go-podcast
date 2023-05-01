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


if (isset($_GET['action']) && isset($_GET['p_id'])) {
    if ($_GET['action'] == 'update') {
        $the_post_id =  $_GET['p_id'];
        $query = "SELECT * FROM podcasts WHERE podcast_id = $the_post_id";
        $result = customeQuery($query);
        // echo "re_resutl-->";
        // var_dump($result);

        foreach ($result as $data) {

            $post_title = $data['title'];
            $post_desc = $data['description'];

            $post_image = $data['image'];
        }
    } else if ($_GET['action'] == 'delete') {
        $deleted_id = $_GET['p_id'];
        echo "Geting delete request" . $deleted_id . "";

        if (customeQuery_NONRETURN("DELETE FROM podcasts WHERE podcast_id = {$deleted_id} ")) {

            header("Location: ../../dashboard.php?source=edit_post");
        }
    }
}


if (isset($_POST['update'])) {
    echo "geting update request";
}

?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" <?php echo (isset($post_title) ? $post_title : ""); ?>>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter description" <?php echo (isset($post_desc) ? $post_desc : ""); ?>></textarea>
    </div>
    <div class="mb-3">
        <label for="audio" class="form-label">Audio file</label>
        <input class="form-control" type="file" id="audio_file" name="audio_file">
    </div>
    <div class="mb-3">
        <label for="thumbnail" class="form-label">Audio thumbnail</label>
        <input class="form-control" type="file" name="thumbnail" id="thumbnail">
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>