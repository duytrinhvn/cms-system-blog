<?php
session_start();
include 'db.php';
if(isset($_POST['login_submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$username = mysqli_real_escape_string($connection, $username);
	$password = mysqli_real_escape_string($connection, $password);

	$query_find_user = "SELECT * FROM users WHERE `username` = '{$username}'";
	$result_find_user = mysqli_query($connection, $query_find_user);

	if(!$result_find_user){
		die(mysqli_error($connection));
	}

	while($row = mysqli_fetch_assoc($result_find_user) ){
		$db_user_username = $row['username'];
		$db_user_password = $row['user_password'];
		$db_user_id = $row['user_id'];
		$db_user_lastname = $row['user_lastname'];
		$db_user_firstname = $row['user_firstname'];
		$db_user_role = $row['user_role'];
		$db_user_email = $row['user_email'];
	}

	if($username == $db_user_username && $password == $db_user_password){
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['firstname'] = $db_user_firstname;
		$_SESSION['lastname'] = $db_user_lastname;
		$_SESSION['role'] = $db_user_role;
		$_SESSION['email'] = $db_user_email;
		$_SESSION['id'] = $db_user_id;

		header('LOCATION: ../admin');
	}

	else{
		header('LOCATION: ../index.php');
	}


}
?>