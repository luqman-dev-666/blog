<?php include_once 'config/db.php';?>

<?php 

if(isset($_POST['registerbtn'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'] ;
    $cpassword = $_POST['confirmpassword'];

    if ($password === $cpassword){

        $query = "INSERT INTO register (username , email , password ) VALUES ('$username' , '$email' ,'$password') " ;
    
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

    $query = "UPDATE register SET username = '$username' ,email = '$email' , password = '$password' WHERE id='$id'" ;
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

if(isset($_POST['login_btn'])){

    $email = $_POST['email'] ;
    $password = $_POST['password'] ;

    $query = "SELECT * FROM register WHERE email='$email' AND password='$password' LIMIT 1" ;
    $query_run = mysqli_query($conn , $query); 

    if(mysqli_fetch_array($query_run)){
        $_SESSION['username'] = $email ;
        header('location:index.php') ; 
    }else {
        $_SESSION['status'] = "Email / Password invalid" ;
        header('location:login.php') ;
    }
}
