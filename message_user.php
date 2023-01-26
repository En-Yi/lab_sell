<!-- 用戶的留言板 -->

<html>

<title>NE Chen 的拍賣網站 -- 用戶留言板</title>

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

<br>

	<div class="site-main">
      	<div class="container site-main-inner">
          	<div class="content">
				<form action="home.php">
                    <input class="btn subscribe-btn" data-toggle="modal" type = "submit" value="回首頁" ><br><br>
                </form>
          		<br>

<?php

	error_reporting(0);// 不要顯示 warning
	
	include('getuser.php');
	$mid = $_POST['mid'];
	
	
	$link = mysqli_connect("localhost", "tobio", "u/3g0 zo vm/6", "tobio");
    $link -> set_charset("UTF8"); // 設定語系避免亂碼

    if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
	}
	else{

		// 顯示該用戶 更新前的留言板
		// 用戶的名稱
		if (isset($_POST['find_user_name'])) {
	  	
		    date_default_timezone_set('Etc/GMT-8');
			$date = date('Y/m/d H:i:s');
			$find_user_name_text = mysqli_real_escape_string($link, $_POST['find_user']);
			// message.locid 是該用戶的留言板位置
			// message.uid 是留言者的id
		    $text_sql = "SELECT message.locid, message.uid, message.content, message.date_m, user.uid, user.user_name FROM message, user 
		    				WHERE user.user_name = '$find_user_name_text' AND message.locid = user.uid AND message.mid = 0 ";

		    $user_msboard = mysqli_query($link, $text_sql);
			
			if(mysqli_num_rows($user_msboard) < 1){
				echo "目前沒有對於該用戶的留言";
			}
			else
			{
				echo $find_user_name_text."的留言板!"."<br><br>";
			}
		    

			while ($row = mysqli_fetch_array($user_msboard) ) {
				$left_user_name = "SELECT user.uid, user.user_name FROM message, user WHERE user.uid = '$row[1]'";
		    
		      	$row2 = mysqli_fetch_array(mysqli_query($link, $left_user_name));

				echo '<div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms">';
	                echo '<div class="row align-items-center">';
	                    echo '<div class="col-12 col-md-6">';	                                
	            			echo $row2[1].' :'.' '.$row[2].' '.$row[3];
		        		echo "</div>";
	      			echo '</div>';
	        	echo '</div>';
		    }
		   
	    }

		// 新增留言
    
    	if (isset($_POST['add_message'])) {
  		
	  		date_default_timezone_set('Etc/GMT-8');
			$date = date('Y/m/d H:i:s');
	  		$at_user = $_POST['at_user'];
	  		$uid_loc = "SELECT uid, user_name FROM user WHERE user_name = '$at_user'";
		    $at_user_result = mysqli_fetch_array(mysqli_query($link, $uid_loc))[0];

			$find_user_name_text = $_POST['at_user'];
			$message_text = mysqli_real_escape_string($link, $_POST['message_text']);

			// message.locid 是該用戶的留言板位置
		    $text_sql = "INSERT INTO message(locid, uid, content, date_m, mid) VALUES ('$at_user_result', '$uid', '$message_text', '$date', '$mid') ";
		    mysqli_query($link, $text_sql);

		    // 顯示更新後的留言
			$view_update_user_msboard = "SELECT message.locid, message.uid, message.content, message.date_m, user.uid, user.user_name FROM message, user 
		    				WHERE user.user_name = '$find_user_name_text' AND message.locid = user.uid AND message.mid = 0";

		    if(mysqli_num_rows(mysqli_query($link, $view_update_user_msboard)) < 1){
				echo "目前沒有對於該用戶的留言";
				$delete_error_user = "DELETE FROM `message` WHERE locid = 0";
				mysqli_query($link, $delete_error_user);
			}
			else
			{
				$view_result = mysqli_query($link, $view_update_user_msboard);
				echo $at_user.' 的留言板!';
				while ($row = mysqli_fetch_array($view_result)) {
		      		$left_user_name = "SELECT user.uid, user.user_name FROM message, user WHERE user.uid = '$row[1]'";
		    
		      		$row2 = mysqli_fetch_array(mysqli_query($link, $left_user_name));
					echo '<div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1000ms">';
	                    echo '<div class="row align-items-center">';
	                        echo '<div class="col-12 col-md-6">';
	                                // <!-- Blog Content -->
	                            echo '<div class="single-blog-content">';
	                                echo '<div class="line"></div>';
		      						echo $row2[1].' : '.' '.$row[2].' '.$row[3];
		        				echo "</div>";
		        			echo "</div>";
		        		echo "</div>";
	      			echo '</div>';        
	    		}	    	
			}	    
    	}	
	}	
?>


	<form method='POST' value= action="message_user.php">
		<label>尋找用戶的留言板 </label>
		<div>
	      <input type="text" id="find_user" name="find_user"><br>
		</div>
	  	<input type="hidden" name="mid" value=0><br>
	  	<input class='btn subscribe-btn' data-toggle='modal' name="find_user_name" type = 'submit' value='尋找用戶'>
	</form>
	<br>
	<label>想對用戶說的話 </label>
	<form method='POST' value= action="message_user.php">
		<div>
			<label>用戶名稱  </label>
			<div>
				<input type="text" name="at_user"><br>
			</div>
		</div>
		<br>
		<label>內容 </label>
		<br>
		<div>
	      	<textarea	      	
		      	id="text" 
		      	cols="80" 
		      	rows="10" 
		      	name="message_text" 
		      	placeholder="請說說您的想法~"></textarea>
	  	</div>
	  	<input type="hidden" name="mid" value=0><br>
	  	<input class='btn subscribe-btn' data-toggle='modal' name="add_message" type = 'submit' value='新增留言' >
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
		
