<?php include_once 'config/db.php';?>

<?php 


//////////////////////////////////////////////// Register page ////////////////////////////////////////////////////////////

if(isset($_POST['registerbtn'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];

    if ($password === $cpassword){

        $query = "INSERT INTO register (username , email , password , usertype) VALUES ('$username' , '$email' ,'$password' ,'$usertype') " ;
    
        $query_run = mysqli_query($conn , $query) ;

        if($query_run) {
            $_SESSION['success'] = "Admin Profile Added" ;
            header('location:register.php');
        }else{
            $_SESSION['status'] = "Admin Profile Not Added" ;
            header('location:register.php');
        }
    }else{
        $_SESSION['status'] = "Password and Confirm Password do not match" ;
        header('location:register.php');
    }
}

if (isset($_POST['updatebtn'])){
    
    $id = $_POST['edit_id'] ;
    $username = $_POST['edit_username'] ;
    $email = $_POST['edit_email'] ;
    $password  = $_POST['edit_password'] ;
    $usertype = $_POST['update_usertype'] ;

    $query = "UPDATE register SET username = '$username' ,email = '$email' , password = '$password' , usertype ='$usertype' WHERE id='$id'" ;

    $result = mysqli_query($conn , $query) ;
    $_SESSiON['success'] = "Your Data Is Updated";

    if($result){
        $_SESSiON['success'] = "Your Data Is Updated" ;
        header('location:register.php') ;
    }else{
        $_SESSiON['status'] = "Your Data is not Updated" ;
        header('location:register.php') ;
    }
}

if(isset($_POST['delete_btn'])){
    $id = $_POST['delete_id'] ;
    $query = "DELETE FROM register WHERE id='$id' " ;
    $result = mysqli_query($conn , $query) ;
    if($result){
        $_SESSION['success'] = "DELETED" ;
        header('location:register.php') ;
    }else{
        $_SESSION['status'] = "Not Deleted" ;
        header('location:register.php') ;
    }
}


////////////////////////////////////////////////// About page ////////////////////////////////////////////////////////////

if(isset($_POST['about_save'])){
    $title = $_POST['title'] ;
    $subtitle = $_POST['subtitle'] ;
    $description = $_POST['description'] ;
    $links = $_POST['links'] ;

    $query = "INSERT INTO abouts (title,subtitle,description,links) VALUES ('$title' , '$subtitle' ,'$description' , '$links')" ;
    $query_run = mysqli_query($conn , $query) ;
    if($query_run){
        $_SESSION['success'] = "About us Added";
        header('location:about.php');
    }else{
        $_SESSION['status'] = "About us Not Added";
        header('location:about.php');
    }
}

if (isset($_POST['updatebtn_about'])){
    
    $id = $_POST['id'] ;
    $title = $_POST['title'] ;
    $subtitle = $_POST['subtitle'] ;
    $description  = $_POST['description'] ;
    $links = $_POST['links'] ;

    $query = "UPDATE abouts SET title = '$title' ,subtitle = '$subtitle' , description = '$description' , links ='$links' WHERE id='$id'" ;

    $result = mysqli_query($conn , $query) ;
    
    if($result){
        $_SESSiON['success'] = "Your Data Is Updated" ;
        header('location:about.php');
    }else{
        $_SESSiON['status'] = "Your Data is not Updated" ;
        header('location:about.php');
    }
}

if(isset($_POST['delete_btn_about'])){
    $id = $_POST['delete_id'] ;
    $query = "DELETE FROM abouts WHERE id='$id' " ;
    $result = mysqli_query($conn , $query) ;
    if($result){
        $_SESSION['success'] = "DELETED" ;
        header('location:about.php') ;
    }else{
        $_SESSION['status'] = "Not Deleted" ;
        header('location:about.php') ;
    }
}

