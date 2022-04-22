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
include_once "navigation.php";
include_once "dbconnection.php";
?>
<html>
    <head>
    <link rel="stylesheet" href="css/dashboard.css">
    <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
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

<script>

$(document).ready(function(){
$('.delete').click(function(){
  var del = this;

  var deleteid = $(this).val();
  console.log("id",deleteid)

  var confirmalert = confirm("Are you sure?");
  if (confirmalert == true) {

     $.ajax({
       url: 'delete.php',
       type: 'POST',
       data: { id:deleteid },
       success: function(response){
        $(del).closest('tr').css('background','tomato');
        $(del).closest('tr').fadeOut(800,function(){
            $(this).remove();
            
        });

       }
     });
  }
});
});




</script>
<div class="blogs">
    <p>Here you can see and delete blogs:</p>
                    <br>
                    <?php 
                     include_once 'showBlogs.php';
                     $show = new showBlogs();
                     $result = $show->showBlogs();
         
                     echo "
                     <table class='center' id='blog_table' >
                     <tr>
                     <th>ID</th>
                     <th>Name</th>
                     <th>Title</th>
                     <th>Description</th>
                     <th>Image</th> <br>
                     <th>User Id</th>
                     <th>Delete</th>
                     </tr>";
         
                     while($row=mysqli_fetch_array($result))
                     {
                         
                     echo "<div class='datas''><tr><td>
                     ".$row['ID']."</td><td>".$row['Name']."</td> 
                     <td>".$row['Titulli2']."</td> 
                     <td>".$row['Description']."</td>
                      <td>".$row['Image']."</td>
                      <td>".$row['User_id']." 
                      <td> <button class='delete' type='button' value=".$row['ID']."> Delete </td>";
                    //   <td> <form method='post' action='delete.php'> <input type='submit'  name=".$row['ID']."   style='background-color:#B22222; color:white;' value='Delete'></td></form> </tr></div>";
         
         }
         echo "</table>";?>
            </div>
</body>
</html>
