<!-- // bring the user history here -->
<h3>History</h3>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Audio</th>
            <th>Title</th>
            <th>Delete</th>
            <!-- <th>Category</th>
            <th>Status</th>
            <th>Images</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th> -->
        </tr>
    </thead>
    <tbody>

        <?php
        // $query = "SELECT * FROM posts";
        // $select_posts  = mysqli_query($dbconnection, $query);
        // while ($row = mysqli_fetch_assoc($select_posts)) {
        //     $post_id = $row['post_id'];
        //     $post_author = $row['post_author'];
        //     $post_title = $row['post_title'];
        //     $post_cat_id = $row['post_category_id'];
        //     $post_status = $row['post_status'];
        //     $post_image = $row['post_img'];
        //     $post_tags = $row['post_tags'];
        //     $post_comments_cnt = $row['post_comment_count'];
        //     $post_date = $row['post_date'];

        //     echo "<tr>";
        //     echo "<td>$post_id</td>";
        //     echo "<td>$post_author</td>";
        //     echo "<td>$post_title</td>";

        //     $query = "SELECT * FROM categories WHERE cat_id = $post_cat_id";
        //     $select_categories_id = mysqli_query($dbconnection, $query);
        //     $cat_title = "";
        //     confirmQuary($select_categories_id);
        //     while ($row = mysqli_fetch_assoc($select_categories_id)) {
        //         $cat_id = $row['cat_id'];
        //         $cat_title = $row['cat_title'];
        //     }
        //     echo "<td>$cat_title</td>";

        //     echo "<td>$post_status</td>";
        //     echo "<td><img width='100' src='../images/$post_image' alt='$post_image'></td>";
        //     echo "<td>$post_tags</td>";
        //     echo "<td>$post_comments_cnt</td>";
        //     echo "<td>$post_date</td>";

        //     echo "<td><a href='./posts.php?source=edit_post&p_id=$post_id'>Edit</a></td>";
        //     echo "<td><a href='./posts.php?delete=$post_id'>Delete</a></td>";
        //     echo "</tr>";
        // }
        // ?>

    </tbody>
</table>