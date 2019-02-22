<?php
	if(isset($_POST['submit_add_user'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$role = $_POST['role'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$info_checker = True;
		$result_check_info = select_all('users');
		while($row = mysqli_fetch_assoc($result_check_info)){
			if($username===$row['username']){
				$info_checker = False;
				echo 'This username is already used'."<br>";
			} 
			if($email===$row['user_email']){
				$info_checker = False;
				echo 'This email is already used'."<br>";				
			}
			if($password===$row['user_password']){
				$info_checker = False;
				echo 'This password is already used'."<br>";				
			}
		}
		if($info_checker==True){
			$query_add_user = "INSERT INTO users(`user_firstname`, `user_lastname`, `user_role`, `username`, `user_email`, `user_password`) VALUES ('{$firstname}', '{$lastname}', '{$role}', '{$username}', '{$email}', '{$password}')";
			$result_add_user = mysqli_query($connection, $query_add_user);
			query_result_check($result_add_user);
			if($result_add_user){echo 'New user successfully added';}
		}
	}
?>

<h2>Add User</h2>
<br>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="firstname">Firstname</label>
		<input type="text" class="form-control" name="firstname">
	</div>
	<br>

	<div class="form-group">
		<label for="lastname">Lastname</label>
		<input type="text" class="form-control" name="lastname">
	</div>
	<br>

	<div class="form-group">
		<label for="role">Role</label>
		<select name="role">
			<option value="user">User</option>
			<option value="admin">Admin</option>
		</select>
	</div>
	<br>

	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" class="form-control" name="username">
	</div>
	<br>

	<div class="form-group">
		<label for="email">Email</label>
		<input type="text" class="form-control" name="email">
	</div>
	<br>

	<div class="form-group">
		<label for="password">Password</label>
		<input type="text" class="form-control" name="password">
	</div>
	<br>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="submit_add_user">
	</div>
</form>