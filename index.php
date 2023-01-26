<!-- 登入頁面 -->
<!DOCTYPE html>

<?php
// pass header
ob_start();
	include ('package.php'); //載入套件
	include("delete_userlogin.php"); //刪除先前的使用者
    include('css_template.php'); //css 模板
?>

<!-- Title -->
<title>NE Chen 的拍賣網站 -- 會員登入</title>



    <!-- Logo Area -->
    <div class="logo-area text-center">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <a href="#" class="original-logo"><img src="img/core-img/logo.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
<!-- </header> -->
    


  	
<?php include('check_user.php')?>
	 <div class="site-main">
        <div class="container site-main-inner">
	        <div class="content">
                <br>
            	<label size="20" for="login">Login</label>
            	<form method="POST" action="index.php" >
            	<!-- <div style="border:2px orange solid;"> -->
                	<label for="username">Username</label><br>
                	<input type="text"  name="user_name">
            	<!-- </div> -->
            	    <br>
            		<label for="pass">Password</label><br>
                	<input type="password" id="pass" name="password"
                       minlength="1" required>
            	    <br>
            	    <input type="hidden" name="welcome" value=0><br>
            	    <div class="subscribe-btn">
            		    <input class="btn subscribe-btn" data-toggle="modal"  type = "submit" value="Login" name="check_user">
            		    <input class="btn subscribe-btn" data-toggle="modal"  type = "reset" value="Reset" >
            		    <input class="btn subscribe-btn" data-toggle="modal"  type = "checkbox" onclick="showps()" value="Show password"> Show password
            		
                            <!-- <a href="#" class="btn subscribe-btn" data-toggle="modal" data-target="#subsModal">Subscribe</a> -->
                    </div>
	
	<!-- <button type = "reset">Reset</button>
	<input type="checkbox" onclick="showps()">Show password -->
	                </form>
                    <br>
	
	                <label for="register">To register</label>
                	<form action="register.php" > 
                	<div class="subscribe-btn">
                		<input class="btn subscribe-btn" data-toggle="modal"  type = "submit" value="Register">
                        <br><br>

                	</div>
                	<!-- <button type = "submit">註冊</button> -->
                	</form>

                    <div class="instagram-feed-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="insta-title">
                                        <h5>Follow us @ Instagram</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Instagram Slides -->
                        <div class="instagram-slides owl-carousel">
                            <!-- Single Insta Feed -->
                            <div class="single-insta-feed">
                                <img src="img/instagram-img/1.png" alt="">
                                <!-- Hover Effects -->
                                <div class="hover-effects">
                                    <a href="#" class="d-flex align-items-center justify-content-center"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                            <!-- Single Insta Feed -->
                            <div class="single-insta-feed">
                                <img src="img/instagram-img/2.png" alt="">
                                <!-- Hover Effects -->
                                <div class="hover-effects">
                                    <a href="#" class="d-flex align-items-center justify-content-center"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                            <!-- Single Insta Feed -->
                            <div class="single-insta-feed">
                                <img src="img/instagram-img/3.png" alt="">
                                <!-- Hover Effects -->
                                <div class="hover-effects">
                                    <a href="#" class="d-flex align-items-center justify-content-center"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                            <!-- Single Insta Feed -->
                            <div class="single-insta-feed">
                                <img src="img/instagram-img/4.png" alt="">
                                <!-- Hover Effects -->
                                <div class="hover-effects">
                                    <a href="#" class="d-flex align-items-center justify-content-center"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                            <!-- Single Insta Feed -->
                            <div class="single-insta-feed">
                                <img src="img/instagram-img/5.png" alt="">
                                <!-- Hover Effects -->
                                <div class="hover-effects">
                                    <a href="#" class="d-flex align-items-center justify-content-center"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                            <!-- Single Insta Feed -->
                            <div class="single-insta-feed">
                                <img src="img/instagram-img/6.png" alt="">
                                <!-- Hover Effects -->
                                <div class="hover-effects">
                                    <a href="#" class="d-flex align-items-center justify-content-center"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                            <!-- Single Insta Feed -->
                            <div class="single-insta-feed">
                                <img src="img/instagram-img/7.png" alt="">
                                <!-- Hover Effects -->
                                <div class="hover-effects">
                                    <a href="#" class="d-flex align-items-center justify-content-center"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ##### Instagram Feed Area End ##### -->

            </div>
        </div>
    </div>





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

</html>
<?php
	ob_end_flush();
?>