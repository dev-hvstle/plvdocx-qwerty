<?php 

//session_start();
include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-dark">To Pay
            
    </h5>
  </div>

  <div class="card-body">

    <?php 
    
        if(isset($_SESSION['success']) && $_SESSION['success'] !=''){
            echo '<h2 class="bg-primary text-white"> '.$_SESSION['success'].' </h2>';
            unset($_SESSION['success']);
        }

        if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
            echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].'</h2>';
            unset($_SESSION['status']);
        }
    
    ?>

    <div class="table-responsive">
        
    <?php 
    
        $connection = mysqli_connect("localhost","root","","plvdocx_db");
        $query = "SELECT  *
                          from transactiondetailed_tbl

                          -- inner join transactionmaster_tbl
                          -- on transactiondetailed_tbl.transactionMaster_id = transactionmaster_tbl.transaction_id

                          where transaction_status = 1;
        ";
        $query_run = mysqli_query($connection, $query);
    
    ?>

    

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr class="text-center">
            <th> Student ID </th>
            <th> Student Name </th>
            <th> Actions </th>
            <th>Manage</th>
          </tr>
        </thead>
        <tbody>
        <?php
        
            if(mysqli_num_rows($query_run) > 0){
                while($row = mysqli_fetch_assoc($query_run)){
                    ?>

                <tr class="text-center">
                    <td><?php echo $row['transactionMaster_id']; ?></td>
                    <td><?php echo $row['document_id']; ?></td>
                    <td><?php echo $row['document_subtotal']; ?></td>

                    <td>

                    <div class="row">
                        <div class="d-flex justify-content-around">
                        <!-- Function Update Status -->
                        <form action="status_topay_code.php" method="post">
                            <input type="hidden" name="transactionDetailed_id" value="<?php echo $row['transactionDetailed_id']; ?>">
                            <button type="submit" name="done_btn" data-bs-toggle="modal" data-bs-target="#myCertificates" class="btn btn-primary">Done</button>
                        </form>    

                        </div>
                    </div>

                    </td>
                   
                    <td>

                    <div class="row">
                        <div class="d-flex justify-content-around">
                        <!-- Function Update Status -->
                        <form action="status_topay_code.php" method="post">
                            <input type="hidden" name="transactionDetailed_id" value="<?php echo $row['transactionDetailed_id']; ?>">
                            <button type="submit" name="done_btn" class="btn btn-primary">Done</button>
                        </form>    

                        </div>
                    </div>

                    </td>
                </tr>

                    <?php
                }
            }
            else{
                echo "No Record Found";
            }
        ?>
        
        </tbody>
      </table>

    </div>
  </div>
</div>

<div class="modal fade" id="myCertificates">

<div class="modal-dialog">
  
  <div class="modal-content">
    <div class="modal-header">
      <h1>Certificates</h1>
    </div>

  <form action="documentcode.php" method="POST">
    <div class="modal-body">

      <!-- Document Name -->
      <div class="form-group">
          <label> Document Name </label>
          <input type="text" name="student_id" class="form-control" placeholder="Document Name" disabled> 
      </div>

      <!-- Number of pages per copy -->
      <div class="form-group">
          <label> Number of pages per copy </label>
          <input type="text" name="student_fn" class="form-control" placeholder="Number of pages per copy" disabled>
      </div>

      <!-- Price Per Page -->
      <div class="form-group">
          <label>Price Per Page</label>
          <input type="text" name="student_mn" class="form-control" placeholder="Price Per Page" disabled>
      </div>

      <!-- Number of copies -->
      <div class="form-group">
          <label>Number of copies</label>
          <input type="text" name="student_ln" class="form-control" placeholder="Number of copies">
      </div>
     
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
      </div>
    </form>

  </div>

</div>


<!-- /.container-fluid -->
                    <!-- Content Row -->

               

                </div>
                <!-- /.container-fluid -->

           
            <!-- End of Main Content -->
          </div>
            

  

  
    <?php
    include('includes/scripts.php');
    include('includes/footer.php')

    ?>
  

    

