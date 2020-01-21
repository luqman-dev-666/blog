<?php include_once 'config/db.php' ; ?>
<?php include_once 'security.php' ; ?>
<?php include("includes/header.php") ?>
<?php include("includes/navbar.php") ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit About Us</h6>
        </div>
        <div class="card-body">

            <?php 
                if(isset($_POST['edit_btn'])){

                    $id = $_POST['edit_id'] ;
                    $query = "SELECT * FROM abouts WHERE id='$id' LIMIT 1";
                    $result = mysqli_query($conn , $query);

                    if (mysqli_num_rows($result)){
                        $about = mysqli_fetch_assoc($result);
                    }
                }
            ?>
                    <form action="code.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $about['id'];?>">

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="<?php echo $about['title'];?>">
                        </div>
                        <div class="form-group">
                            <label for="subtitle">Sub title</label>
                            <input type="text" class="form-control" name="subtitle" value="<?php echo $about['subtitle'];?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" name="description" ><?php echo $about['description'];?></textarea>
                        </div> 
                        <div class="form-group">
                            <label for="links">Links</label>
                            <input type="text" class="form-control" name="links" value="<?php echo $about['links'];?>">
                        </div> 

                        <a href="about.php" class="btn btn-danger">Cancel</a>
                        <button class="btn btn-primary" type="submit" name="updatebtn_about">Update</button>
                    </form>
            </div>
    </div>
</div>

<?php include("includes/scripts.php") ?>
<?php include("includes/footer.php") ?>
