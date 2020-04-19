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

// Lay id cua danh muc duoc chon
$id = $_GET['id'];

$query_posts = "SELECT
	p.*, c.title as category, a.name 
FROM
	posts p
	LEFT JOIN categories c ON p.category_id = c.id 
	LEFT JOIN authors a ON p.author_id = a.id
WHERE
	p.STATUS = 1 AND p.category_id = ".$id."
ORDER BY
	p.created_at DESC  LIMIT 3 ";

// Thuc thi cau lenh

$result_posts = $conn -> query($query_posts);

// Tao 1 mang de chua du lieu
$post_1 = $result_posts->fetch_assoc();

$posts = array();

while ($row = $result_posts->fetch_assoc()) {
	$posts[] = $row;
}

// Load Most Read
$query_most_read = "SELECT
	p.*, c.title as category, a.name 
FROM
	posts p
	LEFT JOIN categories c ON p.category_id = c.id 
	LEFT JOIN authors a ON p.author_id = a.id
WHERE
	p.STATUS = 1 AND p.category_id = ".$id."
ORDER BY
	p.created_at DESC 
LIMIT 1,4 ";

// Thuc thi cau lenh
$result_most_read = $conn -> query($query_most_read);

// Tao 1 mang de chua du lieu
$most_read = array();

while ($row = $result_most_read->fetch_assoc()) {
	$most_read[] = $row;
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
								<li><?php echo $post_1["category"] ?></li>
							</ul>
							<h1><?php echo $post_1["category"] ?></h1>
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
						<div class="row">
							<!-- post -->
							<div class="col-md-12">
								<div class="post post-thumb">
									<a class="post-img" href="blog-post.php?id=<?php echo $post_1["id"] ?>"><img src="img/<?php echo $post_1["thumbnail"] ?>" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-<?php echo $post_1["category_id"] % 4 + 1 ?>" href="#"><?php echo $post_1["category"] ?></a>
											<span class="post-date"><?php echo $post_1["created_at"] ?></span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?id=<?php echo $post_1["id"] ?>"><?php echo $post_1["title"] ?></a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->
										
							<!-- post -->
							<?php foreach ($posts as $post) {
						    ?>
							<div class="col-md-6">
								<div class="post">
									<a class="post-img" href="blog-post.php?id=<?php echo $post["id"] ?>"><img src="img/<?php echo $post["thumbnail"] ?>" alt="" width = "400px" height = "250px"></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-<?php echo $post["category_id"] % 4 + 1 ?>" href="#"><?php echo $post_1["category"] ?></a>
											<span class="post-date"><?php echo $post["created_at"] ?></span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?id=<?php echo $post["id"] ?>"><?php echo $post["title"] ?></a></h3>
									</div>
								</div>
							</div>
						    <?php } ?>
							<!-- /post -->

							<div class="clearfix visible-md visible-lg"></div>
							
							<!-- ad -->
							<div class="col-md-12">
								<div class="section-row">
									<a href="#">
										<img class="img-responsive center-block" src="./img/ad-2.jpg" alt="">
									</a>
								</div>
							</div>
							<!-- ad -->
							
							<!-- post -->
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.php?id=<?php echo $post["id"] ?>"><img src="./img/post-2.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="#">JavaScript</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?id=<?php echo $post["id"] ?>">Ask HN: Does Anybody Still Use JQuery?</a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
									</div>
								</div>
							</div>
							<!-- /post -->
							
							<!-- post -->
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.php?id=<?php echo $post["id"] ?>"><img src="./img/post-5.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="#">JavaScript</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?id=<?php echo $post["id"] ?>">Microsoft’s TypeScript Fills A Long-standing Void In JavaScript</a></h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
									</div>
								</div>
							</div>
							<!-- /post -->

							<!-- post -->
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.php?id=<?php echo $post["id"] ?>"><img src="./img/post-3.jpg" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="#">JavaScript</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?id=<?php echo $post["id"] ?>">Javascript : Prototype vs Class</a></h3>
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
											<a class="post-category cat-2" href="#">JavaScript</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?id=<?php echo $post["id"] ?>">Why Node.js Is The Coolest Kid On The Backend Development Block!</a></h3>
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
						
						<!-- post widget -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Bài viết liên quan</h2>
							</div>

							<?php foreach ($most_read as $post) {
                            ?>
							<div class="post post-widget">
								<a class="post-img" href="blog-post.php?id=<?php echo $post["id"] ?>"><img src="img/<?php echo $post["thumbnail"] ?>" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="blog-post.php?id=<?php echo $post["id"] ?>"><?php echo $post["description"] ?></a></h3>
								</div>
							</div>
                            <?php } ?>		
						</div>
						<!-- /post widget -->
						
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
						
						<!-- archive -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Archive</h2>
							</div>
							<div class="archive-widget">
								<ul>
									<li><a href="#">Jan 2018</a></li>
									<li><a href="#">Feb 2018</a></li>
									<li><a href="#">Mar 2018</a></li>
								</ul>
							</div>
						</div>
						<!-- /archive -->
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
										<li><a href="aboux.php">About Us</a></li>
										<li><a href="#">Join Us</a></li>
										<li><a href="contacx.php">Contacts</a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-6">
								<div class="footer-widget">
									<h3 class="footer-title">Catagories</h3>
									<ul class="footer-links">
										<li><a href="categorx.php">Web Design</a></li>
										<li><a href="categorx.php">JavaScript</a></li>
										<li><a href="categorx.php">Css</a></li>
										<li><a href="categorx.php">Jquery</a></li>
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
