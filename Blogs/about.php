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
		<div class="page-header">
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<ul class="page-header-breadcrumb">
								<li><a href="index.php">Home</a></li>
								<li>About Us</li>
							</ul>
							<h1>About Us</h1>
						</div>
					</div>
				</div>
			</div>
		<!-- /Header -->
		
		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="section-row">
							<p>Lorem ipsum dolor sit amet, ea eos tibique expetendis, tollit viderer ne nam. No ponderum accommodare eam, purto nominavi cum ea, sit no dolores tractatos. Scripta principes quaerendum ex has, ea mei omnes eruditi. Nec ex nulla mandamus, quot omnesque mel et. Amet habemus ancillae id eum, justo dignissim mei ea, vix ei tantas aliquid. Cu laudem impetus conclusionemque nec, velit erant persius te mel. Ut eum verterem perpetua scribentur.</p>
							<figure class="figure-img">
								<img class="img-responsive" src="./img/about-1.jpg" alt="">
							</figure>
							<p>Vix mollis admodum ei, vis legimus voluptatum ut, vis reprimique efficiendi sadipscing ut. Eam ex animal assueverit consectetuer, et nominati maluisset repudiare nec. Rebum aperiam vis ne, ex summo aliquando dissentiunt vim. Quo ut cibo docendi. Suscipit indoctum ne quo, ne solet offendit hendrerit nec. Case malorum evertitur ei vel.</p>
						</div>
						<div class="row section-row">
							<div class="col-md-6">
								<figure class="figure-img">
									<img class="img-responsive" src="./img/about-2.jpg" alt="">
								</figure>
							</div>
							<div class="col-md-6">
								<h3>Our Mission</h3>
								<p>Id usu mutat debet tempor, fugit omnesque posidonium nec ei. An assum labitur ocurreret qui, eam aliquid ornatus tibique ut.</p>
								<ul class="list-style">
									<li><p>Vix mollis admodum ei, vis legimus voluptatum ut.</p></li>
									<li><p>Cu cum alia vide malis. Vel aliquid facilis adolescens.</p></li>
									<li><p>Laudem rationibus vim id. Te per illum ornatus.</p></li>
								</ul>
							</div>
						</div>
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
