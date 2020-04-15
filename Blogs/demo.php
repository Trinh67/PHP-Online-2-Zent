<?php
// Thong so ket noi CSDL

$servername = "localhost"; // Dia chi IP cua may

$username = "root"; // Ten dang nhap

$password = ""; // Mat khau truy cap

$dbname = "blogs"; // Ten CSDL muon ket noi den

// Tao ket noi den CSDL

$conn = new mysqli($servername, $username, $password, $dbname);

// Cau lenh truy van
$query = "SELECT * FROM categories";

// Thuc thi cau lenh
$result = $conn -> query($query);

// Tao 1 mang de chua du lieu
$categories = array();

while ($row = $result->fetch_assoc()) {
	$categories[] = $row;
}

foreach ($categories as $cate){
	echo "<pre>";
	    print_r($cate);
    echo "</pre>";
}
?>