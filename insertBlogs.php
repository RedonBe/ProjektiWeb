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
$connection = $obj->getConnection();

$Name= $_POST['name'];
$Intro = $_POST['title'];
$Desc= $_POST['desc'];
$Img= $_POST['img'];
$Uid= $_POST['uid'];
$sql1 = "INSERT INTO blogs(Name, Titulli2, Description, Image, User_id) VALUES('$Name', '$Intro', '$Desc', '$Img', '$Uid')";
if(!mysqli_query($connection, $sql1)){
    echo'not insered';
}
echo "<script>window.location = 'admin_blogs.php'</script>";
// header("Location:https://programming-course.herokuapp.com/admin_blogs.php");


?>