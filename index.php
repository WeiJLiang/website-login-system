<?php
	include_once 'header.php';

?>


	<section class="main-container">
		<div class="main-wrapper">

			<h2>Home</h2>
			<?php

		
				if (isset($_SESSION['u_id']))
				{
					echo "<strong>Congratulation! You have sucessfully logged in! </strong>";
				}
				else 
				{
					echo "Hi, my name is Wei. This is my first website and the purpose of this website is to allow users to play games with their friends across the world. A user must login to their own account to post and chat with others. Please, click on the <strong>Sign up</strong> button to register.";
				}
			
			?>
		</div>
	</section>
<head>
    <title>Tetris</title>
	 <style >
        body {
    	text-align: center;
    	font-size: 2em;

    }
        canvas {
        border: solid .2em #fff;
        height: 90vh;
      }
    </style>
</head>

    <h2><div id="score"></div></h2>
    <canvas id="tetris" width="240" height="400" />
    <script src="tetris.js"></script>
</body>

<?php
	include_once 'footer.php';
?>


