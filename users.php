<?php

include 'search.php';

?>	

<p>User Information</p>

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
		echo "<div class='user-box'><h2>".$row['user_username']."</h2></div>";
		}
	}

	?>
</div>