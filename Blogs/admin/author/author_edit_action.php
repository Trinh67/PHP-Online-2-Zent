<?php
    require_once('../../connection.php');
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = "UPDATE authors SET name = '".$name."', email = '".$email."', password = '".$password ."' WHERE id =".$id;
    $status = $conn->query($query);
    if($status == true){
    	setcookie('msg','Cập nhật thành công',time()+1);
    	header('Location: list_authors.php');
    }else{
    	setcookie('msg','Cập nhật không thành công',time()+1);
    	header('Location: author_edit.php');
    }
?>