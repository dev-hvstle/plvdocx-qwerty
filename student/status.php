<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="js/app.js"></script>
    <link rel="stylesheet" href="css/status.css"/>
    <link rel="stylesheet" href="css/table.css"/>
    
      <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap"
      rel="stylesheet"
    />

    <link rel = "icon" 
    href ="img/plvdocxicon.png" 
    type = "image/x-icon">
    
    <title>PLV Docx</title>
    <style>
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
        <div class="mytabs">
            <input type="radio" id="tabpay" name="mytabs" checked="checked">
            <label for="tabpay">TO PAY</label>
            <div class="tab">
            <div class="wrapper">
                   
                    <div class="table-container">
                        <?php
                            $student_id = $_SESSION['student_id']; 
                            $connection = mysqli_connect("localhost","plvdocx","plvdocxadmin","plvdocx_db");
                            $query = "SELECT  *
                    
                                              from transactiondetailed_tbl 
                            
                                              inner join transactionmaster_tbl 
                    
                                              ON transactiondetailed_tbl.transactionMaster_id = transactionmaster_tbl.transaction_id
                                              
                                              inner join document_tbl

                                              on transactiondetailed_tbl.document_id = document_tbl.document_id

                                              WHERE transaction_status = 1 AND student_id = $student_id;
                            ";
                            $query_run = mysqli_query($connection, $query);
                        ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Transaction ID</th>
                                        <th>Request Created</th>
                                        <th>Release Date</th>
                                        <th>Total Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        if(mysqli_num_rows($query_run) > 0){
                                            while($row = mysqli_fetch_assoc($query_run)){
                                        
                                    ?>
                                    <tr>
                                        <td data-label="Batch Type"><?php echo $row['transaction_id'] ?></td>
                                        <td data-label="Start Date"><?php echo $row['transaction_date'] ?></td>
                                        <td data-label="Start / End Time"><?php echo $row['transaction_dateFinished']?></td>
                                        <td data-label="Training Mode"><?php echo $row['amount_total'] ?></td>
                                        <td data-label="#">
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
                                        else{
                                            echo "No Records Found";
                                        }
                                    ?>
                                </tbody>


                            </table>

                        </div>
                    </div>
                
            </div>
        
            <input type="radio" id="tabprocess" name="mytabs">
            <label for="tabprocess">TO PROCESS</label>
            <div class="tab">
              
            <div class="wrapper">

            <div class="table-container">
                        <?php
                            $student_id = $_SESSION['student_id']; 
                            $connection = mysqli_connect("localhost","plvdocx","plvdocxadmin","plvdocx_db");
                            $query = "SELECT  *
                    
                                              FROM transactiondetailed_tbl 
                            
                                              INNER JOIN transactionmaster_tbl 
                    
                                              ON transactiondetailed_tbl.transactionMaster_id = transactionmaster_tbl.transaction_id
                                              
                                              INNER JOIN document_tbl

                                              ON transactiondetailed_tbl.document_id = document_tbl.document_id

                                              INNER JOIN transactionstatus_tbl

                                              ON transactiondetailed_tbl.transaction_status = transactionstatus_tbl.transactionStatus_id

                                              WHERE transaction_status > 1 AND transaction_status < 6 AND student_id = $student_id;
                            ";
                            $query_run = mysqli_query($connection, $query);
                        ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Request Created</th>
                                        <th>Release Date</th>
                                        <th>Document</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        if(mysqli_num_rows($query_run) > 0){
                                            while($row = mysqli_fetch_assoc($query_run)){   
                                    ?>
                                    <tr>
                                        <td data-label="Start Date"><?php echo $row['transaction_date'] ?></td>
                                        <td data-label="Start / End Time"><?php echo $row['transaction_dateFinished']?></td>
                                        <td data-label="Batch Type"><?php echo $row['document_name'] ?></td>
                                        <td data-label="Training Mode"><?php echo $row['document_subtotal'] ?></td>
                                        <td><?php echo $row['transactionStatus_name'] ?></td>
                                    </tr>
                                    <?php 
                                            }
                                        }
                                        else{
                                            echo "No Records Found";
                                        }
                                    ?>
                                </tbody>


                            </table>

                        </div>
                    </div>

            </div>

            <input type="radio" id="tabreceive" name="mytabs">
            <label for="tabreceive">TO RECEIVE</label>
            <div class="tab">
              
            <div class="wrapper">
                    <div class="table-container">
                    <?php
                            $student_id = $_SESSION['student_id']; 
                            $connection = mysqli_connect("localhost","plvdocx","plvdocxadmin","plvdocx_db");
                            $query = "SELECT  *
                    
                                              FROM transactiondetailed_tbl 
                            
                                              INNER JOIN transactionmaster_tbl 
                    
                                              ON transactiondetailed_tbl.transactionMaster_id = transactionmaster_tbl.transaction_id
                                              
                                              INNER JOIN document_tbl

                                              ON transactiondetailed_tbl.document_id = document_tbl.document_id

                                              WHERE transaction_status = 6 AND student_id = $student_id;
                            ";
                            $query_run = mysqli_query($connection, $query);
                        ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Request Created</th>
                                        <th>Release Date</th>
                                        <th>Document</th>
                                        <th>Total Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        if(mysqli_num_rows($query_run) > 0){
                                            while($row = mysqli_fetch_assoc($query_run)){
                                        
                                    ?>
                                    <tr>
                                        <td data-label="Start Date"><?php echo $row['transaction_date'] ?></td>
                                        <td data-label="Start / End Time"><?php echo $row['transaction_dateFinished']?></td>
                                        <td data-label="Batch Type"><?php echo $row['document_name'] ?></td>
                                        <td data-label="Training Mode"><?php echo $row['document_subtotal'] ?></td>
                                    </tr>
                                    <?php 
                                            }
                                        }
                                        else{
                                            echo "No Records Found";
                                        }
                                    ?>
                                </tbody>


                            </table>


                        </div>

                    </div>

            </div>

            <input type="radio" id="tabcompleted" name="mytabs">
            <label for="tabcompleted" >COMPLETED</label>
            <div class="tab">
              
                <div class="wrapper">
                    <div class="table-container">
                    <?php
                            $student_id = $_SESSION['student_id']; 
                            $connection = mysqli_connect("localhost","plvdocx","plvdocxadmin","plvdocx_db");
                            $query = "SELECT  *
                    
                                              FROM transactiondetailed_tbl 
                            
                                              INNER JOIN transactionmaster_tbl 
                    
                                              ON transactiondetailed_tbl.transactionMaster_id = transactionmaster_tbl.transaction_id
                                              
                                              INNER JOIN document_tbl

                                              ON transactiondetailed_tbl.document_id = document_tbl.document_id

                                              WHERE transaction_status = 7 AND student_id = $student_id;
                            ";
                            $query_run = mysqli_query($connection, $query);
                        ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Request Created</th>
                                        <th>Release Date</th>
                                        <th>Document</th>
                                        <th>Total Amount</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        if(mysqli_num_rows($query_run) > 0){
                                            while($row = mysqli_fetch_assoc($query_run)){
                                        
                                    ?>
                                    <tr>
                                        <td data-label="Start Date"><?php echo $row['transaction_date'] ?></td>
                                        <td data-label="Start / End Time"><?php echo $row['transaction_dateFinished']?></td>
                                        <td data-label="Batch Type"><?php echo $row['document_name'] ?></td>
                                        <td data-label="Training Mode"><?php echo $row['document_subtotal'] ?></td>
                                    </tr>
                                    <?php 
                                            }
                                        }
                                        else{
                                            echo "No Records Found";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                </div>

            </div>

            <input type="radio" id="tabcancelled" name="mytabs">
            <label for="tabcancelled">CANCELLED</label>
            <div class="tab">
              
                <div class="wrapper">
                        
                <div class="table-container">
                <?php
                            $student_id = $_SESSION['student_id']; 
                            $connection = mysqli_connect("localhost","plvdocx","plvdocxadmin","plvdocx_db");
                            $query = "SELECT  *
                    
                                              FROM transactiondetailed_tbl 
                            
                                              INNER JOIN transactionmaster_tbl 
                    
                                              ON transactiondetailed_tbl.transactionMaster_id = transactionmaster_tbl.transaction_id
                                              
                                              INNER JOIN document_tbl

                                              ON transactiondetailed_tbl.document_id = document_tbl.document_id

                                              WHERE transaction_status = 9 AND student_id = $student_id;
                            ";
                            $query_run = mysqli_query($connection, $query);
                        ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Request Created</th>
                                        <th>Release Date</th>
                                        <th>Document</th>
                                        <th>Total Amount</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        if(mysqli_num_rows($query_run) > 0){
                                            while($row = mysqli_fetch_assoc($query_run)){
                                        
                                    ?>
                                    <tr>
                                        <td data-label="Start Date"><?php echo $row['transaction_date'] ?></td>
                                        <td data-label="Start / End Time"><?php echo $row['transaction_dateFinished']?></td>
                                        <td data-label="Batch Type"><?php echo $row['document_name'] ?></td>
                                        <td data-label="Training Mode"><?php echo $row['document_subtotal'] ?></td>
                                    </tr>
                                    <?php 
                                            }
                                        }
                                        else{
                                            echo "No Records Found";
                                        }
                                    ?>
                                </tbody>


                            </table>


                        </div>


                </div>

            </div>

            <input type="radio" id="tabunclaimed" name="mytabs">
            <label for="tabunclaimed">Unclaimed Documents</label>
            <div class="tab">
              
            <div class="wrapper">

            <div class="table-container">
                        <?php
                            $student_id = $_SESSION['student_id']; 
                            $connection = mysqli_connect("localhost","plvdocx","plvdocxadmin","plvdocx_db");
                            $query = "SELECT  *
                    
                                              FROM transactiondetailed_tbl 
                            
                                              INNER JOIN transactionmaster_tbl 
                    
                                              ON transactiondetailed_tbl.transactionMaster_id = transactionmaster_tbl.transaction_id
                                              
                                              INNER JOIN document_tbl

                                              ON transactiondetailed_tbl.document_id = document_tbl.document_id

                                              INNER JOIN transactionstatus_tbl

                                              ON transactiondetailed_tbl.transaction_status = transactionstatus_tbl.transactionStatus_id

                                              WHERE transaction_status > 1 AND transaction_status < 6 AND student_id = $student_id;
                            ";
                            $query_run = mysqli_query($connection, $query);
                        ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Request Created</th>
                                        <th>Release Date</th>
                                        <th>Document</th>
                                        <th>Total Amount</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php 
                                        if(mysqli_num_rows($query_run) > 0){
                                            while($row = mysqli_fetch_assoc($query_run)){   
                                    ?>
                                    <tr>
                                        <td data-label="Start Date"><?php echo $row['transaction_date'] ?></td>
                                        <td data-label="Start / End Time"><?php echo $row['transaction_dateFinished']?></td>
                                        <td data-label="Batch Type"><?php echo $row['document_name'] ?></td>
                                        <td data-label="Training Mode"><?php echo $row['document_subtotal'] ?></td>
                                    </tr>
                                    <?php 
                                            }
                                        }
                                        else{
                                            echo "No Records Found";
                                        }
                                    ?>
                                </tbody>


                            </table>

                        </div>
                    </div>

            </div>

    </div>
        
        
    </div>

       

    </main>
   
  </body>
  </html>