<?php

session_start();


if (isset($_POST['submit']))
{

	include 'dbh.inc.php';

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	//ERROR handlers
	//Check if inputs are empty
	if (empty($username) || empty($password))
	{
		header("Location: ../index.php?login=EMPTY!");
		exit();
	}
	else
	{
		$sql = "SELECT * FROM users WHERE user_username='$username' OR user_email='$username'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck < 1)
		{
			header("Location: ../index.php?login=error");
			exit();
		}
		else
		{
			if ($row = mysqli_fetch_assoc($result))
			{// De-hashing the password
				$hashedPasswordCheck = password_verify($password, $row['user_password']);
				if ($hashedPasswordCheck == false)
				{
					header("Location: ../index.php?login=error");
					exit();
				}
				elseif ($hashedPasswordCheck == true)
				{//Log in the user here
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_firstname'] = $row['user_firstname'];
					$_SESSION['u_lastname'] = $row['user_lastname'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_username'] = $row['user_username'];
					header("Location: ../index.php?login=SUCESSFUL");
					exit();
				}
			}
		}
	}
}
else
{
	header("Location: ../index.php?login=error");
	exit();
}
?>