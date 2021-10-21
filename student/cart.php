<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="js/app.js"></script>
    <link rel="stylesheet" href="css/status.css"/>
    <link rel="stylesheet" href="css/table.css"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    
      <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap"
      rel="stylesheet"
    />

    <link rel = "icon" 
    href ="img/plvdocxicon.png" 
    type = "image/x-icon">
    
    <title>PLV Docx</title>
    <style>
        #CheckOut{
            position: relative;
            left:26vh;
            float: right;
            top: 75vh;
            border-radius: 2px;
            background-color: #3cc3bd;
        }

        @media screen and (max-width:500px) {
            
        #CheckOut{
            position: relative;
            left:0vh;
            float: right;
            top: 65vh;
            border-radius: 2px;
            background-color: #3cc3bd;
        }

        }

        .badge {
        position: relative;
        right: 30px;
        top: -1vh;
        color: #fff;
        }

        .link-textCustom-Notif{
            position: relative;
            right: 1.6vh;
            top:1vh;
        }
    </style>
    
  </head>
  
  <body>

    <?php
      include('security.php');
      include('includes/navbar.php');
    ?>
  
    <main>


    <!-- TO PAY STATUS -->
    <div class="table-container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Document Name</th>
                                        <th>Number of Pages</th>
                                        <th>Document Price</th>
                                        <th>Number of Copies</th>
                                        <th>Total Amount</th>
                                        <th>Manage</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        $temp_dataCount = count($_SESSION['cart_data']);
                                        if($temp_dataCount == 0){
                                            echo "Add Items to the Cart!";
                                        }
                                        else{
                                        for($row = 0; $row < $temp_dataCount; $row++){
                                        
                                    ?>
                                    <tr>
                                        <td data-label="Document Name"><?php echo $_SESSION['cart_data'][$row][0] ?></td>
                                        <td data-label="Number of Pages"><?php echo $_SESSION['cart_data'][$row][1] ?></td>
                                        <td data-label="Document Price"><?php echo $_SESSION['cart_data'][$row][2]?></td>
                                        <td data-label="Number of Copies"><?php echo $_SESSION['cart_data'][$row][3] ?></td>
                                        <td data-label="Total Amount"><?php echo $_SESSION['cart_data'][$row][4] ?></td>
                                        <td>
                                        <div class="row">
                                            <div class="d-flex justify-content-around">
                                            <form action="code.php" method="post">
                                                <input type="hidden" name="delete_id" value="<?php echo $row['transaction_id']; ?>">
                                                <button type="submit" name="delete_btn" class="btn btn-danger ">Cancel</button>
                                            </form>
                                            </div>
                                        </div>
                                        </td>
                                    </tr>
                                    <?php 
                                            }
                                        }
                                    ?>
                                </tbody>

                            </table>
                            
                        </div>

                        <div class="container">
                            <form action="code.php" method="POST">
                            <button type="submit" name="checkOut_btn" class="btn btn-success" id="CheckOut">Check Out Documents</button>        
                            </form>  
                        </div>
       
                                          
    </main>
   
  </body>
  </html>