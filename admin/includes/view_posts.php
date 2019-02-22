<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Author</th>
			<th>Title</th>
			<th>Category</th>
			<th>Status</th>
			<th>Image</th>
			<th>Tags</th>
			<th>Comment Count</th>
			<th>Date</th>
		</tr>
	</thead>

	<tbody>
		<?php
		global $connection;
		$query_select_posts = "SELECT * FROM posts";
		$result_select_posts = mysqli_query($connection, $query_select_posts);
		while( $row = mysqli_fetch_assoc($result_select_posts) ){
			$post_id = $row['post_id'];
			$post_cat = $row['post_cat'];
			$post_author = $row['post_author'];
			$post_title = $row['post_title'];
			$post_status = $row['post_status'];
			$post_image = $row['post_image'];
			$post_tags = $row['post_tags'];
			$post_date = $row['post_date'];
			$post_comment_count = $row['post_comment_count'];

			echo "<tr>";

			echo "<td>{$post_id}</td>";
			echo "<td>{$post_author}</td>";
			echo "<td>{$post_title}</td>";

			$result_selected_cat = select_elements('categories','cat_id', $post_cat);
			$selected_cat = mysqli_fetch_assoc($result_selected_cat);
			
			echo "<td>{$selected_cat['cat_title']}</td>";
			echo "<td>{$post_status}</td>";
			echo "<td><img height='100px' width='100px' class='img-responsive' src='../images/$post_image' alt='image'></td>";
			echo "<td>{$post_tags}</td>";
			echo "<td>{$post_comment_count}</td>";
			echo "<td>{$post_date}</td>";
			echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
			echo "<td><a href='posts.php?edit={$post_id}&source=edit_post'>Edit</a></td>";

			echo "</tr>";

		}
		?>

		<?php 
		if(isset($_GET['delete'])){
			delete_function('posts', 'post_id', $_GET['delete'], 'posts.php');
		}
		?>
	</tbody>
</table>