<?php include_once 'config/db.php' ; ?>
<?php include_once 'security.php' ; ?>
<?php include("includes/header.php") ?>
<?php include("includes/navbar.php") ?>


<!-- Modal -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add admin data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="code.php">
        <div class="modal-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" class="form-control" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div> 
                <div class="form-group">
                    <label for="confirmpassword">Confirm password</label>
                    <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password">
                </div> 
                <input type="hidden" name="usertype" value="admin">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Table -->

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Admin Profile
            <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#addadminprofile">
                Add Admin Profile
            </button>
            </h6>
        </div>
        <div class="card-body">

        <?php if(isset($_SESSION['success']) && $_SESSION['success']!=''){
            echo '<div class="alert alert-success" role="alert">
            '.$_SESSION['success'].'
          </div>' ;
            unset($_SESSION['success']) ;
        } ?>

        <?php if(isset($_SESSION['status']) && $_SESSION['status']!=''){
            echo '<div class="alert alert-danger" role="alert">
            '.$_SESSION['status'].'
          </div>' ;
            unset($_SESSION['status']) ;
        } ?>
            <div class="table-responsive">

            <?php 
            $conn = mysqli_connect('localhost' , 'root' , '' ,'adminpanel'); 
            $query = "SELECT * FROM register" ;
            $query_run = mysqli_query($conn , $query) ;
            ?>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Usertype</th>
                    <th scope="col">EDIT</th>
                    <th scope="col">DELETE</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (mysqli_num_rows($query_run)) : ?>
                    <?php while($row = mysqli_fetch_assoc($query_run)) : ?>
                    <tr>
                        <td><?php echo $row['id'] ; ?></td>
                        <td><?php echo $row['username'] ; ?></td>
                        <td><?php echo $row['email'] ; ?></td>
                        <td><?php echo $row['password'] ; ?></td>
                        <td><?php echo $row['usertype'] ; ?></td>
                        <td>
                        <form action="register_edit.php" method="POST">
                          <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
                          <button type="submit" name="edit_btn" class ="btn btn-success">EDIT</button>
                        </form>
                        </td>
                        <td>
                        <form action="code.php" method="POST">
                          <input type="hidden" name="delete_id" value="<?php echo $row['id'] ; ?>">
                          <button type="submit" name="delete_btn" class ="btn btn-danger">DELETE</button>
                        </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php endif ;?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include("includes/scripts.php") ?>
<?php include("includes/footer.php") ?>
