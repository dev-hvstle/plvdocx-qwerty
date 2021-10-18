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
    <h5 class="m-0 font-weight-bold text-dark">Pending Students
            
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
                          FROM student_tbl

                          -- inner join transactionmaster_tbl
                          -- on transactiondetailed_tbl.transactionMaster_id = transactionmaster_tbl.transaction_id

                          WHERE isActive = 0;
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
                    <td><?php echo $row['student_id']; ?></td>
                    <td><?php echo $row['student_ln'] . ", " . $row['student_fn'] . " " . $row['student_mn']; ?></td>


                    <td>

                    <div class="row">
                        <div class="d-flex justify-content-around">
                        <!-- Function View Student ID -->
                        
                            <input type="hidden" name="student_id" value="<?php echo $row['student_id']; ?>">
                            <button type="submit" name="view_btn" class="btn btn-primary" onclick="showModal(this)" value="<?php echo $row['student_photo']; ?>">View</button>
                            <script>
                              function showModal(image){
                                var id_image = image.value;
                                $("#student_photo").attr("src", "../student/"+id_image);
                                $("#exampleModal").modal("toggle");
                                console.log("../student/"+id_image);
                              }
                            </script>
                            <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">

                                        <h5 class="modal-title" id="exampleModalLabel">Student ID</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                      <img id="student_photo"  style="height:20vh;" class="imgsize">
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                        </div>
                    </div>

                    </td>
                   
                    <td>

                    <div class="row">
                        <div class="d-flex justify-content-around">
                        <!-- Function Update Status -->
                        <form action="students_pendingAccount_code.php" method="post">
                            <input type="hidden" name="student_id" value="<?php echo $row['student_id']; ?>">
                            <button type="submit" name="verify_btn" class="btn btn-primary">Verify</button>
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
  

    

