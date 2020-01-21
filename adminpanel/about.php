<?php include_once 'config/db.php' ; ?>
<?php include_once 'security.php' ; ?>

<?php include("includes/header.php") ?>
<?php include("includes/navbar.php") ?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">About Us Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" action="code.php">
        <div class="modal-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Entre title">
                </div>
                <div class="form-group">
                    <label for="subtitle">Sub title</label>
                    <input type="text" class="form-control" name="subtitle" placeholder="Entre subtitle">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" class="form-control" name="description" placeholder="Entre description"></textarea>
                </div> 
                <div class="form-group">
                    <label for="links">Links</label>
                    <input type="text" class="form-control" name="links" placeholder="Entre links">
                </div> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="about_save" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Table -->

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">About Us
            <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#addadminprofile">
                Add
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
            <table class="table table-bordered" width="100%" cellspacing="0">
                <?php 
                $query = "SELECT * FROM abouts" ;
                $query_run = mysqli_query($conn , $query) ;
                ?>
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Subtitle</th>
                    <th scope="col">Description</th>
                    <th scope="col">Links</th>
                    <th scope="col">EDIT</th>
                    <th scope="col">DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($query_run)) : ?>
                        <?php while($row = mysqli_fetch_assoc($query_run)) : ?>
                        <tr>
                            <td><?php echo $row['id'] ; ?></td>
                            <td><?php echo $row['title'] ; ?></td>
                            <td><?php echo $row['subtitle'] ; ?></td>
                            <td><?php echo $row['description'] ; ?></td>
                            <td><?php echo $row['links'] ; ?></td>
                            <td>
                                <form action="about_edit.php" method="POST">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
                                    <button type="submit" name="edit_btn" class ="btn btn-success">EDIT</button>
                                </form>
                            </td>
                            <td>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['id'] ; ?>">
                                    <button type="submit" name="delete_btn_about" class ="btn btn-danger">DELETE</button>
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