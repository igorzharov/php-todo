<?php

session_start();
require_once 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$check_user = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username' AND `password` = '$password'");
if (mysqli_num_rows($check_user) > 0) {

	$user = mysqli_fetch_assoc($check_user);

	$_SESSION['user'] = [
		"id" => $user['id'],
		"username" => $user['username'],
		"password" => $user['password']
	];



	die ('success');
	
} else {

	die ('no-success');
}

?>