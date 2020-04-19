<?php
    require_once('../../connection.php');
    $id = $_GET['id'];
    $query = "DELETE FROM posts WHERE id = ".$id;
    $status = $conn->query($query);
    if($status == true){
        setcookie('msg','Xóa thành công',time()+1);
    }else{
        setcookie('msg','Xóa không thành công',time()+1);
    }
    header('Location: list_posts.php');
?>