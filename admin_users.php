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
 <div id="users_div" style="display:block;">
            <p>Here are the users that have been registered on the page:</p>
            <?php
            include_once 'showUsers.php';
            $show = new showUsers();
            $result = $show->showUs();
            echo "
            <table class='center' id='user_table' text-align:center;' >
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th> <br>
            <th>User role</th>
            <th>Is Admin</th>
            </tr>
            ";

            while($row=mysqli_fetch_array($result))
            {

                $checked = "";
                if($row['isAdmin'] == 1){
                    $checked = "checked";
                }
            echo "<tr><td>".$row['ID']."</td><td>".$row['Name']."</td> <td>".$row['Email']."</td> <td>".$row['Password']."</td><td>".$row['isAdmin']."</td><td><input name='isAdmin' " .$checked." value=".$row['ID']." type='checkbox' class='adminCheck'></td>  </tr>";

}
echo "</table>";
?>
</div>
</body>
<script>
 $('input[name=isAdmin]').click(function(){
            if($(this).is(':checked')){
                $.post( "admin.php", { id: $(this).val(), isAdmin: 1 } );
                console.log($(this).val());
    } else {
                $.post( "admin.php", { id: $(this).val(), isAdmin: 0 } );
            }
        });

        $(function() {
        $('input[name=isAdmin]').change(function() {
            window.location.reload();
        });
    });</script>
</html>
