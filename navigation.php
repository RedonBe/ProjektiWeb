<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if(!isset($_SESSION['user'])){
        echo "<script>alert('You dont have permission to enter..!')</script>";
        echo "<script>window.location = 'index.php'</script>";
    }
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if(isset($_POST['button'])){
        session_unset();
        session_destroy();
        echo "<script>window.location = 'index.php'</script>";
        // header("Location:https://programming-course.herokuapp.com/index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='icon' href='imgs/favicon.ico' type='image/x-icon'>
    <link rel="stylesheet" href="css/dashboard.css">
    <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <style>

    </style>
</head>

<body>
    <div class="header">
       <a href="nav_2.php"> <img src="./imgs/logo.png" alt="logo"></a>
        <ul>
            <li>
                <a href="index.php">
                    <img src="./imgs/home.png" style="width:40px; padding:0 50px; margin: 16px 0;" alt="user-icon"> 
                </a>
            </li>
            <li>
                <form action="navigation.php" method="POST">
                    <button id="button" name="button" type="submit" style="border:none; background:none"><a><img src="https://image.flaticon.com/icons/svg/2150/2150376.svg"  style="width:32px; padding-right:30px; margin:20px 0;"alt=""></a></button>
                </form>
            </li>
        </ul>
    </div> <br>
    <?php
        if(isset($_SESSION['isAdmin'])){
            $admin = $_SESSION['isAdmin'];
             if($admin == 1){
                echo " <div>
                <div class=\"dashboard-menu\" style=\"height:auto;\">
                    <ul>
                        <li>
                            <a href=\"admin_users.php\" class=\"users\">Users</a>
                        </li>
                        <br> <br>
                        <li>
                            <a >Blogs</a>
                            <button id=\"drop-down\" onclick=\"show_blogs()\"><img
                                    src=\"https://mbotaswbcw-flywheel.netdna-ssl.com/wp-content/uploads/sites/6/2019/06/white-down-arrow-png-2.png\"
                                    style=\"width:10px;\"></button>
                            <div id=\"drop-down-blogs\" style=\"display: none;\">
                                <ul style=\"height:50px;\">
                                    <li><a href=\"admin_blogs.php\">See Blogs</a></li>
                                    <li><a href=\"admin_add_blog.php\">Add Blogs</a></li>
                                </ul>
                            </div>
                        </li>
                        <br> <br>
                        <li>
                            <a>Contact Form</a>
                            <button id=\"drop-down\" style=\"margin-left:67px;\" onclick=\"show_contact()\"><img
                                    src=\"https://mbotaswbcw-flywheel.netdna-ssl.com/wp-content/uploads/sites/6/2019/06/white-down-arrow-png-2.png\"
                                    style=\"width:10px;\"></button>
                            <div id=\"drop-down-contact\" style=\"display: none;\">
                                <ul>
                                    <li><a href=\"admin_contactform.php\">See Contact Forms</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>";
            }
        }
    ?>
    <script>
        let count = 0;
        function show_blogs() {
            count++;
            if (count % 2 != 0) {
                document.getElementById("drop-down-blogs").style.display = "block"; 
            }
            if (count % 2 == 0) {
                document.getElementById("drop-down-blogs").style.display = "none";

            }
        }

        function show_contact() {
            count++;
            if (count % 2 != 0) {
                document.getElementById("drop-down-contact").style.display = "block";
            }
            if (count % 2 == 0) {
                document.getElementById("drop-down-contact").style.display = "none";

            }
        }

    </script>

</body>

</html>