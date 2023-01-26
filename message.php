<!-- 商品的留言板 -->

<html>

<title>NE Chen 的拍賣網站 -- 商品留言板</title>

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
	
	echo "這裡是 ";
	$link = mysqli_connect("localhost", "tobio", "u/3g0 zo vm/6", "tobio");
    $link -> set_charset("UTF8"); // 設定語系避免亂碼

    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }
    else{

    	$get_seller = "SELECT merchandise.mid, merchandise.mname, merchandise.uid, merchandise.img, user.uid, user.user_name FROM `merchandise`, `user` WHERE merchandise.mid = '$mid' AND merchandise.uid = user.uid";
    	$merchandise_img = mysqli_fetch_row(mysqli_query($link, $get_seller))[3];
    	$seller_name = mysqli_fetch_row(mysqli_query($link, $get_seller))[5];
    	print_r($seller_name) ;
    	$get_seller_id = "SELECT uid FROM user WHERE user_name = '$seller_name'";
    	$seller_id = mysqli_fetch_row(mysqli_query($link, $get_seller_id))[0];
    	$mname = mysqli_fetch_row(mysqli_query($link, $get_seller))[1];
    	
    }    	
	echo " 的留言板!"."<br><br>";
    echo '<div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms">';
        echo '<div class="row align-items-center">';
            echo '<div class="col-12 col-md-6">';
                echo '<div class="single-blog-thumbnail">';
                    echo "<img src='images/".$merchandise_img."' class = 'image'>";
                echo '</div>';
            echo '</div>';
            echo '<div class="col-12 col-md-6">';
            // <!-- Blog Content -->
                echo '<div class="single-blog-content">';
                    echo '<div class="line"></div>';
                        echo "<p>".'商品 id     '.$mid."</p>";    
                        echo "<p>".'商品名稱    '.$mname."</p>";
            
                echo "</div>";
            echo '</div>';
        echo '</div>';
    echo '</div>';

    $content = "SELECT message.locid, message.uid, message.content, message.date_m, user.uid, user.user_name FROM message, user 
                    WHERE message.mid = '$mid' AND message.uid = user.uid ";
    $result_content = mysqli_query($link, $content);
            
    if($_POST['tmp'] == 0){
        while ($row = mysqli_fetch_array($result_content)) {

            $left_content = $row[2];
            $date_m = $row[3];
            $left_user_name = $row[5];
            echo '<div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms">';
                echo '<div class="row align-items-center">';
                    echo '<div class="col-12 col-md-6">';            
                        echo '<div class="single-blog-content">';    
                            echo $left_user_name.' : '.' '.$left_content.' '.$date_m;                                  
                                        
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    }
    echo "關於 "." ".$mname." 您想分享的想法是 "."<br><br>";
	include('getuser.php');
    	
    	

	if (isset($_POST['talk'])) {
      	$mid = $_POST['mid'];
        date_default_timezone_set('Etc/GMT-8');
    	$date = date('Y/m/d H:i:s');
    	$message_text = mysqli_real_escape_string($link, $_POST['message_text']);
        $text_sql = "INSERT INTO message(locid, uid, content, date_m, mid) VALUES ('$seller_id', '$uid', '$message_text', '$date', '$mid')";
        mysqli_query($link, $text_sql);
        $result_content_new = mysqli_query($link, $content);

        while ($row = mysqli_fetch_array($result_content_new)) {

            $left_content = $row[2];
            $date_m = $row[3];
            $left_user_name = $row[5];
            echo '<div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms">';
                echo '<div class="row align-items-center">';
                    echo '<div class="col-12 col-md-6">';                
                        echo '<div class="single-blog-content">';    
                            echo $left_user_name.' : '.' '.$left_content.' '.$date_m;                                       
                        echo '</div>';
                    echo '</div>';
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
                <form method='POST' value= action="message.php">
                    <div>
                        <textarea 
                          	id="text" 
                          	cols="80" 
                          	rows="10" 
                          	name="message_text" 
                          	placeholder="請說說您的想法~"></textarea>
                  	</div>
                  	<input type="hidden" name="mid" value=<?php echo $mid;?>>
                    <input type="hidden" name="tmp" value=1>
                    <br>
                  	<input class='btn subscribe-btn' data-toggle='modal' name="talk" type = 'submit' value='新增留言' >
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>
    </body>
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
