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
                    // Student table
                    $query = "SELECT * FROM student_tbl WHERE student_id='$id'";
                    $query_run = mysqli_query($connection, $query);

                    foreach($query_run as $row){
                        ?>
                            <form action="studentCode.php" method="POST">

                            <input type="hidden" name="edit_id" value="<?php echo $row['student_id'] ?>">
                            <!-- add form group check the student.php Modal -->



                                <!-- Student ID -->
                                <div class="form-group">
                                    <label> Student ID </label>
                                    <input type="text" name="student_id" value="<?php echo $row['student_id'] ?>" class="form-control" placeholder="Enter Student ID">
                                </div>
                                <!-- First Name -->
                                <div class="form-group">
                                    <label> First Name </label>
                                    <input type="text" name="student_fn" value="<?php echo $row['student_fn'] ?>" class="form-control" placeholder="Enter First Name">
                                </div>
                                <!-- Middle Name -->
                                <div class="form-group">
                                    <label>Middle Name</label>
                                    <input type="text" name="student_mn" value="<?php echo $row['student_mn'] ?>" class="form-control" placeholder="Enter Middle Name">
                                </div>
                                <!-- Last Name -->
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="student_ln" value="<?php echo $row['student_ln'] ?>" class="form-control" placeholder="Enter Last Name">
                                </div>
                                <!-- Dropdown Menu -->

                                <!-- Connect this one to database usertype -->
                                <div class="form-group">
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
                                </div>
                            
                                <div class="form-group">
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
                                </div>

                                <div class="form-group">
                                    <p class="dropdown">
                                    Student Level: 
                                    <BR>
                                    <select name="student_level">
                                    <option value="1">College</option>
                                    <option value="2">Senior High School</option>
                                    </select>
                                    </p>
                                </div>

                                <div class="form-group">
                                    <label> Email </label>
                                    <input type="text" name="student_username" value="<?php echo $row['student_email'] ?>" class="form-control" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <label> Username </label>
                                    <input type="text" name="student_username" value="<?php echo $row['student_username'] ?>" class="form-control" placeholder="Enter Username">
                                </div>
                               
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="student_password" value="<?php echo $row['student_password'] ?>" class="form-control" placeholder="Enter Password">
                                </div>
                                <a href="student.php" class="btn btn-danger"> CANCEL </a>
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
  