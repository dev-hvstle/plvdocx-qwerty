<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" href="css/style-login.css">
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
	-webkit-appearance: none;
	margin: 0;
	}

	body {
		background-image: url(image/studentBackground.jpg);
		display: flex;
		justify-content: center;
		align-items: center;
		height: 190vh;
		flex-direction: column;
		background-repeat: no-repeat;
		background-size: cover;
    	background-position: center;
		
	}
	
	

	form {
		position: absolute;
		
		top:10vh;
		width: 60vh;
		height: 145vh;
		border: 2px solid #ccc;
		padding: 5vh;
		background: #fff;
		border-radius: 3px;
	}

	.container{
		display: flex;
		justify-content: center;
		align-items: center;
		width:40vh;
		
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

	
	

	.firstnamelbl{
		position: relative;
		top: 24%;
		
	}

	.firstnameInput{
		position: relative;
		
	}
	
	
	.passwordInput{
		position: relative;
	
	}

	.middlenameInput{
		position: relative;
		
	}

	

	.btnNext{
		position: relative;
		width: 12vh;
		background: #3cc3bd;
		margin-left:2vh;
		margin-right:2vh;
		float: right;
	}

	
	input {
		position: relative;
		border: 2px solid #ccc;
		width: 90%;
		left:1.5vh;
		height: 10%;
		font-size: 18px;
		border-radius: 2px;
		padding: 10px;
	}

	.studenttype{
		font-size: 14px;
		height: 10%;
		width: 90%;
		left:1.5vh;
		position: relative;
		
		padding: 10px;
	}

	.student_level{
		font-size: 14px;
		height: 10%;
		width: 90%;
		left:1.5vh;
		position: relative;
		top:2vh;
		padding: 10px;
	}

	.inputImage{
		position: relative;
		top: 2vh;
		
		border: 2px solid #ccc;
		width: 90%;
		left:1.5vh;
		height: 8%;
		font-size: 18px;
		border-radius: 2px;
		padding: 10px;
	}


	@media screen and (max-width: 500px)  {
		form {

			position: absolute;
			top:10vh;
			width: 90vw;
			height: 340vw;
			border: 2px solid #ccc;
			padding: 5vh;
			background: #fff;
			border-radius: 3px;

		}

		body {

			background-image: url(image/studentBackground.jpg);
			display: flex;
			justify-content: center;
			align-items: center;
			height: 190vh;
			flex-direction: column;
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center;
			
		}

		input {
		position: relative;
		border: 2px solid #ccc;
		width: 90%;
		left:1.5vh;
		height: 8%;
		font-size: 18px;
		border-radius: 2px;
		padding: 10px;
	}

	.studenttype{
		font-size: 14px;
		height: 8%;
		width: 90%;
		left:1.5vh;
		position: relative;
		
		padding: 10px;
	}

	.student_level{
		font-size: 14px;
		height: 8%;
		width: 90%;
		left:1.5vh;
		position: relative;
		top:2vh;
		padding: 10px;
	}

		

	
		
    }
  

	</style>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body class="particles" id="particles-js">
     <form action="code.php" method="post" enctype="multipart/form-data">
	 <div class="plvicon">
	 	<img src="image/plvdocxicon.png" height= "10vh" class="plvMoto"   alt="">
     	<h2>Create your PLV Docx Account</h2>
		
		<?php
           if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
            	echo '<h2 class="bg.danger text-red"> '.$_SESSION['status'].' </h2>';
               unset($_SESSION['status']);
            }
        ?>
	
	 </div>

		<div class="container">
		<div class="row">
			<div class="col-sm">
			
     		<input type="text" name="student_id" class="student_id" placeholder="Student ID" onkeypress="return isNumberKey(event);"><br>
			 <script>
				 function isNumberKey(evt){
					var charCode = (evt.which) ? evt.which : event.keyCode;
						console.log(charCode);
							if (charCode != 46 && charCode != 45 && charCode > 31
							&& (charCode < 48 || charCode > 57))
							return false;

						return true;
					}
			 </script>
		
     		<input type="text" name="student_ln" placeholder="Last Name"><br>

			<input type="firstname" name="student_fn" class="firstnameInput" placeholder="First Name"><br>

			<input type="middlename" name="student_mn" class="middlenameInput" placeholder="Middle Name"><br>

			<input type="email" name="student_email" placeholder="Email" class="email"><br>
				
     		<input type="text" name="student_username" pattern=".{6,}" placeholder="Username" class="usernameStudent"><br>
			 	
     		<input type="password" name="student_password" pattern=".{6,}" placeholder="Password" class="passwordStudent"><br>

			<input type="password" name="confirm_password" pattern=".{6,}" class="passwordInput" placeholder="Confirm Password"><br>
			
			

			<select name="student_type" class="studenttype">
				<option value="studenttype">Student Type</option>
				<option value="1">Graduate</option>
				<option value="2">Undergraduate</option>
				<option value="3">Alumni</option>
				<option value="4">Drop Out/Transferred</option>
			</select>

			<select name="student_level" class="student_level">
				<option value="studentlevel">Student Level</option>
				<option value="1">College</option>
				<option value="2">Senior High School</option>
			</select>

			<BR>
			<BR>

			<input type="file" name="image" class="inputImage"/>

			<BR><BR>

			<button type="submit" name="register_btn" data-bs-toggle="modal" data-bs-target="#myModal" class="btnNext">Next</button>
			</div>
			
			
     			
				
				

				

			</div>
		</div>
		</div>
		<!--
		<label>Student ID</label>
     	<input type="lastname" name="lastname" placeholder="Student ID"><br>

		<label>Last Name</label>
     	<input type="lastname" name="lastname" placeholder="Last Name"><br>

		<label>First Name</label>
     	<input type="username" name="username" placeholder="First Name"><br>

		<label>Middle Name</label>
     	<input type="username" name="username" placeholder="Middle Name"><br>

     	<label>Username</label>
     	<input type="username" name="username" placeholder="Username"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

		 <button type="submit" name="signup_btn" class="btnSignUp">SignUp</button>

		 -->
     </form>
</body>

		<script type="text/javascript" src="js/particles.js"></script>
        <script type="text/javascript" src="js/apps.js"></script>

</html>