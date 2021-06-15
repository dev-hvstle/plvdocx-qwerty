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
        <h5 class="modal-title" id="exampleModalLabel">Add Student Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="documentcode.php" method="POST">

      <div class="modal-body">
            <!-- Student ID -->
            <div class="form-group">
                <label> Student ID </label>
                <input type="text" name="student_id" class="form-control" placeholder="Enter Student ID">
            </div>
            <!-- First Name -->
            <div class="form-group">
                <label> First Name </label>
                <input type="text" name="student_fn" class="form-control" placeholder="Enter First Name">
            </div>
            <!-- Middle Name -->
            <div class="form-group">
                <label>Middle Name</label>
                <input type="text" name="student_mn" class="form-control" placeholder="Enter Middle Name">
            </div>
            <!-- Last Name -->
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="student_ln" class="form-control" placeholder="Enter Last Name">
            </div>
            <!-- Dropdown Menu -->

            <!-- Connect this one to database usertype -->
            <p class="dropdown">
            Current Status: 
            <BR>
            <select name="student_type">
              <option value="1">Graduate </option>
              <option value="2">Undergraduate</option>
              <option value="3">Alumni</option>
              <option value="4">Drop Out/Transferred</option>
            </select>
            </p>

            <p class="dropdown">
            Student Level: 
            <BR>
            <select name="student_level">
              <option value="1">College</option>
              <option value="2">Senior High School</option>
            </select>
            </p>

            <!-- Username -->

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="student_username" class="form-control" placeholder="Enter Username">
            </div>



            <!-- Password -->
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="student_password" class="form-control" placeholder="Enter Password">
            </div>

            
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
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
    <h6 class="m-0 font-weight-bold text-dark">Student Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Student Profile 
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
    
        $connection = mysqli_connect("localhost","root","","plvdocx_db");
        $query = "SELECT  student_id, 
                          student_fn, 
                          student_mn,
                          student_ln, 
                          student_type, 
                          student_username, 
                          student_password,
                          student_level,
                          student_isMale,
                          isActive

                          from student_tbl 
        
                          inner join studenttype_tbl 
                          ON student_tbl.student_type = studenttype_tbl.studenttype_id

                          inner join studentlevel_tbl
                          on student_tbl.student_level = studentlevel_tbl.studentlevel_id

                          where isActive = 1;
        ";
        $query_run = mysqli_query($connection, $query);
    
    ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr class="text-center">
            <th> ID </th>
            <th> First Name </th>
            <th> Middle Name </th>
            <th> Last Name </th>
            <th> StudentType </th>
            <th> Username</th>
            <th> Password </th>
            <th> Manage </th>
          </tr>
        </thead>
        <tbody>
        <?php
        
            if(mysqli_num_rows($query_run) > 0){
                while($row = mysqli_fetch_assoc($query_run)){
                    ?>

                <tr class="text-center">
                    <td><?php echo $row['student_id']; ?></td>
                    <td><?php echo $row['student_fn']; ?></td>
                    <td><?php echo $row['student_mn']; ?></td>
                    <td><?php echo $row['student_ln']; ?></td>
                    <td><?php echo $row['student_type']; ?></td>
                    <td><?php echo $row['student_username']; ?></td>
                    <td><?php echo $row['student_password']; ?></td>
                    <td>
                    <div class="row">
                        <div class="d-flex justify-content-around">
                               
                          <form action="student_edit.php" method="post">
                              <input type="hidden" name="edit_id" value="<?php echo $row['student_id']; ?>">
                              <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
                          </form>                        
                        
                          <form action="studentCode.php" method="post">
                            <input type="hidden" name="delete_id" value="<?php echo $row['student_id']; ?>">
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
  

    

