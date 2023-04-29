<?php
include_once "../../controller/podcastLoder.php";

if (isset($_GET['action']) && isset($_GET['p_id'])) {
    if ($_GET['action'] == 'update') {

        echo "Geting update request";
        $the_post_id =  $_GET['p_id'];
        $query = "SELECT * FROM podcasts WHERE podcast_id= $the_post_id";
        $rs_result = customeQuery($query);

        foreach ($rs_result as $data) {
            $post_title = $row['title'];
            $post_cat_id = $row['description'];

            $post_image = $row['image'];
        }
    } else if ($_GET['action'] == 'delete') {
        $deleted_id = $_GET['p_id'];
        // echo "Geting delete request" . $deleted_id . "";

        // if (customeQuery_NONRETURN("DELETE FROM podcasts WHERE podcast_id = {$deleted_id} ")) {

        header("Location: ../../dashboard.php?source=edit_post");
        // }
    }
}


?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter description"></textarea>
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