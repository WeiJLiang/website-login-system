<?php
	
	include 'dbh.inc.php';
	
?>

<h1>Search page</h1>

<div>
	<?php
		if (isset($_POST['submit-search']))
		{
			$search = mysqli_real_escape_string($conn, $_POST['search']);
			$sql ="SELECT * FROM users WHERE user_username LIKE '%$search%'";
			$result = mysqli_query($conn, $sql);
			$queryResult = mysqli_num_rows($result);

			echo "There are ".$queryResult." results!";
			if ($queryResult > 0)
			{
				while ($row = mysqli_fetch_assoc($result))
				{
					echo "<a href='users.php?user=".$row['user_username']."'>
					<div class='users-box>'<h3>".$row['user_username']."</h3> </div></a>";
				}
			}
			else
			{
				echo "There are no user results matching your search!";
			}
		}
	?>
	
</div>
