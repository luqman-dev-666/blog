<?php include_once 'config/db.php';?>

<?php 


if(isset($_POST['login_btn'])){

$email = $_POST['email'] ;
$password = $_POST['password'] ;

$query = "SELECT * FROM register WHERE email='$email' AND password='$password' LIMIT 1" ;
$query_run = mysqli_query($conn , $query); 
$usertypes = mysqli_fetch_array($query_run);

    if($usertypes['usertype'] == 'admin'){
        $_SESSION['username'] = $email ;
        header('location:index.php') ; 
    }else if($usertypes['usertype'] == 'user'){
        $_SESSION['username'] = $email ;
        header('location:../index.php') ; 
    }else {
        $_SESSION['status'] = "Email / Password invalid" ;
        header('location:login.php') ;
    }
}
