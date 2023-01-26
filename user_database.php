<!-- 取得user 資料表的資料 -->
<?php
	$link = mysqli_connect("localhost", "tobio", "u/3g0 zo vm/6", "tobio");
    $link -> set_charset("UTF8"); // 設定語系避免亂碼

    if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
	$pick_all_user = "SELECT user_name, password FROM `user` ";
	$pick_all_result = mysqli_query($link, $pick_all_user);
	// $rowr = mysqli_fetch_array($pick_result);	
}
?>