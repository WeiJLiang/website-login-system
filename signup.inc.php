<?php

if (isset($_POST ['submit']))
{

	include_once 'dbh.inc.php';

	$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	// Error handlers
	//check for for empty fields
	if (empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($password))
	{
		header("Location: ../signup.php?signup=EMPTY!");
		exit();

	}
	else
	{	// check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname))
		{
		header("Location: ../signup.php?signup=INVALID_NAME");
		exit();
		}
		else
		{//check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
			header("Location: ../signup.php?signup=INVALID_EMAIL");
			exit();
			}
			else
			{
				$sql ="SELECT * FROM users WHERE user_username='$username'";
				$result = mysqli_query($conn, $sql);
				$resultCheck =mysqli_num_rows($result);

				if ($resultCheck > 0)
				{
				header("Location: ../signup.php?signup=USERNAME_TAKEN");
				exit();

				}
				else
				{// Hashing the password
				$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
				//Inser the user into the database
				$sql = "INSERT INTO users (user_firstname, user_lastname, user_email, user_username, user_password) 
				VALUES ('$firstname', '$lastname','$email', '$username', '$hashedPassword');";

				mysqli_query($conn, $sql);

				header("Location: ../signup.php?signup=SUCCESSFUL");
				exit();

				}
			}
		}
		
	}
	
}
else 
{
	header("Location: ../signup.php");
	exit();
}

?>