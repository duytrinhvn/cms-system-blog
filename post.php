<?php 
include "includes/header.php";
include "includes/navigation.php"; 
include_once 'admin/functions.php';
?>
            
<!-- Page Content -->
    <div class="container">
        
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php 
                if(isset($_GET['p_id'])){
                    $post_id = $_GET['p_id'];
                    $result_select_post = select_elements('posts', 'post_id', $post_id);
                    $selected_post = mysqli_fetch_assoc($result_select_post);

                    $post_title = $selected_post["post_title"];
                    $post_author = $selected_post["post_author"];
                    $post_user = $selected_post["post_user"];
                    $post_date = $selected_post["post_date"];
                    $post_image = $selected_post["post_image"];
                    $post_content = $selected_post["post_content"];
                    $post_tags = $selected_post["post_tags"];
                    $post_comment_count = $selected_post["post_comment_count"];

                    //Blog Post
                    echo "<h2>{$post_title}</h2>";
                    echo "<p class='lead'>";
                    echo "by <a href='index.php'>{$post_author}</a>";
                    echo "</p>";
                    echo "<p><span class='glyphicon glyphicon-time'></span>{$post_date}</p>";
                    echo "<hr>";
                    echo "<img width='300px' height='100px' class='img-responsive' src='images/{$post_image}' alt=''>";
                    echo "<hr>";
                    echo "<p>{$post_content}</p>";
                }
                ?>
                

                <hr>
            </div>
<?php
include "includes/sidebar.php";
include "includes/comments.php";
include "includes/footer.php";
?>