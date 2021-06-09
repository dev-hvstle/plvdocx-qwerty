<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" href="css/style-login.css">
	
	<?php
		include('security_login.php');
	?>
	 <link rel = "icon" 
        href ="img/plvdocxicon.png" 
        type = "image/x-icon">

	<style>

	body {
		background-image: linear-gradient(rgba(34,45,49,0.9), rgba(34,45,49,0.3)), url(img/maysan.jpg);
		display: flex;
		justify-content: center;
		align-items: center;
		height: 100vh;
		flex-direction: column;
		background-repeat: no-repeat;
		background-size: cover;
    	background-position: center;
		overflow: hidden;
	}

	form {
		position: absolute;
		width: 500px;
		border: 2px solid #ccc;
		padding: 30px;
		background: #fff;
		border-radius: 15px;
	}
	</style>
</head>
<body class="particles" id="particles-js">
     <form action="code.php" method="post">
     	<h2>LOGIN</h2>
     	<?php
            if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
            	echo '<h2 class="bg.danger text-black"> '.$_SESSION['status'].' </h2>';
                unset($_SESSION['status']);
            }
        ?>
     	<label>User Name</label>
     	<input type="username" name="username" placeholder="Please Enter Your User Name"><br>

     	<label>User Name</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit" name="login_btn">Login</button>
     </form>
</body>

		<script type="text/javascript" src="js/particles.js"></script>
        <script type="text/javascript" src="js/apps.js"></script>

</html>