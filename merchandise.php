<!-- 商品頁面 -->
<!DOCTYPE html>
<html>

<title>NE Chen 的拍賣網站 -- 商品</title>

<?php
    include('css_template.php'); //css 模板
?>
    <!-- Logo Area -->
        <div class="logo-area text-center">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <a href="home.php" class="original-logo"><img src="img/core-img/logo.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>

    <body>
    <!-- ##### Blog Wrapper Start ##### -->
    <div class="blog-wrapper section-padding-100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <form action="home.php">
                        <input class="btn subscribe-btn" data-toggle="modal" type = "submit" value="回首頁" ><br><br>
                    </form>

    <?php
        // pass header
        ob_start();
        $cat = $_GET['cat'];
        date_default_timezone_set('Etc/GMT-8');
        $date = date('Y/m/d H:i:s');
        echo $date;
        $db = mysqli_connect("localhost", "tobio", "u/3g0 zo vm/6", "tobio");
        $result = mysqli_query($db, "SELECT * FROM merchandise WHERE category = '$cat' AND start_date < '$date' AND end_date > '$date' " );

    ?>
    
    <h3><?php echo $cat;?> 商品區</h3>

    <!-- Single Blog Area  -->
    <?php

        while ($row = mysqli_fetch_array($result)) {
            $mid = $row['mid'];
            echo '<div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms">';
                echo '<div class="row align-items-center">';
                    echo '<div class="col-12 col-md-6">';
                        echo '<div class="single-blog-thumbnail">';
                            echo "<img src='images/".$row['img']."' class = 'image'>";
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="col-12 col-md-6">';
                        // <!-- Blog Content -->
                        echo '<div class="single-blog-content">';
                            echo '<div class="line"></div>';
                            echo "<p>".'商品 id     '.$mid."</p>";  	
                            echo "<p>".'商品名稱    '.$row['mname']."</p>";
                            echo "<p>".'商品內容        '.$row['description']."</p>";
                            echo "<p>".'拍賣開始時間 '.$row['start_date']."</p>";
                            echo "<p>".'拍賣結束時間 '.$row['end_date']."</p>";
                            echo "<p>".'現在價格     '.$row['present_price']."</p>";
                            echo "<form method='POST'  action='bid.php'>".
                                "<input type='hidden' name='mid' value='$mid'>".
                                "<input type='hidden' name='tmp' value='0'>".
                                "<input class='btn subscribe-btn' data-toggle='modal'  type = 'submit' value='下標' >".
                                "</form>";

                            echo "<p>"."<form method='POST'  action='message.php'>".
                                "<input type='hidden' name='mid' value='$mid'>".
                                "<input type='hidden' name='tmp' value='0'>".
                                "<input class='btn subscribe-btn' data-toggle='modal'  type = 'submit' value='賣方留言板' >".
                                "</form>"."</p>";
                            echo "</div>";
                        echo '</div>';
                echo '</div>';
            echo '</div>';
            
        }
    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Wrapper End ##### -->
    </body>
    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
