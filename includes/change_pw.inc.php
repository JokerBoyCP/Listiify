<?php

require 'db_connector.inc.php';
session_start();


if (isset($_POST['change-submit'])) {
    $username = $_SESSION['username'];
    $current_password = $_POST['current-pwd'];
	$new_password = $_POST['new-pwd'];
	$confirm_password = $_POST['new-pwd-repeat'];

	// Get current user from database
	$stmt = $conn->prepare("SELECT * FROM users WHERE uidUsers=?");
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();

    $uppercase = preg_match('@[A-Z]@', $new_password);
	$lowercase = preg_match('@[a-z]@', $new_password);
	$number    = preg_match('@[0-9]@', $new_password);
	$specialChars = preg_match('@[^\w]@', $new_password);


	if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($new_password) < 8) {
	echo "<script>alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.');</script>"; ;

	 if (password_verify($current_password, $row['pwdUsers'])) {
        // Check if new password and confirm password match
        if ($new_password == $confirm_password) {
            // Hash new password
            $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);

            // Update user password in database
            $stmt = $conn->prepare("UPDATE users SET pwdUsers=? WHERE uidUsers=?");
            $stmt->bind_param("ss", $new_password_hashed, $_SESSION['username']);
            if ($stmt->execute() === TRUE) {
                echo "Password changed successfully";
            } else {
                echo "Error updating password: " . $stmt->error;
            }
        } else {
            echo "New password and confirm password do not match";
        }
    } else {
        echo "Current password is incorrect";
    }
	$conn->close();
	header('Location: ../index.php');
}