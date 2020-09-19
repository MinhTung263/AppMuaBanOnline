<?php 
require_once "connect.php";
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
$TenKhach = $obj['TenKhach'];
$DiaChi= $obj['DiaChi'];
$NgaySinh= $obj['NgaySinh'];
$DienThoai= $obj['DienThoai'];

if (isset($DienThoai)) {
	$sql= "UPDATE KhachHang SET TenKhach='$TenKhach',DiaChi='$DiaChi',NgaySinh='$NgaySinh' 
	WHERE DienThoai='$DienThoai'";
	$result = @mysqli_query($connect,$sql);
	if (isset($result)) {
		$response= "Success";
		echo json_encode($response);

	} else {
		$response= "Unsuccessful!";
		echo json_encode($response);
	}

}

			
?>