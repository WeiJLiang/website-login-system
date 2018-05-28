<?php
	include_once 'header.php';
?>
	<section class="main-container">
		<div class="main-wrapper">
			<h2>Home</h2>
			<?php

		
				if (isset($_SESSION['u_id']))
				{
					echo "You have sucessfully logged in! Hi, my name is Wei. This is my first website and the purpose of this website is to allow users to play games with their friends across the world. A user must login to their own account to post and chat with others.";
				}
			
			?>
		</div>
	</section>

<?php
	include_once 'footer.php';
?>


