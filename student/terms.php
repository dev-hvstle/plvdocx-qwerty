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
		flex-direction: column;
		background-repeat: no-repeat;
		background-size: cover;
    	background-position: center;
		overflow: hidden;
	}

	form {
		position: absolute;
		width: 100vh;
		height: 65vh;
		border: 2px solid #ccc;
		padding: 30px;
		background: #fff;
		border-radius: 3px;
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

    .terms{
        padding-top: 5vh;
        padding-left: 5vh;
        padding-right: 5vh;
        padding-bottom: 5vh;
    }

	</style>
</head>
<body class="particles" id="particles-js">
     <form action="code.php" method="post">
	 <div class="plvicon">
	 	<img src="image/plvdocxicon.png" height= "10vh" class="plvMoto"   alt="">
     	
	 </div>
     	<?php
           // if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
            //	echo '<h2 class="bg.danger text-black"> '.$_SESSION['status'].' </h2>';
              //  unset($_SESSION['status']);
            //}
        ?>
     	
        <div class="terms">
            <h3>Privacy and terms</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim veniam recusandae nostrum itaque vero, totam, numquam quas non omnis inventore reprehenderit cumque? Recusandae, cum obcaecati. Ex, quia. Non, cumque repellat? Adipisci eligendi, nobis accusamus, voluptate impedit nam culpa debitis, id consequatur mollitia quo ipsum! Ut ipsa inventore est sed quos modi ab? Id, asperiores. Provident earum iste eum nisi at.</p>
         
            <h3>Privacy and terms</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim veniam recusandae nostrum itaque vero, totam, numquam quas non omnis inventore reprehenderit cumque? Recusandae, cum obcaecati. Ex, quia. Non, cumque repellat? Adipisci eligendi, nobis accusamus, voluptate impedit nam culpa debitis, id consequatur mollitia quo ipsum! Ut ipsa inventore est sed quos modi ab? Id, asperiores. Provident earum iste eum nisi at.</p>
         
        </div>

     	<button type="submit" name="login_btn" class="btnLogin">Accept</button>

		<a href="register.php"><button type="submit" name="signup_btn" class="btnSignUp">Cancel</button></a>
     </form>
</body>

		<script type="text/javascript" src="js/particles.js"></script>
        <script type="text/javascript" src="js/apps.js"></script>

</html>