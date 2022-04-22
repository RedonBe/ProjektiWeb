<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if(!isset($_SESSION['user']) || !isset($_SESSION['isAdmin'])){
   echo "<script>alert('You dont have permission to enter..!')</script>";
   echo "<script>window.location = 'index.php'</script>";
}else if(isset($_SESSION['isAdmin'])){
   $admin = $_SESSION['isAdmin'];
   if($admin != 1){
      echo "<script>alert('You are not an admin..!')</script>";
      echo "<script>window.location = 'index.php'</script>";
   }
}

include_once "navigation.php";
include_once 'dbconnection.php';
$obj = new Connection();
$connection = $obj->getConnection();
$sql = "Select * from user where isAdmin = 1;";
$result = mysqli_query($connection, $sql);
?>

<html>
<head>
<style>
         p{
                margin-left: 16%;
                margin-top: 10px;
                margin-bottom: 10px;
                font-family:san-serif;
                font-size: 2.5em;
                font-weight: 500;
            }
</style>

</head>
<body>
<div class="add_blogs"> 
   <p>
      Add Blogs:
   </p><br><br> <br><center>
<form action="insertBlogs.php" method="post" class="center">
                    <input type="text" name="name" placeholder="Title">
                    <input type="text" name="title" placeholder="Intro">
                    <input type="text" name="desc" placeholder="Description">
                    <input type="text" name="img" placeholder="Image source">
                    <select name="uid" id=""><?php
               
                     while($row=mysqli_fetch_array($result))
                     {
                     
                        echo "<option value='".$row['ID']."'>".$row['ID']."</option>";
                     }?></select>
                     <br>
                    <input type="submit" name="insert" value="Submit Blog" style="margin-top: 20px;">
                    </form>
                    </center>
                    
</div>
</body>

</html>
