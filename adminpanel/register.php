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
                    <input type="confirmpassword" class="form-control" name="confirmpassword" placeholder="Confirm Password">
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
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Office</th>
                    <th scope="col">Age</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include("includes/scripts.php") ?>
<?php include("includes/footer.php") ?>
