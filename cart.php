<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

    require_once ('component.php');
    require_once ('dbconnection.php');


    $database = new Connection();
    $database->getConnection();

    if(isset($_POST['remove'])){
        if ($_GET['action'] == 'remove'){
            foreach($_SESSION['cart'] as $key=>$value){
                if($value['productid']==$_GET['ID']){
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel='icon' href='imgs/favicon.ico' type='image/x-icon'>
    <link rel="stylesheet" href="css/cart.css"/>
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
                    <li id="BlogNav">
                        <a href="blog.php">Blog</a>
                    </li>
                    <li id="AboutNav">
                        <a href="about.php">About Us</a>
                    </li>
                    <li id="ContactNav">
                        <a href="contact.php">Contact</a>
                    </li>
                    <li id="CartNav">
                        <i class="fas fa-shopping-cart"></i> Cart
                        <?php
                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text light\">0</span>";
                        }
                        ?>
                    </li>
                    <?php
                        if(isset($_SESSION['user'])){
                            $user = $_SESSION['user'];
                            echo "
                            <li id=\"signin\">
                                <a href=\"nav_2.php\">$user</a>
                            </li>
                            ";
                        }else{
                            echo "
                            <li id=\"signin\">
                                <a href=\"login.php\">SIGN IN</a>
                            </li>
                            ";
                        }
                    ?>
                    
                </ul>
            </div>
        </div>
    </div>
    <div class="wrapper pageLayout hasSidebar Dynamic">
        <div class="content">
            <div class="dynamicPageInfo block">
                <?php
                    $total=0;
                    if(isset($_SESSION['cart'])){
                        if(count($_SESSION['cart']) != 0){
                            $course_id=array_column($_SESSION['cart'],'productid');
                            $result=$database->getData();
                            while($row=mysqli_fetch_assoc($result)){
                                foreach ($course_id as $id){
                                    if ($row['ID'] == $id){
                                        cartElement($row['course_img'], $row['course_name'], $row['course_description'], $row['course_price'],$row['ID']);
                                        $total=$total+(int)$row['course_price'];
                                    }
                                }                        
                            }
                        }else{
                            echo "<h5> Cart is empty </h5>";
                        }
                    }else {
                        echo "<h5> Cart is empty </h5>";
                    }
                     
                ?>
            </div>
        </div>
        <div class="sidebar ">
            <div class="courseLoactions block">
                <div class="takeCourse">
                    <h6>Price Details</h6>
                    <hr>
                    <div class="price-details">
                        <div>
                            <div class="divflex">
                                <?php
                                    if(isset($_SESSION['cart'])){
                                        $count=count($_SESSION['cart']);
                                        echo "<h2>Price ($count items)</h2>";
                                    }else{
                                        echo "<h2>Price (0 items)</h2>";
                                    }
                                ?>
                                <h2><?php echo $total."$"?></h2>
                            </div>  
                            <hr>                          
                            <div class="divflex">
                                <h2>Amount Payable</h2>
                                <h2><?php echo $total."$"?></h2>
                            </div>
                            <hr>
                            <div class="checkBttn"><button>Checkout</button></div>                            
                        </div>
                    </div>
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
                    <a href="courses.php" id="footerCourses">Courses</a>
                </li>
                <li>
                    <a href="blog.php" id=footerBlog>Blog</a>
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
</body>
</html>
