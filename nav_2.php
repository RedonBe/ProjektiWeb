<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if(!isset($_SESSION['user'])){
    echo "<script>alert('You dont have permission to enter..!')</script>";
    echo "<script>window.location = 'index.php'</script>";
}
include_once "navigation.php";
?>

<html>

    <head>
        <link rel='icon' href='imgs/favicon.ico' type='image/x-icon'>
        <style>
            h1{
                margin: 40px 0;
                text-align:center;
                font-size: 2.5em;
                font-weight: 500;
                color: black;
                display: block;
                font-family: sans-serif;
            }
        </style>
    </head>
    <body>
        <h1><strong>Welcome</strong></h1>
        <?php
            if(isset($_SESSION['isAdmin'])){
                $admin = $_SESSION['isAdmin'];
                if($admin != 1){
                    echo "<h1><strong>Since you're not an admin in this page you can only use the logout option</h1></strong>";
                }else{
                    echo "<h1><strong>Wanna do some changes? Click on the blog part to entertain your users with a new blog.</strong></h1>";
                }
            }
        ?>                
    </body>
</html>