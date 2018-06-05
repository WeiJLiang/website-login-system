<?php
	
	include 'dbh.inc.php';
	



?>


<style>
body {
    background-color: #96999D;
}

h1,h2,h3, a {
    color: black;
    text-align: center;
    padding-top: 50px;
}

p {
    font-family: arial;
    font-size:  40px;
    color: #111;
    line-height: 50px;
    text-align: center;
}

</style>
<h1>Search page</h1>


<div >
	<?php
		if (isset($_POST['submit-search']))
		{
			$search = mysqli_real_escape_string($conn, $_POST['search']);
			$sql ="SELECT * FROM users WHERE user_username LIKE '%$search%'";
			$result = mysqli_query($conn, $sql);
			$queryResult = mysqli_num_rows($result);

			echo "<h3>There are ".$queryResult." results!</h3>";
			if ($queryResult > 0)
			{
				while ($row = mysqli_fetch_assoc($result))
				{
					echo "<a href='users.php?user=".$row['user_username']."'>
					<br><div class='users-box>'<ol><li>".$row['user_username']." </li></ol></div></a>";
				}
			}
			
			else
			{
				echo "<h3>There are no user results matching your search!</h3>";
			}
			if (empty($search))
			{

				header("Location: ../index.php?user=EMPTY!");
				exit();
			}
		}
	?>
	
</div>


