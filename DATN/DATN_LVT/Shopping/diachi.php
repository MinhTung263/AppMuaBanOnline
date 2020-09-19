<?php 
require_once "connect.php";
 $json = file_get_contents('php://input');
 $obj = json_decode($json,true);
$DiaChi = $obj['DiaChi'];
$MaKhach = $obj['MaKhach'];
$sql = "UPDATE khachhang SET DiaChiDatHang='$DiaChi' WHERE MaKhach='$MaKhach' ";
$result = @mysqli_query($connect,$sql);
	if (isset($result)) {
		$response= "Success";
		echo json_encode($response);

	} else {
		$response= "Unsuccessful!";
		echo json_encode($response);
	}
 ?>