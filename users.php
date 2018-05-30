<?php

include 'search.php';
?>	


<h1>User Information</h1>

<div class = "user">
	<?php

	$user = mysqli_real_escape_string($conn, $_GET['user']);
	$sql = "SELECT * FROM users WHERE user_username='$user'";
	$result = mysqli_query($conn, $sql);
	$queryResults = mysqli_num_rows($result);
	if ($queryResults > 0)
	{
		while ($row = mysqli_fetch_assoc($result))
		{
		echo "<div class='user-box'><h3>".$row['user_username']."</h3></div>";
		}
	}

	?>
</div>