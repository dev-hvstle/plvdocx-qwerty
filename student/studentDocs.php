<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="js/app.js"></script>
    <link rel="stylesheet" href="css/studentDocs.css" />
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
            <input type="radio" id="tabfree" name="mytabs" checked="checked">
            <label for="tabfree">Forms</label>
            <div class="tab">
              <h2>Forms</h2>
                <div class="wrapper">
                    <div class="img-area">
<<<<<<< Updated upstream
                        <div class="single-img"><button class="btnImage" data-toggle="modal" data-target="#requestDocument"><img src="image/cav.png" class="imgsize"></button></div>
                        <div class="single-img"><button class="btnImage"><img src="image/completion of inc grade.png" class="imgsize"></button></div>
                        <div class="single-img"><button class="btnImage"><img src="image/formsleaveofabsence.png" class="imgsize"></button></div>
                        <div class="single-img"><button class="btnImage"><img src="image/transfercreds.png" class="imgsize"></button></div>
                        <div class="single-img"><button class="btnImage"><img src="image/DIPLOMA.png" class="imgsize"></button></div>
=======
                        <div class="single-img"><button class="btnImage" data-toggle="modal" data-target="#addadminprofile"><img src="image/cav.png" class="imgsize"></button></div>
                        <div class="single-img"><button class="btnImage" data-toggle="modal" data-target="#addadminprofile"><img src="image/completion of inc grade.png" class="imgsize"></button></div>
                        <div class="single-img"><button class="btnImage" data-toggle="modal" data-target="#addadminprofile"><img src="image/formsleaveofabsence.png" class="imgsize"></button></div>
                        <div class="single-img"><button class="btnImage" data-toggle="modal" data-target="#addadminprofile"><img src="image/transfercreds.png" class="imgsize"></button></div>
                        <div class="single-img"><button class="btnImage" data-toggle="modal" data-target="#addadminprofile"><img src="image/DIPLOMA.png" class="imgsize"></button></div>
>>>>>>> Stashed changes
                    </div>
                </div>
            </div>
        
            <input type="radio" id="tabsilver" name="mytabs">
            <label for="tabsilver">Certifications</label>
            <div class="tab">
              <h2>Certifications</h2>
                <div class="wrapper">
                    <div class="img-area">
                        <div class="single-img"><button class="btnImage" data-toggle="modal" data-target="#addadminprofile"><img src="image/culmulativegpa.png" class="imgsize"></button></div>
                        <div class="single-img"><button class="btnImage" data-toggle="modal" data-target="#addadminprofile"><img src="image/description.png" class="imgsize"></button></div>
                        <div class="single-img"><button class="btnImage" data-toggle="modal" data-target="#addadminprofile"><img src="image/enrollment.png" class="imgsize"></button></div>
                        <div class="single-img"><button class="btnImage" data-toggle="modal" data-target="#addadminprofile"><img src="image/grades.png" class="imgsize"></button></div>
                        <div class="single-img"><button class="btnImage" data-toggle="modal" data-target="#addadminprofile"><img src="image/graduation.png" class="imgsize"></button></div>
                        <div class="single-img"><button class="btnImage" data-toggle="modal" data-target="#addadminprofile"><img src="image/unitsearned.png" class="imgsize"></button></div>
                    </div>
                </div>
            </div>
        
        
          </div>

       

    </main>
   
  </body>
  </html>