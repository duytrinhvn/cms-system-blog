<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Author</th>
			<th>Comment</th>
			<th>Email</th>
			<th>Status</th>
			<th>In Response to</th>
			<th>Date</th>
		</tr>
	</thead>

	<tbody>
		<?php
		global $connection;
		$query_select_comments = "SELECT * FROM comments";
		$result_select_comments = mysqli_query($connection, $query_select_comments);
		while( $row = mysqli_fetch_assoc($result_select_comments) ){
			$comment_id = $row['comment_id'];
			$comment_post_id = $row['comment_post_id'];
			$comment_author = $row['comment_author'];
			$comment_content = $row['comment_content'];
			$comment_status = $row['comment_status'];
			$comment_email = $row['comment_email'];
			$comment_date = $row['comment_date'];

			echo "<tr>";

			echo "<td>{$comment_id}</td>";
			echo "<td>{$comment_author}</td>";
			echo "<td>{$comment_content}</td>";

			// $result_selected_cat = select_elements('categories','cat_id', $post_cat);
			// $selected_cat = mysqli_fetch_assoc($result_selected_cat);
			
			echo "<td>{$comment_email}</td>";
			echo "<td>{$comment_status}</td>";

			$result_select_element = select_elements('posts', 'post_id', $comment_post_id);
			$selected_row = mysqli_fetch_assoc($result_select_element);
			$post_title = $selected_row['post_title'];
			echo "<td><a href='../post.php?p_id={$comment_post_id}' target='_blank'>{$selected_row['post_title']}</a></td>";

			echo "<td>{$comment_date}</td>";
			echo "<td><a href='comments.php?c_app={$comment_id}'>Approve</a></td>";
			echo "<td><a href='comments.php?c_unapp={$comment_id}'>Unapprove</a></td>";
			echo "<td><a href='comments.php?c_delete={$comment_id}'>Delete</a></td>";

			echo "<td><a href='comments.php?c_edit={$comment_id}'>Edit</a></td>";

			echo "</tr>";

		}
		?>
	</tbody>
</table>

<?php 

if(isset($_GET['c_delete'])){
	$result_find_row=select_elements('comments', 'comment_id', $_GET['c_delete']);
	$selected_row = mysqli_fetch_assoc($result_find_row);
	$post_id = $selected_row['comment_post_id'];
	$query_comment_count_dec = "UPDATE posts SET `post_comment_count` = `post_comment_count`-1 WHERE `post_id` = {$post_id}";
	$result_comment_count_dec = mysqli_query($connection, $query_comment_count_dec);
	query_result_check($result_comment_count_dec);
	
	delete_function('comments', 'comment_id', $_GET['c_delete'], 'comments.php');

} 

if(isset($_GET['c_app'])){
	$comment_id = $_GET['c_app'];
	update_function('comments', 'comment_status', 'comment_id', $_GET['c_app'], 'approved', 'comments.php');
}

if(isset($_GET['c_unapp'])){
	update_function('comments', 'comment_status', 'comment_id', $_GET['c_unapp'], 'unapproved', 'comments.php');
}

if(isset($_GET['c_edit'])){
	$result_select_comment = select_elements('comments', 'comment_id', $_GET['c_edit']);
	$row = mysqli_fetch_assoc($result_select_comment);
	$author = $row['comment_author'];
	$comment = $row['comment_content'];
	$email = $row['comment_email'];
	$status = $row['comment_status'];
	$response_to = $post_title;
	$date = $row['comment_date'];
	$update_form_str = <<<EOT
<form action='' method='post' enctype='multipart/form-data'>
	<p><strong>Edit</strong></p>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>Id</th>
				<th>Author</th>
				<th>Comment</th>
				<th>Email</th>
				<th>Status</th>
				<th>In Response to</th>
				<th>Date</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td>{$_GET['c_edit']}</td>
				<td><input type='text' name='edit_author' value='{$author}'></td>
				<td><input type='text' name='edit_comment' value='{$comment}'></td>
				<td><input type='text' name='edit_email' value='{$email}'></td>
				<td>$status</td>
				<td>{$response_to}</td>
				<td><input type='text' name='edit_date' value='{$date}'></td>
			</tr>
		</tbody>
	</table> 
	<input type='submit' name='edit_submit' value='Edit comment' class='btn btn-primary'>
</form>
EOT;

echo $update_form_str;
}

if(isset($_POST['edit_submit'])){
	$edit_author = $_POST['edit_author'];
	$edit_comment = $_POST['edit_comment'];
	$edit_email = $_POST['edit_email'];
	$edit_date = $_POST['edit_date'];
	$edit_id = $_GET['c_edit'];

	$query_update_comment = "UPDATE comments SET `comment_author` = '{$edit_author}', `comment_content` = '{$edit_comment}', `comment_email` = '{$edit_email}', `comment_date` = '{$edit_date}' WHERE `comment_id` = $edit_id";
	$result_update_comment = mysqli_query($connection, $query_update_comment);
	header('LOCATION: comments.php');
}
?>
