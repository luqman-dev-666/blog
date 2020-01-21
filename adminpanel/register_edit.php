<?php include_once 'config/db.php' ; ?>
<?php include_once 'security.php' ; ?>
<?php include("includes/header.php") ?>
<?php include("includes/navbar.php") ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Admin Profile</h6>
        </div>
        <div class="card-body">
            <?php 
                if(isset($_POST['edit_btn'])){

                    $id = $_POST['edit_id'] ;
                    $query = "SELECT * FROM register WHERE id='$id' LIMIT 1";
                    $result = mysqli_query($conn , $query);

                    if (mysqli_num_rows($result)){
                        $user = mysqli_fetch_assoc($result);
                    }
                }
            ?>
                    <form action="code.php" method="POST">
                        <input type="hidden" name="edit_id" value="<?php echo $user['id'];?>">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="username" class="form-control" name="edit_username" value ="<?php echo $user['username'] ?>" ;placeholder="Username">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="edit_email" value ="<?php echo $user['email'] ?>" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="edit_password" value ="<?php echo $user   ['password'] ;?>" placeholder="Password">
                        </div> 
                        <div class="form-group">
                            <label for="Usertype">Usertype</label>
                            <select name="update_usertype" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>

                        <a href="register.php" class="btn btn-danger">Cancel</a>
                        <button class="btn btn-primary" type="submit" name="updatebtn">Update</button>
                    </form>
            </div>
    </div>
</div>

<?php include("includes/scripts.php") ?>
<?php include("includes/footer.php") ?>
