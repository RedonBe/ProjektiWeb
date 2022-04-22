<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if(!isset($_SESSION['user'])){
    echo "<script>alert('You dont have permission to enter..!')</script>";
    echo "<script>window.location = 'index.php'</script>";
}else if(isset($_SESSION['isAdmin'])){
    $admin = $_SESSION['isAdmin'];
    if($admin != 1){
       echo "<script>alert('You are not an admin..!')</script>";
       echo "<script>window.location = 'index.php'</script>";
    }
}
include_once "dbconnection.php";

$obj = new Connection();
$conn = $obj->getConnection();

$user_id= $_POST['id'];
$is_admin= $_POST['isAdmin'];
 echo $user_id;
$sql1 = "UPDATE user SET isAdmin = $is_admin WHERE user.ID =$user_id";
$change = mysqli_query($conn, $sql1);
if(!mysqli_query($conn, $sql1)){
    echo'not insered';
}

?>