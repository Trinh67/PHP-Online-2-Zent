<?php

require_once ('connection.php');
// Load menu bài viết
// Cau lenh truy van
$query_menu_categories = "SELECT
	*
FROM
	categories
WHERE
	id = 16 OR id = 15 OR id = 13 OR id = 9 OR id = 8 OR id = 11  
ORDER BY id DESC";

// Thuc thi cau lenh
$result_menu_categories = $conn -> query($query_menu_categories);

// Tao 1 mang de chua du lieu
$menu_categories = array();

while ($row = $result_menu_categories->fetch_assoc()) {
	$menu_categories[] = $row;
}        
?>

<!DOCTYPE html>
<html lang="en">
	<?php require_once('head.php') ?>
	<body>
		
		<!-- Header -->
		<?php require_once('header.php') ?>
		<!-- /Header -->

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<h1>H1 Typography heading.</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					
						<h2>H2 Typography heading.</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					
						<h3>H3 Typography heading.</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					
						<h4>H4 Typography heading.</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

						<ul class="list-style">
							<li><p>Vix mollis admodum ei, vis legimus voluptatum ut.</p></li>
							<li><p>Cu cum alia vide malis. Vel aliquid facilis adolescens.</p></li>
							<li><p>Laudem rationibus vim id. Te per illum ornatus.</p></li>
						</ul>
			
						<ol class="list-style">
							<li><p>Vix mollis admodum ei, vis legimus voluptatum ut.</p></li>
							<li><p>Cu cum alia vide malis. Vel aliquid facilis adolescens.</p></li>
							<li><p>Laudem rationibus vim id. Te per illum ornatus.</p></li>
						</ol>
					</div>
					<!-- aside -->
					<div class="col-md-4">
						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-1.jpg" alt="">
							</a>
						</div>
						<!-- /ad -->

						<!-- post widget -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Most Read</h2>
							</div>

							<div class="post post-widget">
								<a class="post-img" href="blog-post.php?id=<?php echo $post["id"] ?>"><img src="./img/widget-1.jpg" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post.php?id=<?php echo $post["id"] ?>">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
								</div>
							</div>

							<div class="post post-widget">
								<a class="post-img" href="blog-post.php?id=<?php echo $post["id"] ?>"><img src="./img/widget-2.jpg" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post.php?id=<?php echo $post["id"] ?>">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
								</div>
							</div>

							<div class="post post-widget">
								<a class="post-img" href="blog-post.php?id=<?php echo $post["id"] ?>"><img src="./img/widget-3.jpg" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post.php?id=<?php echo $post["id"] ?>">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
								</div>
							</div>

							<div class="post post-widget">
								<a class="post-img" href="blog-post.php?id=<?php echo $post["id"] ?>"><img src="./img/widget-4.jpg" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post.php?id=<?php echo $post["id"] ?>">Tell-A-Tool: Guide To Web Design And Development Tools</a></h3>
								</div>
							</div>
						</div>
						<!-- /post widget -->
					</div>
					<!-- /aside -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

		<!-- Footer -->
		<footer id="footer">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-5">
						<div class="footer-widget">
							<div class="footer-logo">
								<a href="index.php" class="logo"><img src="./img/logo.png" alt=""></a>
							</div>
							<ul class="footer-nav">
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Advertisement</a></li>
							</ul>
							<div class="footer-copyright">
								<span>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="row">
							<div class="col-md-6">
								<div class="footer-widget">
									<h3 class="footer-title">About Us</h3>
									<ul class="footer-links">
										<li><a href="about.php">About Us</a></li>
										<li><a href="#">Join Us</a></li>
										<li><a href="contact.php">Contacts</a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-6">
								<div class="footer-widget">
									<h3 class="footer-title">Catagories</h3>
									<ul class="footer-links">
										<li><a href="category.php">Web Design</a></li>
										<li><a href="category.php">JavaScript</a></li>
										<li><a href="category.php">Css</a></li>
										<li><a href="category.php">Jquery</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="footer-widget">
							<h3 class="footer-title">Join our Newsletter</h3>
							<div class="footer-newsletter">
								<form>
									<input class="input" type="email" name="newsletter" placeholder="Enter your email">
									<button class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
								</form>
							</div>
							<ul class="footer-social">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
							</ul>
						</div>
					</div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</footer>
		<!-- /Footer -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
