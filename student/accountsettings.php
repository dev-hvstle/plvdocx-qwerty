<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="js/app.js"></script>
    <link rel="stylesheet" href="css/accountsettings.css"/>
   

      <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap"
      rel="stylesheet"
    />

    <link rel = "icon" 
    href ="img/plvdocxicon.png" 
    type = "image/x-icon">

    <title>PLV Docx</title>
  </head>
  
  <body>

    <?php
      include('security.php');
      include('includes/navbar.php');
    ?>
  
    <main>
        <div class="mytabs">
            <input type="radio" id="tabpay" name="mytabs" checked="checked">
            <label for="tabpay">Account Settings</label>
            <div class="tab">
                <div class="wrapper"></div>
                <main>
                  <form name="my-form" class="formCustom" action="code.php" method="post">
                        <h3>My Profile</h3>
                        <p>Manage and protect your account</p>
                      <div class="form-boxCustom">
                          <label class="lblCustom" for="studentID">Student ID</label>
                          <input class="inputCustom" type="text" id="studentID" name="studentID" placeholder="<?php echo $_SESSION['student_id'] ?>" disabled>
                      </div>
                      <div class="form-boxCustom">
                        <label class="lblCustom" for="name">Name</label>
                        <input class="inputCustom" type="text" id="name" name="name" placeholder="<?php echo $_SESSION['student_name']; ?>" disabled>
                      </div>

                      <div class="form-boxCustom">
                        <label class="lblCustom" for="Email">Email</label>
                        <input class="inputCustom" type="text" id="email" name="email" placeholder="<?php echo $_SESSION['student_name']; ?>" disabled>
                      </div>

                      <div class="form-boxCustom">
                        <label class="lblCustom" for="username">Username</label>
                        <input class="inputCustom" type="text" id="username" name="username" placeholder="<?php echo $_SESSION['student_username'] ?>" disabled>
                      </div>

                      <div class="form-boxCustom">
                          <label class="lblCustom" for="newpass">New Password</label>
                          <input class="inputCustom" type="password" id="student_password" name="student_password" placeholder="New Password" required>
                      </div>

                      <div class="form-boxCustom">
                        <label class="lblCustom" for="confirmpass">Confirm Password</label>
                        <input class="inputCustom" type="password" id="cpassword" name="confirmpassword" placeholder="Confirm Password" required>
                    </div>
                     
                      <div class="form-boxCustom">
                          <button id="update_btn" name="update_btn" class="btnCustom">Confirm</button>
                      </div>
                      
                  </form>
              </main>
                  
                </div>
            </div>
          </div>

       

    </main>
   
  </body>
  </html>