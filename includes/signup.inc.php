<?php

require 'db_connector.inc.php';

if (isset($_POST['signup-submit'])) {

	$username = $_POST['uid'];
	$email = $_POST['mail'];
	$password = $_POST['pwd'];
	$confirm_password = $_POST['pwd-repeat'];

	// Check if username is taken
	$stmt = $conn->prepare("SELECT * FROM users WHERE uidUsers=?");
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$result = $stmt->get_result();
	if ($result->num_rows > 0) {
		echo "Username is already taken";
		exit();
	}

	// Check if email is taken
	$stmt = $conn->prepare("SELECT * FROM users WHERE emailUsers=?");
	$stmt->bind_param("s", $email);
	$stmt->execute();
	$result = $stmt->get_result();
	if ($result->num_rows > 0) {
		echo "Email is already taken";
		exit();
	}

	// Check if password and confirm password match
	if ($password != $confirm_password) {
		echo "Password and confirm password do not match";
		exit();
	}

	// Hash password
	$password_hashed = password_hash($password, PASSWORD_DEFAULT);

	// Insert user into database
	$stmt = $conn->prepare("INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $username, $email, $password_hashed);
	if ($stmt->execute() === TRUE) {
		echo "Signup successful";
	} else {
		echo "Error: " . $stmt->error;
	}

	$conn->close();
	header('Location: ../index.php');
}