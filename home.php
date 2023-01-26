<!-- 主頁面 --> 

<?php
// pass header
	ob_start();
    include ("package.php");
    // 取得目前登入者的id and username
    include("getuser.php");
           
    echo "<br>";
	$link = mysqli_connect("localhost", "tobio", "u/3g0 zo vm/6", "tobio");
    $link -> set_charset("UTF8"); // 設定語系避免亂碼

    if (!$link) {
    	die("Connection failed: " . mysqli_connect_error());
	}

	else{

	    $sql2 = "SELECT uid FROM `user` WHERE user_name = '$username_login'";
	    $merchandise = "SELECT img FROM merchandise";
	    
	    $result2= mysqli_query($link, $sql2);
	    $result3 = mysqli_query($link, $merchandise);
	    $id = mysqli_fetch_row($result2)[0];
	    
	    // 隨機選取展示圖片
	    
	    $row_m = mysqli_fetch_all($result3);
	    shuffle($row_m);
	    echo "<br>"; // 調整頂部navi bar
		$link->close();
	}
    
?>


<html>
<meta charset="utf-8">

<head>
	<title>NE Chen 的拍賣網站</title>
	<!-- navigation bar -->
	<style>
		ul {
			margin-top: -50;
			margin-bottom: 50;
			margin-left: 300;
			margin-right: 300;
		  list-style-type: none;
		  /*margin: 100;*/
		  padding: 0;
		  overflow: hidden;
		  background-color: #FFAEBC;
		  font-size: 20px;
		}



		li {
		  float: left;
		}

		li a {
		  display: block;
		  color: white;
		  text-align: center;
		  padding: 15px 15px;
		  text-decoration: none;
		}

		li a:hover:not(.active) {
		  background-color: #EF7C8E;
		}

		.active {
		  background-color: #FFA384;
		}

	</style>
</head>


<body>

	<ul>
	  <li><a class="active" ><?php echo $username_login;?></a></li>
	  <li><a href="own_place.php">我的小天地</a></li>
	  <li><a href="index.php">登出</a></li>
	</ul>
  
    <ul>
        <li><a href="merchandise.php?cat=3C"> 3C </a></li>
        <li><a href="merchandise.php?cat=生活">生活</a></li>
        <li><a href="merchandise.php?cat=書籍">書籍</a></li>
        <li><a href="merchandise.php?cat=遊戲">遊戲</a></li>
    </ul>
   	<br>
	
	<img src="img/core-img/logo.png"  style="display:block; margin:auto;"></img>
	
	<form method="POST" action="message_user.php">
		<input type="hidden" name="mid" value=0>
        <input type="submit" value="留言板">
    </form>

    <form action="send.php">
        <input type="submit" value="寄信去">
    </form>    
</body>

<style>
   input {
      	padding:5px 15px;
      	background:#A0E7E5;
        border:0 none;
        cursor:pointer;
     	-webkit-border-radius: 5px;
     	border-radius: 5px;
      	font-family: 'Nunito', sans-serif;
       	font-size: 19px;
     	}
</style>

	<div class="owl-carousel owl-theme">
	    <div class="item"><h4><?php echo "<img src='images/".$row_m[0][0]."' >";?></h4></div>
	    <div class="item"><h4><?php echo "<img src='images/".$row_m[1][0]."' >";?></h4></div>
	    <div class="item"><h4><?php echo "<img src='images/".$row_m[2][0]."' >";?></h4></div>
	    <div class="item"><h4><?php echo "<img src='images/".$row_m[3][0]."' >";?></h4></div>
	    <div class="item"><h4><?php echo "<img src='images/".$row_m[4][0]."' >";?></h4></div>
	    <div class="item"><h4><?php echo "<img src='images/".$row_m[5][0]."' >";?></h4></div>    
	</div>

<!-- animation -->
<script type="text/javascript">

    var owl = $('.owl-carousel');
	owl.owlCarousel({
	    // items:3,
	    loop:true,
	    margin:50,

	    
	    autoplay:true,
	    autoplayTimeout:2000,
	    autoplayHoverPause:false,

	    responsiveClass:true,
	    responsive:{
	        200:{
	            items:1,
	            nav:true
	        },
	        600:{
	            items:2,
	            nav:true
	        },
	        1000:{
	            items:3,
	            nav:true,
	            loop:true
	        }
	    }
	});
	$('.play').on('click',function(){
	    owl.trigger('play.owl.autoplay',[2000])
	})
	$('.stop').on('click',function(){
	    owl.trigger('stop.owl.autoplay')
	})

</script>
<br>
<script type='text/javascript'>
        function sw(){
            swal("Good job!", "您已成功登入!", "success");
        }    

</script>

<?php   
    if($welcome == 0){
        echo "<script type='text/javascript'>sw();</script>";

        $link = mysqli_connect("localhost", "tobio", "u/3g0 zo vm/6", "tobio");
        $link -> set_charset("UTF8"); // 設定語系避免亂碼

        if (!$link) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else{
            $sql_welcome = "UPDATE `user_login` SET welcome = 1";
            mysqli_query($link, $sql_welcome);
    	}   
    }     
?>

</html>

<?php
	ob_end_flush();
?>