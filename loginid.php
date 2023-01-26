<!-- 將目前登入者的id跟名稱輸入資料表`user_login` -->
<?php
	$link = mysqli_connect("localhost", "tobio", "u/3g0 zo vm/6", "tobio");
    $link -> set_charset("UTF8"); // 設定語系避免亂碼

    if (!$link) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	else{
		$pick_user = "SELECT * FROM `user` WHERE user_name = '$username_login' AND  password = '$password_login'";
		$pick_result = mysqli_query($link, $pick_user);
		$rowr = mysqli_fetch_row($pick_result);
		
		$uid = $rowr[0];
		$user_name = $rowr[4];
		
		$user_now = "INSERT INTO user_login(uid, user_name, welcome) VALUES ($uid,'$user_name', $welcome) ";
		mysqli_query($link, $user_now);

	}
?>