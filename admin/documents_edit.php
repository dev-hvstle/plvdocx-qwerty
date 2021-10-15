<?php 
    session_start();
    include('includes/header.php');
    include('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Document</h6>
        </div>

        <div class="card-body">
            <?php 
                $connection = mysqli_connect("localhost","plvdocx","plvdocxadmin","plvdocx_db");
                if(isset($_POST['edit_btn'])){
                    $id = $_POST['edit_id'];
            
                    $query = "SELECT * FROM document_tbl WHERE document_id='$id'";
                    $query_run = mysqli_query($connection, $query);

                    foreach($query_run as $row){
                        ?>
                            <form action="documentsCode.php" method="POST">

                            <input type="hidden" name="edit_id" value="<?php echo $row['document_id'] ?>">
                            <!-- add form group check the register.php Modal -->

                               <!-- Documents ID -->
                                <div class="form-group">
                                    <label> Documents ID </label>
                                    <input type="text" name="document_id" value="<?php echo $row['document_id'] ?>" class="form-control" placeholder="Enter Documents ID">
                                </div>
                                <!-- Document Name -->
                                <div class="form-group">
                                    <label> Document Name </label>
                                    <input type="text" name="document_name" value="<?php echo $row['document_name'] ?>" class="form-control" placeholder="Enter Documents Name">
                                </div>
                                <!-- Price Per Page -->
                                <div class="form-group">
                                    <label>Price Per Page</label>
                                    <input type="text" name="document_pricePerPageInPhp" value="<?php echo $row['document_pricePerPageInPhp'] ?>" class="form-control" placeholder="Enter Price Per Page">
                                </div>
                            
                                <!-- Pages -->

                                <div class="form-group">
                                    <label>Pages</label>
                                    <input type="text" name="document_pages" value="<?php echo $row['document_pages'] ?>" class="form-control" placeholder="Enter Pages">
                                </div>
                                                               
                                <a href="documents.php" class="btn btn-danger"> CANCEL </a>
                                <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>
                            </form>
                        <?php
                    }
                }
            ?>
        </div>
        </div>
    </div>
</div>

<?php
    include('includes/scripts.php');
    include('includes/footer.php')
?>
  