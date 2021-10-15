<?php 

//session_start();
include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>

 

<!-- Begin Page Content -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Documents Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="studentCode.php" method="POST">

      <div class="modal-body">

            <!-- Document Name ID -->
            <div class="form-group">
                <label> Document Name </label>
                <input type="text" name="student_id" class="form-control" placeholder="Enter Student ID">
            </div>
            <!-- Status -->
            <div class="form-group">
                <label> Status </label>
                <input type="text" name="student_fn" class="form-control" placeholder="Enter First Name">
            </div>
            <!-- Student ID -->
            <div class="form-group">
                <label>Student ID</label>
                <input type="text" name="student_mn" class="form-control" placeholder="Enter Middle Name">
            </div>
            <!-- Action -->
            <div class="form-group">
                <label>Action</label>
                <input type="text" name="student_ln" class="form-control" placeholder="Enter Last Name">
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-dark">Unclaimed Documents
            
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
                          from transactionmaster_tbl

                          INNER JOIN employee_tbl
                          ON transactionmaster_tbl.employee_id = employee_tbl.employee_id

                          INNER JOIN student_tbl
                          ON transactionmaster_tbl.student_id = student_tbl.student_id  

                          where isDeleted = 0;
        ";
        $query_run = mysqli_query($connection, $query);
    
    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr class="text-center">
            <th> Transaction ID </th>
            <th> Student ID </th>
            <th> Student Name </th>
            <th> Document Name  </th>
            <th>Manage</th>
          </tr>
        </thead>
        <tbody>
        <?php
        
            if(mysqli_num_rows($query_run) > 0){
                while($row = mysqli_fetch_assoc($query_run)){
                    ?>

                <tr class="text-center">
                    <td><?php echo $row['transaction_id']; ?></td>
                    <td><?php echo $row['employee_id']; ?></td>
                    <td><?php echo $row['student_id']; ?></td>
                    <td><?php echo $row['amount_total']; ?></td>
                   
                    <td>

                    <div class="row">
                        <div class="d-flex justify-content-around">
                        <!-- Function Update Status -->
                        <form action="student_edit.php" method="post">
                            <input type="hidden" name="edit_id" value="<?php echo $row['student_id']; ?>">
                            <button type="submit" name="edit_btn" class="btn btn-primary">Done</button>
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
  

    

