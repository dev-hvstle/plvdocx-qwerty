<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" href="css/style-login.css">
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
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
		height: 100vh;
		flex-direction: column;
		background-repeat: no-repeat;
		background-size: cover;
    	background-position: center;
		overflow: hidden;
	}


	

	.btnSignUp {
		float: right;
		background: #3cc3bd;
		padding: 10px 15px;
		color: #fff;
		border-radius: 0px;
		margin-right: 10px;
		border: solid 2px #3cc3bd;
	}

	.btnSignUp:hover{
		float: right;
		background: #fff;
		padding: 10px 15px;
		color: #000;
		border-radius: 0px;
		margin-right: 10px;
		border: solid 2px #3cc3bd;
		transition: all 0.9s ease;
	}

	form {
		position: absolute;
		width: 100vh;
		height: 75vh;
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

	input {
		display: block;
		border: 2px solid #ccc;
		width: 95%;
		height: 15%;
		font-size: 18px;
		border-radius: 2px;
		padding: 10px;
	}
	

	.firstnamelbl{
		position: relative;
		top: 24%;
	}

	.firstnameInput{
		position: relative;
		top: 21%;
	}
	
	
	.passwordInput{
		position: relative;
		top: 63.5%;
	}

	.middlenameInput{
		position: relative;
		top: 21%;
	}

	.studenttype{
		font-size: 14px;
		height: 15%;
		width: 95%;
		padding-left: 8px;
		padding: 10px;
	}

	.student_level{
		font-size: 14px;
		height: 15%;
		width: 95%;
		position: relative;
		top: 63%;
		padding: 10px;
	}

	.btnNext{
		position: relative;
		top: 40vh;
		width: 10vh;
		background: #3cc3bd;
	}

	@media screen and (max-width: 500px)  {
		form {
			position: absolute;
			width: 50vh;
			height: 105vh;
			border: 2px solid #ccc;
			padding: 30px;
			background: #fff;
			border-radius: 3px;
		}
    }
  

	</style>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body class="particles" id="particles-js">
     <form action="code.php" method="post">
	 <div class="plvicon">
	 	<img src="image/plvdocxicon.png" height= "10vh" class="plvMoto"   alt="">
     	<h2>Create your PLV Docx Account</h2>
		
		<?php
           if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
            	echo '<h2 class="bg.danger text-black"> '.$_SESSION['status'].' </h2>';
               unset($_SESSION['status']);
            }
        ?>
	
	 </div>

		<div class="container">
		<div class="row">
			<div class="col-sm">
			
     		<input type="number" name="student_id" class="student_id" placeholder="Student ID"><br>
		
     		<input type="text" name="student_ln" placeholder="Last Name"><br>

			<input type="email" name="student_email" placeholder="Email"><br>
				
     		<input type="text" name="student_username" placeholder="Username"><br>
			 	
     		<input type="password" name="student_password" placeholder="Password"><br>
			
			

			<select name="student_type" class="studenttype">
				<option value="studenttype">Student Type</option>
				<option value="1">Graduate</option>
				<option value="2">Undergraduate</option>
				<option value="3">Alumni</option>
				<option value="4">Drop Out/Transferred</option>
			</select>

			<BR>
			<BR>
			</div>
			<div class="col-sm">

				

     			<input type="firstname" name="student_fn" class="firstnameInput" placeholder="First Name"><br>

				<input type="password" name="confirm_password" class="passwordInput" placeholder="Confirm Password"><br>
		
				<select name="student_level" class="student_level">
				<option value="studentlevel">Student Level</option>
				<option value="1">College</option>
				<option value="2">Senior High School</option>
			</select>
			</div>
			<div class="col-sm">
			
     			<input type="middlename" name="student_mn" class="middlenameInput" placeholder="Middle Name"><br>
				
				<div class="modal fade" id="myModal">

                                <div class="modal-dialog modal-lg">
                                  
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1>Forms</h1>
                                    </div>

                                  <form action="documentcode.php" method="POST">
                                  <?php 
                                      if(isset($_POST['docCav_btn'])){
                                        $_SESSION['document_id'] = 1;
                                      }
                                
                                      if(isset($_POST['docInc_btn'])){
                                        $_SESSION['document_id'] = 2;
                                      }
                                
                                      if(isset($_POST['docAbsence_btn'])){
                                        $_SESSION['document_id'] = 3;
                                      }
                                
                                      if(isset($_POST['docTransfer_btn'])){
                                        $_SESSION['document_id'] = 4;
                                      }
                                
                                      if(isset($_POST['docDiploma_btn'])){
                                        $_SESSION['document_id'] = 5;
                                      }

                                      $document_id = $_SESSION['document_id'];

                                      $connection = mysqli_connect("localhost","root","","plvdocx_db");
                                      $query = "SELECT  *

                                                        FROM document_tbl
                                                        
                                                        WHERE document_id = '$document_id';
                                      ";
                                      $query_run = mysqli_query($connection, $query);
                                      $row = mysqli_fetch_assoc($query_run);
                                    ?>
                                    <div class="modal-body">

                                    <!-- Document Name -->
                                    <div class="form-group">
                                        <label> Document Name </label>
                                        <input type="text" name="student_id" class="form-control" placeholder="<?php echo $row['document_name'] ?>" disabled> 
                                    </div>

                                    <!-- Number of pages per copy -->
                                    <div class="form-group">
                                        <label> Number of pages per copy </label>
                                        <input type="text" name="student_fn" class="form-control" placeholder="<?php echo $row['document_pages'] ?>" disabled>
                                    </div>

                                    <!-- Price Per Page -->
                                    <div class="form-group">
                                        <label>Price Per Page</label>
                                        <input type="text" name="student_mn" class="form-control" placeholder="<?php echo $row['document_pricePerPageInPhp'] ?>" disabled>
                                    </div>

                                    <!-- Number of copies -->
                                    <div class="form-group">
                                        <label>Number of copies</label>
                                        <input type="text" name="student_ln" class="form-control" placeholder="Number of copies">
                                    </div>
                                  
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="code.php" method="post">
                                          <button type="submit" name="registerbtn" class="btn btn-primary">Accept</button>
                                        </form>
                                    </div>


                                </form>

                                  </div>

                                </div>

                              </div>

				<button type="submit" name="register_btn" data-bs-toggle="modal" data-bs-target="#myModal" class="btnNext">Next</button>

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