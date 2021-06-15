<html>
    <head>
       <?php include('security.php'); ?>
        <title>
            PLV Docx
        </title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel = "icon" 
        href ="img/plvdocxicon.png" 
        type = "image/x-icon">

        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/timeline.css">

        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">


        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

        <style>
        #particles-js{

            height: 80vh;
            background-size: cover;
            background-position: center;
            background-color:#38b8b2;
            background-image:linear-gradient(rgba(56,184,178,0.8), rgba(56,184,178,0.4)),  url(image/maysan.jpg);

        }
        .containerMoto{
            padding: 2rem;
            padding-bottom: 400px;
            margin: 0 auto;
            max-width: 1200px;
            color: white;
            position: relative;
            top:30vh;
            
        }
        .contentBead{
            width: calc(50% - 2rem);
            font-size: 1vw;
            text-align: justify;
        }
        .bead{
            position: absolute;
            display: block;
            height: 1rem;
            width: 1rem;
            border-radius: 50%;
            background-color: #fff;
            text-align: center;
            left: 49.3%;
            top: 20%;
        }

        @media screen and (max-width:500px){

        .containerMoto{
            padding: 2rem;
            padding-bottom: 400px;
            margin: 0 auto;
            max-width: 600px;
            color: white;
            position: relative;
            top:30vh;
            
        }
        .bead{
            position: absolute;
            display: block;
            height: 1rem;
            width: 1rem;
            border-radius: 50%;
            background-color: #fff;
            left: 40.4vw;
            top: 20%;
        }
        .contentBead{
            width: calc(50% - 2rem);
            font-size: 3.5vw;
            text-align: left;
        }

       .plvH1{
            font-family: 'Poppins', sans-serif;
            font-size: 15vw;
            color: white;
            position: absolute;
            top:15vh;
            left:4vh;
        }
    
    .plvP{
            font-family: 'Poppins', sans-serif;
            font-size: 5vw;
            color: white;
            position: absolute;
            top:30vh;
            left:4vh;
            padding-right: 0vh;
            padding:0;
            margin: 0;
        }

        }
        </style>
    </head>
    <body>
        
        <nav>
            <div class="logo">
                <img src="img/plvdocxiconleft.png" height="60vh" class="logoImage">
               
             
            </div>
            <ul class="nav-links">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                  <a href="#about">About</a>
              </li>
                <li>
                    <a href="#document">Document</a>
                </li>
                <li>
                <form action="logout.php" method="POST">
                        <button type="submit" name="logout_btn"  href="logout.php">Logout</button>
                </form>
                </li>
            </ul>

            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            
        </nav>

        <div class="particles" id="particles-js">
            <h1 class="plvH1">PLV Docx</h1>
            <p class="plvP">is an academic document request and monitoring system.
                            Academic papers may be requested by enrolled students, dropout
                            students, and alumni of Pamantasan ng Lungsod ng Valenzuela.</p></div>
        <!-- Timeline -->


        <div class="containerMoto" id="about">
            <div class="top-selection">
                <h1 class="roadmap">PLV MISSION VISION</h1>
            
            </div>

            <div class="timeline">
                <div class="line"></div>
                <div class="section">
                    <div class="bead"></div>
                    <div class="contentBead">
                        <h2>PLV Vision</h2>
                        <p>
                        A dynamic center for the development of competent and competitive human resource as foundation for growth and advancement of the City of Valenzuela
                        </p>
                    </div>
                </div>


                <div class="section">
                    <div class="bead"></div>
                    <div class="contentBead">
                        <h2>PLV Mission</h2>
                        <p>
                        To provide the citizens of Valenzuela an efficient and effective institution of higher learning that will make them skillful, 
                        productive, competent, competitive, civic-minded, and God loving toward a peaceful, healthy and progressive city.
                        </p>
                    </div>
                </div>

            </div>
        </div>



        <div class="plvdocs" id="document">
        <h1>PLV DOCUMENTS</h1>
        <span>Available Documents</span>
        <div class="plv-char">

            <div class="plv-cards">
            <img src="./image/docIcon.png" />
            <h1>Transcript Of Record</h1>
            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et blanditiis ullam excepturi modi,
                 quidem aut ipsam ex eaque labore a facilis repellat culpa saepe. Fugiat corporis incidunt 
                 nesciunt accusantium quasi.</span>
            </div>

            <div class="plv-cards">
                <img src="./image/docIcon.png" />
            <h1>Certificate Of Record</h1>
            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et blanditiis ullam excepturi modi,
                quidem aut ipsam ex eaque labore a facilis repellat culpa saepe. Fugiat corporis incidunt 
                nesciunt accusantium quasi.</span>
            </div>

            <div class="plv-cards">
                <img src="./image/docIcon.png" />
            <h1>Diploma</h1>
            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et blanditiis ullam excepturi modi,
                quidem aut ipsam ex eaque labore a facilis repellat culpa saepe. Fugiat corporis incidunt 
                nesciunt accusantium quasi.</span>
            </div>

            <div class="plv-cards">
                <img src="./image/docIcon.png" />
            <h1>CAV</h1>
            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et blanditiis ullam excepturi modi,
                quidem aut ipsam ex eaque labore a facilis repellat culpa saepe. Fugiat corporis incidunt 
                nesciunt accusantium quasi.</span>
            </div>

            <div class="plv-cards">
                <img src="./image/docIcon.png" />
            <h1>Docs</h1>
            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et blanditiis ullam excepturi modi,
                quidem aut ipsam ex eaque labore a facilis repellat culpa saepe. Fugiat corporis incidunt 
                nesciunt accusantium quasi.</span>
            </div>

            <div class="plv-cards">
                <img src="./image/docIcon.png" />
            <h1>Docs</h1>
            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et blanditiis ullam excepturi modi,
                quidem aut ipsam ex eaque labore a facilis repellat culpa saepe. Fugiat corporis incidunt 
                nesciunt accusantium quasi.</span>
            </div>


            <div class="plv-cards">
                <img src="./image/docIcon.png" />
            <h1>Docs</h1>
            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et blanditiis ullam excepturi modi,
                quidem aut ipsam ex eaque labore a facilis repellat culpa saepe. Fugiat corporis incidunt 
                nesciunt accusantium quasi.</span>
            </div>

            <div class="plv-cards">
                <img src="./image/docIcon.png" />
            <h1>Docs</h1>
            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et blanditiis ullam excepturi modi,
                quidem aut ipsam ex eaque labore a facilis repellat culpa saepe. Fugiat corporis incidunt 
                nesciunt accusantium quasi.</span>
            </div>

        </div>
    </div>

     




    <div class="containerButtons">
        <div class="containerButtons-item containerButtons-item-1">
            <a href="https://www.facebook.com/plv.registrarsoffice" ><btn class="button button1">PLV Registrar</btn></a>
            
        </div>
        
        <div class="containerButtons-item containerButtons-item-2">
            <a href="loginmain.php" ><btn class="button button1">PLV Documents</btn></a>
        </div>
        
        <div class="containerButtons-item containerButtons-item-3">
            <a href="https://www.facebook.com/PLVNewWorld" ><btn class="button button1">PLV World</btn></a>
        </div>

    </div>


    <footer style="background-color: #38b8b2;">

   



            

        <div class="plvFooter">
            
            <p>
                All rights reserved &copy; PLV.
                <BR>
              
                The PLV Docx is commissioned by the PLV Foundation.        </p>
           
        </div>

   



  


    </footer>

































        <script type="text/javascript" src="js/particles.js"></script>
        <script type="text/javascript" src="js/appsindex.js"></script>
        <script src="js/timeline.js"></script>
        <script src="/js/app.js"></script>
    </body>
</html>