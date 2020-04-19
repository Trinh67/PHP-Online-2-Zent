<?php
    require_once('../../connection.php');
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $contents = $_POST['contents'];
    // upload file
    $target_dir = "../../img/";  // thư mục chứa file upload
    $thumbnail="";

    $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]); // link sẽ upload file lên

    $status_upload = move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);

    if ($status_upload) { // nếu upload file không có lỗi 
        $thumbnail = basename( $_FILES["thumbnail"]["name"]);
    }else $thumbnail = $_POST["thumbnail"];


    $status = 0;
    if(isset($_POST['status'])) $status = $_POST['status'];

    $author_id = 1;

    $category_id = $_POST['category_id'];

    //Lấy thời gian
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $created_at =  date('Y-m-d H:i:s');

    $query = "UPDATE posts SET title = '".$title."',description = '".$description."',contents = '".$contents."',thumbnail = '".$thumbnail."',author_id = '".$author_id."',category_id = '".$category_id."',status = '".$status."',created_at = '".$created_at."' WHERE id = ".$id;
    
    $status_up = $conn->query($query);

    if($status_up == true){
        setcookie('msg','Cập nhật thành công',time()+1);
        header('Location: list_posts.php');
    }else{
        setcookie('msg','Cập nhật không thành công',time()+1);
        header('Location: post_edit.php');
    }
?>