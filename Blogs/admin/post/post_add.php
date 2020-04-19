<?php

require_once ('../../connection.php');
// Load menu bài viết
// Cau lenh truy van
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
    <h3 align="center">Add New Category</h3>
    <hr>
        <?php if(isset($_COOKIE['msg'])){ ?>
        <div class="alert alert-warning">
          <strong><?= $_COOKIE['msg'] ?></strong>
        </div>
    <?php }?>
        <form action="post_add_action.php" method="POST" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" id="" placeholder="" name="title">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" id="" placeholder="" name="description">
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <textarea rows = "8" class="form-control" id="" placeholder="" name="contents"></textarea>
            </div>
            <div class="form-group">
                <select name="category_id" class="form-control">
                <?php foreach ($categories as $cate) {?>  
                  <option value="<?= $cate['id'] ?>"><?= $cate['title'] ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Thumbnail</label>
                <input type="file" class="form-control" id="" placeholder="" name="thumbnail">
            </div>
            <div>
                <label for=""> Hiển thị bài viết </label>
                <input type="checkbox" id="" value = "1" name="status"><em> (Check để hiển thị bài viết) </em>
                <br>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="list_posts.php" type="button" class="btn btn-primary">Back</a>
        </form>
    </div>
</body>
</html>