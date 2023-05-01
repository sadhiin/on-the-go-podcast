<!-- // bring the user history here -->
<h3>History</h3>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Thumbnail</th>
            <th>Title</th>
            <th>Delete</th>

        </tr>
    </thead>
    <tbody>

        <?php

        include "./controller/podcast.php";
        $user_id = $_SESSION['data']['user_id'];
        $historys = get_user_history($user_id);

        // var_dump($historys);

        foreach ($historys as $history) {
            $podcast_id = $history['podcast_id'];
            $podcast_thumbnail = $history['image'];
            $podcast_title = $history['title'];
            $podcast_path = $history['post_path'];
            echo "<tr>";
            echo "<td><img width='100' src='$podcast_thumbnail' alt='$podcast_title'></td>";
            echo "<td>$podcast_title</td>";
            echo "<td><a href=' ?delete=$podcast_id'><button type='submit' name='delete_btn' class='btn btn-outline-danger'>Delete</button></a></td>";
        }
        ?>

    </tbody>
</table>