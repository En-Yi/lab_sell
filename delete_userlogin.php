<!-- 刪除之前的登入者 -->
<?php
	$link = mysqli_connect("localhost", "tobio", "u/3g0 zo vm/6", "tobio");
    $link -> set_charset("UTF8"); // 設定語系避免亂碼

    if (!$link) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	else{
		$delete_pick_user = "DELETE FROM `user_login` ";
		mysqli_query($link, $delete_pick_user);		
	}
?>