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
include_once 'dbconnection.php';
$obj = new Connection();
$conn = $obj->getConnection();

$Name= $_POST['name'];
$Email= $_POST['email'];
$Message= $_POST['message'];
$sql1 = "INSERT INTO contactform(Name, Email, Message) VALUES('$Name', '$Email', '$Message')";
if(!mysqli_query($conn, $sql1)){
    echo'not insered';
}
echo "<script>window.location = 'contact.php'</script>";
// header("Location:https://programming-course.herokuapp.com/contact.php");
?>