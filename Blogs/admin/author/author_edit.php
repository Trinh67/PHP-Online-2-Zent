<?php

require_once ('../../connection.php');

// Cau lenh truy van
$id = $_GET['id'];

$query_authors = "SELECT
  *
FROM
  authors
WHERE id =".$id;

// Thuc thi cau lenh
$result_authors = $conn -> query($query_authors);

// Tao 1 mang de chua du lieu

$author = $result_authors->fetch_assoc();  

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
    <h3 align="center">Update Author</h3>
    <hr>
        <?php if(isset($_COOKIE['msg'])){ ?>
        <div class="alert alert-warning">
          <?= $_COOKIE['msg'] ?>
        </div>
        <?php }?>
        <form action="author_edit_action.php" method="POST" role="form" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $author["id"] ?>">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" required id="" placeholder="" name="name" value="<?php echo $author["name"] ?>">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" id="" placeholder="" name="email" value="<?php echo $author["email"] ?>">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="text" class="form-control" id="" placeholder="" name="password" value="<?php echo md5($author["password"]) ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="list_authors.php" type="button" class="btn btn-primary">Back</a>
        </form>
    </div>
</body>
</html>