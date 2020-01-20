<?php 

session_start() ;
$conn = mysqli_connect("localhost" , "root" ,"" ,"adminpanel") ;

if ($conn->connect_error){
    die("Database error: $conn->connect_error") ;
 }
