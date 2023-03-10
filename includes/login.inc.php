<?php

require 'db_connector.inc.php';

if (isset($_POST['login-submit'])) {
	session_start();

	// Get form data
	$username = $_POST['username'];
	$password = $_POST['pwd'];

	// Get user from database
	$stmt = $conn->prepare("SELECT * FROM users WHERE uidUsers=?");
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows == 1) {
		// Verify password
		$row = $result->fetch_assoc();
		if (password_verify($password, $row['pwdUsers'])) {
			// Set session variable
			$_SESSION['username'] = $username;
			// Redirect to home page
			header("Location: ../index.php?login=success");
			exit();
		} else {
			echo "Invalid login credentials";
		}
	} else {
		echo "Invalid login credentials";
	}

	$conn->close();
}