<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" href="css/style-login.css">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel = "icon" 
        href ="image/plvdocxicon.png" 
        type = "image/x-icon">

	<?php
		//include('security.php');
		//include('security.php');
		include('security_login.php');
	?>
	 <link rel = "icon" 
        href ="img/plvdocxicon.png" 
        type = "image/x-icon">

	<style>

body {
		background-image: url(img/background.jpg);
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

	.plvicon{
		position: relative;
		left: 40%;
		display: flex;
		justify-content: center;
		align-items: center;
		height: 10vh;
		flex-direction: column;	
	}

	button {
	float: right;
	background: #222d31;
	padding: 10px 15px;
	color: #fff;
	border-radius: 2px;
	margin-right: 10px;
	border: none;

	}
	button:hover{
		opacity: .7;
	}

	h2{
		color: #222d31;
	}


	</style>
</head>
<body class="particles" id="particles-js">
     <form action="code.php" method="post" class="formBody">
	 <div class="plvicon">
	 	<img src="image/plvdocxicon.png" height= "10vh" class="plvMoto"   alt="">
     	<h2>Log In</h2>
		<h2>
		</h2>
	 </div>
     	<label>Username</label>
     	<input type="username" name="username" placeholder="Username"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit" name="login_btn" class="btnLogin">Login</button>

		<button type="submit" name="signup_btn" class="btnSignUp">SignUp</button>
     </form>
</body>

		<script type="text/javascript" src="js/particles.js"></script>
        <script type="text/javascript" src="js/apps.js"></script>

</html>