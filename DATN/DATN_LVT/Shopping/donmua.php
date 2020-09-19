<?php 
require_once "connect.php";
$json = file_get_contents('php://input');
$data=json_decode($json,true);
if (isset($data)) {
		$NgayDat = date('Y-m-d');
		$SoLuong=$data["SoLuong"];
		$DonGia=$data["DonGia"];
		$MaHang=$data["MaHang"];
		$MaKhach=$data["MaKhach"];
		$sql="INSERT INTO dondathang(NgayDat,SoLuong,DonGia,MaHang,MaKhach) VALUES ('$NgayDat','$SoLuong','$DonGia','$MaHang','$MaKhach')";
		$result= mysqli_query($connect,$sql);
	if (isset($result)) {
		$tc="Success!";
		echo json_encode($tc);
	}
}

?>