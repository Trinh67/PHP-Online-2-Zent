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

$query_categories = "SELECT
  *
FROM
  categories";

// Thuc thi cau lenh
$result_categories = $conn -> query($query_categories);

// Tao 1 mang de chua du lieu
$categories = array();

while ($row = $result_categories->fetch_assoc()) {
  $categories[] = $row;
}  

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
    <h3 align="center">Update Post</h3>
    <hr>
        <?php if(isset($_COOKIE['msg'])){ ?>
        <div class="alert alert-warning">
          <strong>Thất bại! </strong> <?= $_COOKIE['msg'] ?>
        </div>
        <?php }?>
        <form action="post_edit_action.php" method="POST" role="form" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $post["id"] ?>">
            <input type="hidden" name="thumbnail" value="<?php echo $post["thumbnail"] ?>">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" required id="" placeholder="" name="title" value="<?php echo $post["title"] ?>">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" id="" placeholder="" name="description" value="<?php echo $post["description"] ?>">
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <textarea rows = "8" class="form-control" id="" placeholder="" name="contents" ><?php echo $post["contents"] ?></textarea>
            </div>
            <div class="form-group">
                <label for="">Current Category: </label><em>  <?= $post['category'] ?></em>
                <select name="category_id" class="form-control">
                <?php foreach ($categories as $cate) {?>  
                  <option value="<?= $cate['id'] ?>"><?= $cate['title'] ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Thumbnail</label>
                <input type="file" class="form-control" id="" placeholder="" name="thumbnail"><em>Current Thumnail: </em><img src="../../img/<?php echo $post["thumbnail"] ?>" weight = "300px" height = "200px">
            </div>
            <div>
                <label for=""> Hiển thị bài viết </label>
                <input type="checkbox" id="" value="1" name="status"><em> (Check để hiển thị bài viết) </em>
                <br>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="list_posts.php" type="button" class="btn btn-primary">Back</a>
        </form>
    </div>
</body>
</html>