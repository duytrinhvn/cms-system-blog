<?php 
	$edit_post_id = $_GET['edit'];
	$query_select_edit_post = "SELECT * FROM posts WHERE post_id = {$edit_post_id}";
	$result_select_edit_post = mysqli_query($connection, $query_select_edit_post);
	$row=mysqli_fetch_assoc($result_select_edit_post);

	// 
	if( isset($_POST['edit_submit']) ){
		$edit_title = htmlspecialchars($_POST['edit_title']);
		$edit_author = htmlspecialchars($_POST['edit_author']);
		$edit_cat = htmlspecialchars($_POST['edit_cat']);

		$edit_image = $_FILES['edit_post_image']['name'];
		$edit_image_temp = $_FILES['edit_post_image']['tmp_name'];

		$edit_status = htmlspecialchars($_POST['edit_status']);
		$edit_tags = htmlspecialchars($_POST['edit_tags']);
		$edit_content = htmlspecialchars($_POST['edit_contents']);

		move_uploaded_file($edit_image_temp, "../images/{$edit_image}");

		$query_edit_post = "UPDATE posts SET post_title = '{$edit_title}', post_author = '{$edit_author}', post_cat = '{$edit_cat}', post_image = '{$edit_image}', post_status = '{$edit_status}', post_tags = '{$edit_tags}', post_content = '{$edit_content}' WHERE post_id = {$edit_post_id}" ;

		$result_edit_post = mysqli_query($connection, $query_edit_post);
		if($result_edit_post) header('LOCATION: posts.php');
		else{
			die(mysqli_error($connection));
		}
	}
?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Post Title</label>
		<input value="<?php echo $row['post_title']; ?>" type="text" class="form-control" name="edit_title">
	</div>
	<br>

	<div class="form-group">
		<label for="author">Author</label>
		<input value="<?php echo $row['post_author']; ?>" type="text" class="form-control" name="edit_author">
	</div>
	<br>

	<div class="form-group">
		<label for="cat">Category</label>
		<select name="edit_cat">
			<?php 
			$result_select_cats = select_all('categories');
			while($cats = mysqli_fetch_assoc($result_select_cats)){
				echo "<option value=\"{$cats['cat_id']}\">{$cats['cat_title']}</option>";
			}
			?>
		</select>
	</div>
	<br> 

	<div class="form-group">
		<label for="image">Post Image</label>
		<br>
		<img height="100px" width="100px" class="img-responsive" src="../images/<?php echo $row['post_image']; ?>" alt="Image">
		<br>
		<input type="file" class="form-control" name="edit_post_image">
	</div>
	<br>

	<div class="form-group">
		<label for="status">Post Status</label>
		<input value="<?php echo $row['post_status']; ?>" type="text" class="form-control" name="edit_status">
	</div>
	<br>

	<div class="form-group">
		<label for="tags">Post Tags</label>
		<input value="<?php echo $row['post_tags']; ?>" type="text" class="form-control" name="edit_tags">
	</div>
	<br>

	<div class="form-group">
		<label for="contents">Post Contents</label>
		<textarea class="form-control" name="edit_contents" cols="30" rows="10"> <?php echo $row['post_content']; ?> </textarea>
	</div>
	<br>

	<div class="form-group">
		<input type="submit" class="btn btn-primary form-control" name="edit_submit" value="Edit">
	</div>
</form>
