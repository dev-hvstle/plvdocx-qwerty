<?php 
    session_start();
    include('includes/header.php');
    include('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Admin Profile</h6>
        </div>

        <div class="card-body">
            <?php 
                $connection = mysqli_connect("localhost","root","","plvdocx_db");
                if(isset($_POST['edit_btn'])){
                    $id = $_POST['edit_id'];
            
                    $query = "SELECT * FROM employee_tbl WHERE employee_id='$id'";
                    $query_run = mysqli_query($connection, $query);

                    foreach($query_run as $row){
                        ?>
                            <form action="code.php" method="POST">

                            <input type="hidden" name="edit_id" value="<?php echo $row['employee_id'] ?>">
                            <!-- add form group check the register.php Modal -->

                                <!-- First Name -->
                                <div class="form-group">
                                    <label> First Name </label>
                                    <input type="text" name="employee_fn" value="<?php echo $row['employee_fn'] ?>" class="form-control" placeholder="Enter First Name">
                                </div>
                                <!-- Middle Name -->
                                <div class="form-group">
                                    <label>Middle Name</label>
                                    <input type="text" name="employee_mn" value="<?php echo $row['employee_mn'] ?>" class="form-control" placeholder="Enter Middle Name">
                                </div>
                                <!-- Last Name -->
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="employee_ln" value="<?php echo $row['employee_ln'] ?>" class="form-control" placeholder="Enter Last Name">
                                </div>

                                <!--Dropdown Menu for Gender-->
                                <p class="dropdown">
                                Gender: 
                                <BR>
                                <select name="isMale">
                                <option value="1">Male</option>
                                <option value="0">Female</option>
                                </select>
                                </p>
                                <!-- Dropdown Menu -->
                                <p class="dropdown">
                                User Type: 
                                <BR>
                                <select name="employee_type">
                                <option value="1">Admin</option>
                                <option value="2">Registrar</option>
                                <option value="3">Cashier</option>
                                </select>
                                </p>


                                <!-- Username -->

                                <div class="form-group">
                                    <label> Username </label>
                                    <input type="text" name="employee_username" value="<?php echo $row['employee_username'] ?>" class="form-control" placeholder="Enter Username">
                                </div>



                                <!-- Password -->
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="employee_password" value="<?php echo $row['employee_password'] ?>" class="form-control" placeholder="Enter Password">
                                </div>

                                
                               
                                
                                <a href="register.php" class="btn btn-danger"> CANCEL </a>
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
  