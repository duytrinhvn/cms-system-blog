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
				if(isset($_GET['c_id'])){
					$cat_id = $_GET['c_id'];
					$result_select_elements=select_elements('posts','post_cat', $cat_id);
					query_result_check($result_select_elements);
					while($selected_element = mysqli_fetch_assoc($result_select_elements)){
						$post_id = $selected_element['post_id'];
						$post_title = $selected_element["post_title"];
						$post_author = $selected_element["post_author"];
						$post_user = $selected_element["post_user"];
						$post_date = $selected_element["post_date"];
						$post_image = $selected_element["post_image"];
						$post_content = substr($selected_element["post_content"], 0, 100)."...";
						$post_tags = $selected_element["post_tags"];
						$post_comment_count = $selected_element["post_comment_count"];

						//Blog Post
						echo "<h2><a href='post.php?p_id={$post_id}'>{$post_title}</a></h2>";
						echo "<p class='lead'>";
						echo "by <a href='index.php'>{$post_author}</a>";
						echo "</p>";
						echo "<p><span class='glyphicon glyphicon-time'></span>{$post_date}</p>";
						echo "<hr>";
						echo "<img width='300px' height='100px' class='img-responsive' src='images/{$post_image}' alt=''>";
						echo "<hr>";
						echo "<p>{$post_content}</p>";
						echo "<a class='btn btn-primary' href='#''>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>";
					} 
				} 
				?>
                	

                <hr>
            </div>
<?php
include "includes/sidebar.php";
include "includes/footer.php";
?>