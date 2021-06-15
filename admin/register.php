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
      <form action="code.php" method="POST">

        <div class="modal-body">
            <!-- Employee ID -->
            <div class="form-group">
                <label> Employee ID </label>
                <input type="text" name="employee_id" class="form-control" placeholder="Enter Employee ID">
            </div>
            <!-- First Name -->
            <div class="form-group">
                <label> First Name </label>
                <input type="text" name="employee_fn" class="form-control" placeholder="Enter First Name">
            </div>
            <!-- Middle Name -->
            <div class="form-group">
                <label>Middle Name</label>
                <input type="text" name="employee_mn" class="form-control" placeholder="Enter Middle Name">
            </div>
            <!-- Last Name -->
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="employee_ln" class="form-control" placeholder="Enter Last Name">
            </div>

            <!--Dropdown Menu for Gender-->
            <p class="dropdown">
            Gender: 
            <BR>
            <select name="employee_isMale">
              <option value="1">Male</option>
              <option value="0">Female</option>
            </select>
            </p>
            <!-- Dropdown Menu -->
            <p class="dropdown">
            User Type: 
            <BR>
            <select name="employee_type">
              <option value="employeetype">Employee Type</option>
              <option value="1">Admin</option>
              <option value="2">Registrar</option>
              <option value="3">Cashier</option>
            </select>
            </p>

            <!-- Email -->

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="employee_ln" class="form-control" placeholder="Email">
            </div>


            <!-- Username -->

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="employee_username" class="form-control" placeholder="Enter Username">
            </div>



            <!-- Password -->
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="employee_password" class="form-control" placeholder="Enter Password">
            </div>

            
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn_admin" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-dark">Admin Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile 
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
        $query = "SELECT  employeeType_name, 
                          employee_id, 
                          employee_ln,
                          employee_fn, 
                          employee_mn, 
                          employee_username, 
                          employee_password,
                          isActive 

                          from employee_tbl 
        
                          inner join employeetype_tbl 

                          ON employee_tbl.employee_type = employeetype_tbl.employeeType_id
                          
                          WHERE isActive = 1;
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
            <th> Email </th>
            <th> EmployeeType </th>
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
                    <td><?php echo $row['employee_id']; ?></td>
                    <td><?php echo $row['employee_fn']; ?></td>
                    <td><?php echo $row['employee_mn']; ?></td>
                    <td><?php echo $row['employee_ln']; ?></td>
                    <td><?php echo $row['employeeType_name']; ?></td>
                    <td><?php echo $row['employee_username']; ?></td>
                    <td><?php echo $row['employee_password']; ?></td>
                    <td>
                    <div class="row">
                        <div class="d-flex justify-content-around">
                          <form action="register_edit.php" method="post">
                              <input type="hidden" name="edit_id" value="<?php echo $row['employee_id']; ?>">
                              <button type="submit" name="edit_btn" class="btn btn-success ">EDIT</button>
                          </form>  
                          <form action="code.php" method="post">
                            <input type="hidden" name="delete_id" value="<?php echo $row['employee_id']; ?>">
                            <button type="submit" name="delete_btn" class="btn btn-danger ">DELETE</button>
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
  

    

