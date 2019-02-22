<?php
	if( isset($_POST['submit_add_post']) ){
		$title = $_POST['title'];
		$author = $_POST['author'];
		$cat = $_POST['cat'];
		$image = $_FILES['post_image']['name'];
		$image_temp = $_FILES['post_image']['tmp_name'];
		$status = $_POST['status'];
		$tags = $_POST['tags'];
		$contents = htmlspecialchars($_POST['contents']);
		$post_comment_count = 0;

		move_uploaded_file($image_temp, "../images/$image");

		$query_add_post = "INSERT INTO posts(post_cat, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";
		$query_add_post .= "VALUES ('{$cat}', '{$title}', '{$author}', now(), '{$image}', '{$contents}', '{$tags}', {$post_comment_count}, '{$status}')";
		$result_add_post = mysqli_query($connection, $query_add_post);

		if($result_add_post) echo "<h1>SUCCEED</h1>";
	}
?>


<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title">
	</div>
	<br>

	<div class="form-group">
		<label for="author">Author</label>
		<input type="text" class="form-control" name="author">
	</div>
	<br>

	<div class="form-group">
		<label for="cat_id">Category</label>
		<select name="cat">
			<?php
			$result_selected_cats = select_all('categories');
			while($selected_cats=mysqli_fetch_assoc($result_selected_cats)){
				echo "<option value=\"{$selected_cats['cat_id']}\">{$selected_cats['cat_title']}</option>";
			}
			?>
		</select>
	</div>
	<br>

	<div class="form-group">
		<label for="image">Post Image</label>
		<input type="file" class="form-control" name="post_image">
	</div>
	<br>

	<div class="form-group">
		<label for="status">Post Status</label>
		<input type="text" class="form-control" name="status">
	</div>
	<br>

	<div class="form-group">
		<label for="tags">Post Tags</label>
		<input type="text" class="form-control" name="tags">
	</div>
	<br>

	<div class="form-group">
		<label for="contents">Post Contents</label>
		<textarea class="form-control" name="contents" cols="30" rows="10"></textarea>
	</div>
	<br>

	<div class="form-group">
		<input type="submit" class="btn btn-primary form-control" name="submit_add_post" value="Submit">
	</div>
</form>