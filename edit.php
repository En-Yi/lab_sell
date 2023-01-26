<!-- 修改商品資料 -->

<html>

<title>NE Chen 的拍賣網站 -- 修改商品資料</title>

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
<?php
// pass header
    ob_start();
    include('getuser.php');
	$mid = $_POST['mid'];
	$link = mysqli_connect("localhost", "tobio", "u/3g0 zo vm/6", "tobio");
	$sql = "SELECT * FROM `merchandise` WHERE mid = '$mid'";
	$result = mysqli_query($link, $sql);

  // 按下 upload 按鈕 做以下事情
    if (isset($_POST['upload'])) {
  	// Get image name
      	$image = $_FILES['image']['name'];
      	// Get text
      	$mname = mysqli_real_escape_string($link, $_POST['mname']);
        
        $category = mysqli_real_escape_string($link, $_POST['category']);
        
        $initial_price = mysqli_real_escape_string($link, $_POST['initial_price']);
        $start_date = mysqli_real_escape_string($link, $_POST['start_date']);
        $end_date = mysqli_real_escape_string($link, $_POST['end_date']);
        $image_text = mysqli_real_escape_string($link, $_POST['image_text']);
        
      	// image file directory
      	$target = "images/".basename($image);

      	$sql2 = "UPDATE `merchandise` SET `mname`='$mname', `category`='$category', `initial_price`='$initial_price', `img`='$image', `start_date`='$start_date', `end_date`='$end_date', `description`='$image_text' WHERE mid = '$mid'";
      	// execute query
      	mysqli_query($link, $sql2);
      	$sql3 = "SELECT * FROM `merchandise` WHERE mid = '$mid'";
      	$result3 = mysqli_query($link, $sql3);

        // <!-- ##### Blog Wrapper Start ##### -->
        echo '<div class="blog-wrapper section-padding-100 clearfix">';
            echo '<div class="container">';
                echo '<div class="row">';
                    echo '<div class="col-12 col-lg-9">';
                        // <!-- Single Blog Area  -->
      	            while ($row = mysqli_fetch_array($result3)) {
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
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';  
    }

                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';

  	    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		    $msg = "Image uploaded successfully";
  	    }else{
  		    $msg = "Failed to upload image";
  	    }
    }
  
?>
    <!-- ##### Blog Wrapper Start ##### -->
    <div class="blog-wrapper section-padding-100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <form action="home.php">
                        <input class="btn subscribe-btn" data-toggle="modal" type = "submit" value="回首頁" ><br><br>
                    </form>
                    <form action="own_place.php">
                        <input class="btn subscribe-btn" data-toggle="modal" type = "submit" value="回上頁" ><br><br>
                    </form>
                
<?php
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
                <h3>新增拍賣商品</h3>
                <h4>上傳商品圖片</h4>
                <form method='POST' value= action="own_place.php" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">
                <br>
                <div>
                    <input type="file" name="image">
                </div>
                <br>
                <div>
                    <h4>描述商品狀況</h4>
                    <textarea 
                    id="text" 
                    cols="80" 
                    rows="10" 
                    name="image_text" 
                    placeholder="請描述商品狀況~"></textarea>
                </div>
                <br>
                <div>
                    <label for="mname">商品名稱</label>
                    <input type="text" id="mname" name="mname"><br>
                    <label for="category">類別</label>
                    <form>
                        <select id="category" name="category">
                        　  <option value="3C">3C</option>
                        　  <option value="生活">生活</option>
                        　  <option value="書籍">書籍</option>
                        　  <option value="遊戲">遊戲</option>                    　
                        </select>
                        <br>
                    </form>

                    <label for="initial_price">起始價格</label>
                    <input type="text" id="initial_price" name="initial_price"><br>
                    <label for="start_date">開始時間</label>
                    <input type="datetime-local" id="start_date" name="start_date"><br>
                    <label for="end_date">結束時間</label>
                    <input type="datetime-local" id="end_date" name="end_date"><br>
                    <input type="hidden" name="mid" value=<?php echo $_POST['mid'];?>>
                    <!-- 修改之後tmp變成1，顯示新的資料 -->
                    <input type="hidden" name="tmp" value=1>
                    <br>
                    <input class='btn subscribe-btn' data-toggle='modal' name="upload" type = 'submit' value='新增拍賣商品' ><br><br>
                </div>
                </form>
            </div>
        </div>
    </div>

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

</body>
</html>