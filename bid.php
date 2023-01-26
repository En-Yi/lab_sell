<!-- 下標 -->

<html>

<title>NE Chen 的拍賣網站 -- 商品下標</title>

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

   </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Blog Wrapper Start ##### -->
    <div class="blog-wrapper section-padding-100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <form action="home.php">
                        <input class="btn subscribe-btn" data-toggle="modal" type = "submit" value="回首頁" ><br><br>
                    </form>
                    <br>

    <?php
        $mid = $_POST['mid'];
        $link = mysqli_connect("localhost", "tobio", "u/3g0 zo vm/6", "tobio");
        $result = mysqli_query($link, "SELECT * FROM merchandise WHERE mid = $mid");

        if (isset($_POST['bid_button'])) {
          	
            $bid_price = $_POST['bid_price'];
            
            $present_price = "SELECT present_price FROM `merchandise` WHERE mid = '$mid'";
            $present_price_result = mysqli_fetch_array(mysqli_query($link, $present_price))[0];
            
            $buyer_id = mysqli_fetch_array(mysqli_query($link, "SELECT uid FROM user_login"))[0];
            $seller_id = mysqli_fetch_array(mysqli_query($link, "SELECT uid FROM merchandise WHERE mid = '$mid'" ))[0];
            date_default_timezone_set('Etc/GMT-8');
        	$date = date('Y/m/d H:i:s');
            
            # 如果下標價格大於現在價格，則成功下標
          	if($bid_price > $present_price_result){
          		$sql2 = "UPDATE `merchandise` SET `present_price` = '$bid_price' WHERE mid = '$mid'";
              	// execute query
              	mysqli_query($link, $sql2);
              	$new_bid = "INSERT INTO bid (mid, buyer_id, seller_id, price, bid_date) 
                            VALUES ('$mid', '$buyer_id', '$seller_id', '$bid_price', '$date')";
              	mysqli_query($link, $new_bid);
            }
              	
            $sql3 = "SELECT * FROM `merchandise` WHERE mid = '$mid'";
            $result3 = mysqli_query($link, $sql3);

            // <!-- Single Blog Area  -->
          	while ($row = mysqli_fetch_array($result3)) {
                $mid = $row['mid'];
                echo '<div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms">';
                    echo '<div class="row align-items-center">';
                        echo '<div class="col-12 col-md-6">';
                            echo '<div class="single-blog-thumbnail">';
              	                echo "<img src='images/".$row['img']."' width = 500>";
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="col-12 col-md-6">';
                            // <!-- Blog Content -->
                            echo '<div class="single-blog-content">';

                                echo '<div class="line"></div>';
                                echo "<p>".'商品id '.$row['mid']."</p>";
                              	echo "<p>".'商品名稱 '.$row['mname']."</p>";
                              	echo "<p>".'類別 '.$row['category']."</p>";
                                echo "<p>".'內容 '.$row['description']."</p>";
                                echo "<p>".'拍賣開始時間'.$row['start_date']."</p>";
                                echo "<p>".'拍賣結束時間'.$row['end_date']."</p>";
                                echo "<p>".'現在價格'.$row['present_price']."</p>";
                    
                            echo "</div>";
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }          
        }
         
        if($_POST['tmp'] == 0){
            while ($row = mysqli_fetch_array($result)) {
                $mid = $row['mid'];
                echo '<div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms">';
                    echo '<div class="row align-items-center">';
                        echo '<div class="col-12 col-md-6">';
                            echo '<div class="single-blog-thumbnail">';              
              	                echo "<img src='images/".$row['img']."' >";
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="col-12 col-md-6">';
                        // <!-- Blog Content -->
                            echo '<div class="single-blog-content">';
                                echo '<div class="line"></div>';

                                echo "<p>".'商品id '.$row['mid']."</p>";
                              	echo "<p>".'商品名稱 '.$row['mname']."</p>";
                              	echo "<p>".'類別 '.$row['category']."</p>";
                                echo "<p>".'內容 '.$row['description']."</p>";
                                echo "<p>".'拍賣開始時間'.$row['start_date']."</p>";
                                echo "<p>".'拍賣結束時間'.$row['end_date']."</p>";
                                echo "<p>".'現在價格'.$row['present_price']."</p>";
                
                            echo "</div>";
                        echo "</div>";
                    echo '</div>';
                echo '</div>';                
            }
        }

    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="site-main">
        <div class="container site-main-inner">
            <div class="content">
                <form method='POST' value= action="bid.php" enctype="multipart/form-data">
                    <label for="bid">下標價格</label>
                    <input type="text" id="bid_price" name="bid_price"><br>
                    <input type="hidden" name="mid" value=<?php echo $mid;?>>
                    <input type="hidden" name="tmp" value=1>
                  	<input class='btn subscribe-btn' data-toggle='modal' name="bid_button" type = 'submit' value='下標拍賣商品' >
                </form>
            </div>
        </div>
    </div>

    <!-- ##### Blog Wrapper End ##### -->

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
<br>
<br>


