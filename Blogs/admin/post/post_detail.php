<?php

require_once ('../../connection.php');

// Cau lenh truy van
$id = $_GET['id'];

$query_posts = "SELECT
    p.*, c.title as category, a.name 
FROM
    posts p
    LEFT JOIN categories c ON p.category_id = c.id 
    LEFT JOIN authors a ON p.author_id = a.id
WHERE
    p.id = ".$id;

// Thuc thi cau lenh
$result_posts = $conn -> query($query_posts);

// Tao 1 mang de chua du lieu

$post = $result_posts->fetch_assoc();  

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Zent - Education And Technology Group</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <h3 align="center">Zent - Education And Technology Group</h3>
    <h3 align="center">Detail Post</h3>
    <hr>
        <h2><em>Title:  </em> <?php echo $post["title"] ?> </h2>
        <h2><em>Description:  </em> <?php echo $post["description"] ?></h2>
        <h2><em>Content:  </em> <?php echo $post["contents"] ?> </h2>
        <h2><em>Thumbnail: </em><img src = "../../img/<?php echo $post["thumbnail"] ?>" weight = "300px" height = "200px"> </h2>
        <h2><em>Category:  </em> <?php echo $post["category"] ?> </h2>
        <h2><em>Author:  </em> <?php echo $post["name"] ?> </h2>
        <h2><em>Status:  </em> <?php echo $post["status"] ?> </h2>
        <h2><em>Created at:</em> <?php echo $post["created_at"] ?> </h2>
        <a href="list_posts.php" type="button" class="btn btn-primary">Back</a>
    </div>
</body>
</html>