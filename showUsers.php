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
class showUsers{

        
        public function showUs(){
            
        $obj = new Connection();
        $connection = $obj->getConnection();
        $sql='select * from user';
        $result = mysqli_query($connection, $sql);
        if(!$result){
             die("Connection failed" . mysqli_error($connection)); }
             return $result;
        }
        
    }
?>