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
		background-image: url(image/studentBackground.jpg);
		display: flex;
		justify-content: center;
		align-items: center;
		height: 100vh;
		background-repeat: no-repeat;
		background-size: cover;
    	background-position: center;
		overflow: hidden;
	}

	form {
		position: absolute;
		width: 50vh;
		border: 2px solid #ccc;
		padding: 30px;
		background: #fff;
		border-radius: 15px;
	}

	input {
		display: block;
		border: 2px solid #ccc;
		width: 95%;
		height: 10%;
		padding: 5px;
		font-size: 2vh;
		border-radius: 2px;
		margin-top:3%;
		margin-bottom:3%;
	}

	label {
		color: #888;
		font-size: 18px;
		padding: 10px;
	}

	.plvicon{
		position: relative;
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
	}

	.plvicon h2{
		font-size: 2vh;
	}

	.plvMoto{
		height: 10vh;
	}

	.btnLogin {
		float: right;
		background: #3cc3bd;
		padding: 10px 15px;
		color: #fff;
		border-radius: 0px;
		margin-right: 10px;
		border: solid 2px #3cc3bd;
	}

	.btnLogin:hover{
		float: right;
		background: #fff;
		padding: 10px 15px;
		color: #000;
		border-radius: 0px;
		margin-right: 10px;
		border: solid 2px #3cc3bd;
		transition: all 0.9s ease;
	}


	.btnSignUp {

		float: right;
		background: #fff;
		padding: 10px 15px;
		color: #000;
		border-radius: 0px;
		margin-right: 10px;
		border: solid 2px #3cc3bd;
		
	}

	.btnSignUp:hover{
		float: right;
		background: #3cc3bd;
		padding: 10px 15px;
		color: #fff;
		border-radius: 0px;
		margin-right: 10px;
		border: solid 2px #3cc3bd;
		transition: all 0.9s ease;
	}
	
	@media screen and (max-width:500px) {
		form {
			position: absolute;
			width: 20vh;
			border: 2px solid #ccc;
			padding: 30px;
			background: #fff;
			border-radius: 15px;
		}

		body{
			height: 120vh;
		}
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