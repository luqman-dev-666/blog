<?php 

session_start() ;

$connection = mysqli_connect("localhost" , "root" ,"" ,"adminpanel") ;

if(isset($_POST['registerbtn'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'] ;
    $cpassword = $_POST['confirmpassword'];

    if ($password === $cpassword){

        $query = "INSERT INTO register (username , email , password ) VALUES ('$username' , '$email' ,'$password') " ;
    
        $query_run = mysqli_query($connection , $query) ;

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