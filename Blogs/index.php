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


// Load 2 bài viết đầu
// Cau lenh truy van
$query_two_posts = "SELECT
	p.*, c.title as category, a.name 
FROM
	posts p
	LEFT JOIN categories c ON p.category_id = c.id 
	LEFT JOIN authors a ON p.author_id = a.id
WHERE
	p.STATUS = 1 
ORDER BY
	p.created_at DESC 
	LIMIT 2";

// Thuc thi cau lenh
$result_two_posts = $conn -> query($query_two_posts);

// Tao 1 mang de chua du lieu
$two_posts = array();

while ($row = $result_two_posts->fetch_assoc()) {
	$two_posts[] = $row;
}        

// Load 6 bài viet tiep theo
// Cau lenh truy van
$query_recent_posts = "SELECT
	p.*, c.title as category, a.name 
FROM
	posts p
	LEFT JOIN categories c ON p.category_id = c.id 
	LEFT JOIN authors a ON p.author_id = a.id
WHERE
	p.STATUS = 1 
ORDER BY
	p.created_at DESC 
LIMIT 2,6 ";

// Thuc thi cau lenh
$result_recent_posts = $conn -> query($query_recent_posts);

// Tao 1 mang de chua du lieu
$recent_posts = array();

while ($row = $result_recent_posts->fetch_assoc()) {
	$recent_posts[] = $row;
}        

// Cau lenh truy van
$query_posts = "SELECT
	p.*, c.title as category, a.name 
FROM
	posts p
	LEFT JOIN categories c ON p.category_id = c.id 
	LEFT JOIN authors a ON p.author_id = a.id
WHERE
	p.STATUS = 1 
ORDER BY
	p.created_at DESC  LIMIT 8,7 ";

// Thuc thi cau lenh
$result_posts = $conn -> query($query_posts);

// Tao 1 mang de chua du lieu
$post1 = $result_posts->fetch_assoc();
$posts = array();

while ($row = $result_posts->fetch_assoc()) {
	$posts[] = $row;
}

// Cau lenh truy van
$query_featured_posts = "SELECT
	p.*, c.title as category, a.name 
FROM
	posts p
	LEFT JOIN categories c ON p.category_id = c.id 
	LEFT JOIN authors a ON p.author_id = a.id
WHERE
	p.STATUS = 1 
ORDER BY
	p.created_at DESC  LIMIT 15,2 ";

// Thuc thi cau lenh
$result_featured_posts = $conn -> query($query_featured_posts);

// Tao 1 mang de chua du lieu
$featured_posts = array();

