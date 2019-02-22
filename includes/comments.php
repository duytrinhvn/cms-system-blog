                <!-- Blog Comments -->

                <!-- Comments Form -->
                <?php 
                if(isset($_POST['submit_comment'])){
                    $comment_content = $_POST['comment_content'];
                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_post_id = $_GET['p_id'];

                    $query_add_comment = "INSERT INTO comments(`comment_post_id`,`comment_status`, `comment_author`, `comment_email`, `comment_content`, `comment_date`) VALUES ({$comment_post_id}, 'unapproved', '{$comment_author}', '{$comment_email}', '{$comment_content}', now())";
                    $result_add_comment=mysqli_query($connection, $query_add_comment);
                    query_result_check($result_add_comment);

                    $query_comment_count = "UPDATE posts SET `post_comment_count` = `post_comment_count`+1 WHERE `post_id`={$comment_post_id}";
                    $result_comment_count = mysqli_query($connection, $query_comment_count);
                }
                ?>
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <input name="comment_author" type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input name="comment_email" type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Comment" name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button name="submit_comment" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php 
                $query_select_comments = "SELECT * FROM comments WHERE `comment_post_id` = {$_GET['p_id']} AND `comment_status` = 'approved' ORDER BY `comment_id` DESC ";
                $result_select_comments = mysqli_query($connection, $query_select_comments);
                query_result_check($result_select_comments);
                while ($row = mysqli_fetch_assoc($result_select_comments)) {
                    $comment_content = $row['comment_content'];
                    $comment_date = $row['comment_date'];
                    $comment_author = $row['comment_author'];
                ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                        <div class="media-body">
                            <h4 class="media-heading">
                            <?php 
                            echo $comment_author;
                            echo "<small> {$comment_date}</small>";
                            echo "</h4>";
                            echo $comment_content;
                            ?>
                    </div>
                </div>
                <?php }?>

            