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
    <h3 align="center">Detail Authors</h3>
    <hr>
        <h2><em>Name:</em> <?php echo $author["name"] ?> </h2>
        <h2><em>Email:</em> <?php echo $author["email"] ?> </h2>
        <h2><em>Password:</em> <?php echo md5($author["password"]) ?></h2>
        <a href="list_authors.php" type="button" class="btn btn-primary">Back</a>
    </div>
</body>
</html>