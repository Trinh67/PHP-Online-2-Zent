<?php
    require_once('../../connection.php');
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
    }
    
    $status = 0;
    if(isset($_POST['status'])) $status = $_POST['status'];

    $author_id = 1;

    $category_id = $_POST['category_id'];

    //Lấy thời gian
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $created_at =  date('Y-m-d H:i:s');

    $query = "INSERT INTO posts(title,description,contents,thumbnail,author_id,category_id,status,created_at) VALUES ('".$title."', '".$description."', '".$contents."','".$thumbnail."', '".$author_id."', '".$category_id."', '".$status."', '".$created_at."');";
    
    $status_up = $conn->query($query);

    if($status_up == true){
        setcookie('msg','Thêm mới thành công',time()+1);
        header('Location: list_posts.php');
    }else{
        setcookie('msg','Thêm mới không thành công',time()+1);
        header('Location: post_add.php');
    }
?>