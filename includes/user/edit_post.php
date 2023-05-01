<h3>Uploaded</h3>
<?php
include_once("./controller/podcastLoder.php");

// if (isset($_GET['delete'])) {
//     $deleted_id = $_GET['delete'];
//     // echo "Geting delete request" .$_get['delete']."";

//     // if (customeQuery_NONRETURN("DELETE FROM podcasts WHERE podcast_id = {$deleted_id} ")) {

//     //     header("Location: dashboard.php?source=edit_post");
//     // }
// }


?>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Title</th>
            <th>Thumbnail</th>
            <th>Date</th>
            <!-- <th>Action</th> -->
        </tr>
    </thead>
    <tbody>

        <?php
        $all_uplods = customeQuery("SELECT * FROM podcasts where user_id=" . $_SESSION['data']['user_id'] . "");
        // var_dump($all_uplods);

        for ($i = 0; $i < count($all_uplods); $i++) {
            $row = $all_uplods[$i];
            $post_id = $row['podcast_id'];
            $post_title = $row['title'];
            $post_thumb = $row['image'];
            $post_date = $row['date'];

            echo "<tr>";
            echo "<td>$post_title</td>";
            echo "<td><img width='100' src='$post_thumb' alt='$post_title'></td>";
            echo "<td>$post_date</td>";


            // echo "<td><a href='post_action.php?action=update&p_id=$post_id'>Edit</a></td>";
            // echo "<td><a href='post_action.php?action=delete&p_id=$post_id'>Delete</a></td>";
            // echo '<td><button type="submit" name="edit_btn" class="btn btn-outline-warning">Edit</button</td>';
            // echo '<td><button type="submit" name="delete_btn" class="btn btn-outline-danger">Delete</button></td>';
            echo "</tr>";
        }
        ?>
    </tbody>
</table>