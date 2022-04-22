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

$id= $_POST['id'];

  // Check record exists
  $checkRecord = mysqli_query($conn,"SELECT * FROM blogs WHERE id=".$id);
  $totalrows = mysqli_num_rows($checkRecord);
  if($totalrows > 0){
    // Delete record
    $query = "DELETE FROM blogs WHERE id=".$id;
    mysqli_query($conn,$query);
    echo 1;
  }

?>