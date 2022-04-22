
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    require_once ('component.php');
    require_once ('dbconnection.php');


    $database = new Connection();
    $database->getConnection();
?>

<?php
    require_once ('component.php');
    if(isset($_POST['button'])){
        if(login()){
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $email = $_POST['email'];    
            $sql="select * from user WHERE email like '$email'";
            $connection = $database->getConnection();
            $result = mysqli_query($connection, $sql);

            if (!$result) {
                die('Invalid query: ' . mysqli_error($result));
            }

            $row = mysqli_fetch_array($result);



            $_SESSION['isAdmin'] = $row['isAdmin'];

            $_SESSION['user'] = $email;

            echo "<script>window.location = 'index.php'</script>";
            // header("Location:https://programming-course.herokuapp.com/index.php");
        }else{
            echo "<script>alert('Invalid Email address or Password!')</script>";
        }
    }
?>


<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel='icon' href='imgs/favicon.ico' type='image/x-icon'>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
</head>
<body>
    <div id="header">
        <div class="header wrapper">
            <div class="logo">
                <a href="index.php">
                    <img src="imgs/pgcourse.png" alt="">
                </a>
            </div>
            <div class="navigation-menu">
                <ul class="Dynamic Contact">
                    <li id="HomeNav">
                        <a href="index.php">Home</a>
                    </li>
                    <li id="CoursesNav">
                        <a href="courses.php">Courses</a>
                    </li>
                    <li id="AboutNav">
                        <a href="about.php">About Us</a>
                    </li>
                    <li id="ContactNav">
                        <a href="contact.php">Contact</a>
                    </li>
 
                    <li id="CartNav">
                    <a href="cart.php"><i class="fas fa-shopping-cart"></i> Cart
                    <?php

                    if (isset($_SESSION['cart'])){
                        $count = count($_SESSION['cart']);
                        echo "<span id=\"cart_count\" class=\"text light\">$count</span>";
                    }else{
                        echo "<span id=\"cart_count\" class=\"text light\">0</span>";
                    }

                    ?>
                    </a>
                    
                    </li>
                    <li id="signin">
                            <a href="login.php">SIGN IN</a>
                    </li>
                </ul>
            </div>
        </div>
    </div> 

    <div class="wrapper extraLayout">
        <div class="dynamicPageInfo block">
            <div class="container">
                <h1>Login:</h1>
                <div class="forma">
                    <form action="login.php"  method="POST" name="form1">
                        <div class="second">
                            <label for="email">Enter your e-mail:</label><br>
                            <input type="email" id="email" name="email" placeholder="Email" class="contact-form-field">
                        </div>
                        <div class="third">
                            <label for="password">Enter your password:</label><br>
                            <input type="password" id="password" name="password" placeholder="Password" class="contact-form-field">
                        </div>
                        <input id="button" name="button" type="submit" value="Login" onclick="ValidateEmail(document.form1.email); CheckPassword(document.form1.password)">
                    </form>
                    <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
                </div>
            </div>
        </div>
    </div>
    <div id="footer" data-name="contacts">
        <div class="footerTitle">
            <p>Learn Playing. Play Learning</p>
        </div>
        <div class="footerContent wrapper">
            <div class="socialCounts">
                <a class="footerSocial" href="https://twitter.com" target="_blank">
                    <div class="footerTwitter">
                        <i class="fab fa-twitter"></i>
                    </div>
                    <span>@PrgorammingCourse</span>
                </a>
                <a class="footerSocial" href="http://www.facebook.com" target="_blank">
                    <div class="footerFacebook">
                        <i class="fab fa-facebook-f"></i>
                    </div>
                    <span>PrgorammingCourse</span>
                </a>
            </div>
            <div class="about">
                <div class="logoFooter">
                    <img src="imgs/logo.png" alt="">
                </div>
                <div>
                    <p>PrgorammingCourse Inc.</p>
                    <address>
    <br />Shkabaj
    <br />10000, Prishtine, Kosovo</address>
                </div>
                <button>Email Us</button>
            </div>
            <div class="footerMenu Home">
                <ul>
                    <li>
                        <a href="index.php" id="footerHome">Home</a>
                    </li>
                    <li>
                        <a href="#">Features</a>
                    </li>
                    <li>
                        <a href="courses.php" id="footerCourses">Courses</a>
                    </li>
                    <li>
                        <a href="about.php" id="footerAbout">About Us</a>
                    </li>
                    <li>
                        <a href="contact.php" id="footerContacts">Contact</a>
                    </li>
                    <li>
                        <a href="#" id="footerPrivacy-Policy">Terms of Use</a>
                    </li>
                    <li>
                        <a href="#" id="faq">FAQ</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="copyright">
        © 2021 Programming Course, Inc. All rights reserved.<br><a href="https://github.com/RedonBe/ProjektiWeb.git">Repository: Redon Begu, Albin Shabani</a>
        </div>

        <script src="js/main.js"></script>
</body>
</html>