while ($row = $result_featured_posts->fetch_assoc()) {
	$featured_posts[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once('head.php') ?>
		<body>

		<!-- Header -->
		<header id="header">
			<!-- Nav -->
			<?php require_once('header.php') ?>
			<!-- /Nav -->
		</header>
		<!-- /Header -->

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">	
					<!-- post -->
					<?php foreach ($two_posts as $post) {
					?>
					<div class="col-md-6">
						<div class="post post-thumb">
							<a class="post-img" href="blog-post.php?id=<?php echo $post["id"] ?>"><img src="img/<?php echo $post["thumbnail"] ?>" alt="" weight = "600px" height = "300px"></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-<?php echo $post["category_id"] % 4 + 1 ?>" href="category.php"><?php echo $post["category"] ?></a>
									<span class="post-date"><?php echo $post["created_at"] ?></span>
								</div>
								<h3 class="post-title"><a href="blog-post.php?id=<?php echo $post["id"] ?>"><?php echo $post["title"] ?></a></h3>
							</div>
						</div>
					</div>
				    <?php } ?>
					<!-- /post -->

				</div>
				<!-- /row -->

				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h2>Recent Posts</h2>
						</div>
					</div>

					<!-- post -->
					<?php 
					foreach ($recent_posts as $post) {
					?>
					<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post.php?id=<?php echo $post["id"] ?>"><img src="img/<?php echo $post["thumbnail"]; ?>" alt="" width = "400px" height = "250px"></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-<?php echo $post["category_id"] % 4 + 1 ?>" href="category.php"><?php echo $post["category"]; ?></a>
									<span class="post-date"><?php echo $post["created_at"]; ?></span>
								</div>
								<h3 class="post-title"><a href="blog-post.php?id=<?php echo $post["id"] ?>"><?php echo $post["title"]; ?></a></h3>
							</div>
						</div>
					</div>

				    <?php } ?>
				</div>

					<!-- post -->

				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<!-- post -->
							<div class="col-md-12">
								<div class="post post-thumb">
									<a class="post-img" href="blog-post.php?id=<?php echo $post1["id"] ?>"><img src="img/<?php echo $post1["thumbnail"]; ?>" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-<?php echo $post1["category_id"] % 4 + 1 ?>" href="category.php"><?php echo $post1["category"]; ?></a>
											<span class="post-date"><?php echo $post1["created_at"]; ?></span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?id=<?php echo $post1["id"] ?>"><?php echo $post1["title"]; ?></a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->

							<!-- post -->
							<?php foreach  ($posts as $post) { ?>
							<div class="col-md-6">
								<div class="post">
									<a class="post-img" href="blog-post.php?id=<?php echo $post["id"] ?>"><img src="img/<?php echo $post["thumbnail"]; ?>" alt=""  width="400px" height="250px"></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-<?php echo $post["category_id"] % 4 + 1 ?>" href="category.php"><?php echo $post["category"]; ?></a>
											<span class="post-date"><?php echo $post["created_at"]; ?></span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?id=<?php echo $post["id"] ?>"><?php echo $post["title"]; ?></a></h3>
									</div>
								</div>
							</div>
							<?php } ?>
							<!-- /post -->

							
							<div class="clearfix visible-md visible-lg"></div>


							<div class="clearfix visible-md visible-lg"></div>


						</div>
					</div>

					<div class="col-md-4">
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

						<!-- post widget -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Featured Posts</h2>
							</div>
							<?php foreach ($featured_posts as $post) {
							?>
							<div class="post post-thumb">
								<a class="post-img" href="blog-post.php?id=<?php echo $post["id"] ?>"><img src="img/<?php echo $post["thumbnail"]; ?>" alt="" weight = "400px" height = "250px"></a>
								<div class="post-body">
									<div class="post-meta">
										<a class="post-category cat-<?php echo $post["category_id"] % 4 + 1; ?>" href="category.php"><?php echo $post["category"]; ?></a>
										<span class="post-date"><?php echo $post["created_at"] ?></span>
									</div>
									<h3 class="post-title"><a href="blog-post.php?id=<?php echo $post["id"] ?>"></a><?php echo $post["title"] ?> </a></h3>
								</div>
							</div>
                            <?php } ?>
						</div>
						<!-- /post widget -->
						
						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-1.jpg" alt="">
							</a>
						</div>
						<!-- /ad -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->
		
		<!-- section -->
		<div class="section section-grey">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="section-title text-center">
							<h2>Featured Posts</h2>
						</div>
					</div>

					<!-- post -->
					<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post.php?id=<?php echo $post["id"] ?>"><img src="./img/post-4.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-2" href="category.php">JavaScript</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.php?id=<?php echo $post["id"] ?>">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->

					<!-- post -->
					<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post.php?id=<?php echo $post["id"] ?>"><img src="./img/post-5.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-3" href="category.php">Jquery</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.php?id=<?php echo $post["id"] ?>">Ask HN: Does Anybody Still Use JQuery?</a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->

					<!-- post -->
					<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post.php?id=<?php echo $post["id"] ?>"><img src="./img/post-3.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-1" href="category.php">Web Design</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.php?id=<?php echo $post["id"] ?>">Pagedraw UI Builder Turns Your Website Design Mockup Into Code Automatically</a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-12">
								<div class="section-title">
									<h2>Most Read</h2>
								</div>
							</div>
							<!-- post -->
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.php?id=<?php echo $post["id"] ?>"><img src="./img/post-4.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="category.php">JavaScript</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?id=<?php echo $post["id"] ?>">Chrome Extension Protects Against JavaScript-Based CPU Side-Channel Attacks</a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
									</div>
								</div>
							</div>
							<!-- /post -->

							<!-- post -->
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.php?id=<?php echo $post["id"] ?>"><img src="./img/post-6.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="category.php">JavaScript</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?id=<?php echo $post["id"] ?>">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
									</div>
								</div>
							</div>
							<!-- /post -->

							<!-- post -->
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.php?id=<?php echo $post["id"] ?>"><img src="./img/post-1.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-4" href="category.php">Css</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?id=<?php echo $post["id"] ?>">CSS Float: A Tutorial</a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
									</div>
								</div>
							</div>
							<!-- /post -->
							
							<!-- post -->
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.php?id=<?php echo $post["id"] ?>"><img src="./img/post-2.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-3" href="category.php">Jquery</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?id=<?php echo $post["id"] ?>">Ask HN: Does Anybody Still Use JQuery?</a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
									</div>
								</div>
							</div>
							<!-- /post -->
							
							<div class="col-md-12">
								<div class="section-row">
									<button class="primary-button center-block">Load More</button>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-1.jpg" alt="">
							</a>
						</div>
						<!-- /ad -->
						
						<!-- catagories -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Catagories</h2>
							</div>
							<div class="category-widget">
								<ul>
									<li><a href="#" class="cat-1">Web Design<span>340</span></a></li>
									<li><a href="#" class="cat-2">JavaScript<span>74</span></a></li>
									<li><a href="#" class="cat-4">JQuery<span>41</span></a></li>
									<li><a href="#" class="cat-3">CSS<span>35</span></a></li>
								</ul>
							</div>
						</div>
						<!-- /catagories -->
						
						<!-- tags -->
						<div class="aside-widget">
							<div class="tags-widget">
								<ul>
									<li><a href="#">Chrome</a></li>
									<li><a href="#">CSS</a></li>
									<li><a href="#">Tutorial</a></li>
									<li><a href="#">Backend</a></li>
									<li><a href="#">JQuery</a></li>
									<li><a href="#">Design</a></li>
									<li><a href="#">Development</a></li>
									<li><a href="#">JavaScript</a></li>
									<li><a href="#">Website</a></li>
								</ul>
							</div>
						</div>
						<!-- /tags -->
					</div>
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