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
        <h5 class="modal-title" id="exampleModalLabel">Add Staff Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="documentsCode.php" method="POST">

        <div class="modal-body">
            <!-- Document Name -->
            <div class="form-group">
                <label> Document Name </label>
                <input type="text" name="document_name" class="form-control" placeholder="Enter Document Name">
            </div>
            <!-- Price Per Page -->
            <div class="form-group">
                <label>Price Per Page</label>
                <input type="text" name="document_pricePerPageInPhp" class="form-control" placeholder="Enter Price Per Page in Php">
            </div>
           
            <!-- Pages -->

            <div class="form-group">
                <label>Pages</label>
                <input type="text" name="document_pages" class="form-control" placeholder="Enter Number of Pages">
            </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add_document" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Documents 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add New Documents 
            </button>
    </h6>
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
    
        $connection = mysqli_connect("localhost","plvdocx","plvdocxadmin","plvdocx_db");
        $query = "SELECT  document_id,
                          document_name,
                          document_pricePerPageInPhp,
                          document_pages

                          from document_tbl

                          where isDeleted = 0;
        ";
        $query_run = mysqli_query($connection, $query);
    
    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr class="text-center">
            <th> Documents ID </th>
            <th> Document Name </th>
            <th> Price Per Page </th>
            <th> Pages </th>
            <th> Manage </th>
          </tr>
        </thead>
        <tbody>
        <?php
        
            if(mysqli_num_rows($query_run) > 0){
                while($row = mysqli_fetch_assoc($query_run)){
                    ?>

                <tr class="text-center">
                    <td><?php echo $row['document_id']; ?></td>
                    <td><?php echo $row['document_name']; ?></td>
                    <td><?php echo $row['document_pricePerPageInPhp']; ?></td>
                    <td><?php echo $row['document_pages']; ?></td>
                   
                    <td>
                    <div class="row">
                        <div class="d-flex justify-content-around">
                            <form action="documents_edit.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['document_id']; ?>">
                                <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
                            </form>    

                            <form action="documentsCode.php" method="post">
                                <input type="hidden" name="delete_id" value="<?php echo $row['document_id']; ?>">
                                <button type="submit" name="delete_btn" class="btn btn-danger">DELETE</button>
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

            </div>
            <!-- End of Main Content -->

   

  

  
    <?php
    include('includes/scripts.php');
    include('includes/footer.php')

    ?>
  

    

