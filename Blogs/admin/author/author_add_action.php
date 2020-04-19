<?php
    require_once('../../connection.php');
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['$password']);
    $query = "INSERT INTO authors(name,email,password) VALUES ('".$name."', '".$email."', '".$password."');";
    $status = $conn->query($query);
    if($status == true){
    	setcookie('msg','Thêm mới thành công',time()+1);
    	header('Location: list_authors.php');
    }else{
    	setcookie('msg','Thêm mới không thành công',time()+1);
    	header('Location: author_add.php');
    }
?>