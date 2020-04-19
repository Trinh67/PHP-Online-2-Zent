<?php

require_once ('../../connection.php');

// Cau lenh truy van
$id = $_GET['id'];

$query_categories = "SELECT
  *
FROM
  categories
WHERE id =".$id;

// Thuc thi cau lenh
$result_categories = $conn -> query($query_categories);

// Tao 1 mang de chua du lieu

$cate = $result_categories->fetch_assoc();  

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
    <h3 align="center">Update Category</h3>
    <hr>
        <?php if(isset($_COOKIE['msg'])){ ?>
        <div class="alert alert-warning">
          <strong>Thất bại! </strong> <?= $_COOKIE['msg'] ?>
        </div>
        <?php }?>
        <form action="category_edit_action.php" method="POST" role="form" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $cate["id"] ?>">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" required id="" placeholder="" name="title" value="<?php echo $cate["title"] ?>">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" class="form-control" id="" placeholder="" name="description" value="<?php echo $cate["description"] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="list_categories.php" type="button" class="btn btn-primary">Back</a>
        </form>
    </div>
</body>
</html>