
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Id</th>
			<th>Username</th>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Email</th>
			<th>Role</th>
			<th>Date</th>
		</tr>
	</thead>

	<tbody>
		<?php
		$query_select_posts = "SELECT * FROM users";
		$result_select_posts = mysqli_query($connection, $query_select_posts);
		while( $row = mysqli_fetch_assoc($result_select_posts) ){
			$user_id = $row['user_id'];
			$username = $row['username'];
			$user_firstname = $row['user_firstname'];
			$user_lastname = $row['user_lastname'];
			$user_email = $row['user_email'];
			$user_role = $row['user_role'];
			$user_date = $row['user_date'];

			echo "<tr>";

			echo "<td>{$user_id}</td>";
			echo "<td>{$username}</td>";
			echo "<td>{$user_firstname}</td>";
			echo "<td>{$user_lastname}</td>";
			// echo "<td><img height='100px' width='100px' class='img-responsive' src='../images/$post_image' alt='image'></td>";
			echo "<td>{$user_email}</td>";
			echo "<td>{$user_role}</td>";
			echo "<td>{$user_date}</td>";
			echo "<td><a href='users.php?u_delete={$user_id}'>Delete</a></td>";
			echo "<td><a href='users.php?u_edit={$user_id}'>Edit</a></td>";

			echo "</tr>";

		}
		?>
	</tbody>
</table>



<?php
if(isset($_GET['u_delete'])){
	delete_function('users', 'user_id', $_GET['u_delete'], 'users.php');
}

if(isset($_GET['u_edit'])){
	$result_select_user = select_elements('users', 'user_id', $_GET['u_edit']);
	$row = mysqli_fetch_assoc($result_select_user);
	$firstname = $row['user_firstname'];
	$lastname = $row['user_lastname'];
	$email = $row['user_email'];
	$username = $row['username'];
	$date = $row['user_date'];
	$role = $row['user_role'];
	$update_form_str = <<<EOT
<form action='' method='post' enctype='multipart/form-data'>
	<p><strong>Edit</strong></p>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>Id</th>
				<th>Username</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Email</th>
				<th>Role</th>
				<th>Date</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td>{$_GET['u_edit']}</td>
				<td><input type='text' name='edit_username' value='{$username}'></td>
				<td><input type='text' name='edit_firstname' value='{$firstname}'></td>
				<td><input type='text' name='edit_lastname' value='{$lastname}'></td>
				<td><input type='text' name='edit_email' value='{$email}'></td>
				<td>
					<select selected='{$role}' name='edit_role'>
						<option value='user'>User</option>
						<option value='admin'>Admin</option>
					</select>
				</td>
				<td>{$date}</td>
			</tr>
		</tbody>
	</table> 
	<input type='submit' name='edit_user_submit' value='Edit User' class='btn btn-primary'>
</form>
EOT;

	echo $update_form_str;
}

if(isset($_POST['edit_user_submit'])){
	$edit_firstname = $_POST['edit_firstname'];
	$edit_lastname = $_POST['edit_lastname'];
	$edit_email = $_POST['edit_email'];
	$edit_username = $_POST['edit_username'];
	$edit_id = $_GET['u_edit'];

	$query_update_user = "UPDATE users SET `user_firstname` = '{$edit_firstname}', `user_lastname` = '{$edit_lastname}', `user_email` = '{$edit_email}', `username` = '{$edit_username}' WHERE `user_id` = $edit_id";
	$result_update_user = mysqli_query($connection, $query_update_user);
	query_result_check($result_update_user);
	header('LOCATION: users.php');
}
?>