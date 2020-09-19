<?php 
require_once "connect.php";

if(isset($_FILES['image']['tmp_name'])
	||isset($_POST['TenHang'] )
	||isset($_POST['DonGia'] )
	||isset($_POST['SoLuong'])
	||isset($_POST['MoTa'])
	||isset($_POST['TinhTrang'])
	||isset($_POST['MaLoai'])
	||isset($_POST['MaKhach'])){
	
	$TenHang = $_POST['TenHang'];
	$DonGia= $_POST['DonGia'];
	$SoLuong= $_POST['SoLuong'];
	$MoTa= $_POST['MoTa'];
	$TinhTrang= $_POST['TinhTrang'];
	$MaLoai= $_POST['MaLoai'];
	$MaKhach= $_POST['MaKhach'];

	$domain_name = "http://192.168.56.1:263/Shopping/" ;
	$target_dir = "ImagesHang";
	$target_dir = $target_dir . "/" .rand() . "_" . time() . ".jpeg";
		move_uploaded_file($_FILES['image']['tmp_name'],$target_dir);
		$target_dir = $domain_name . $target_dir ;
		$sqlInsert = "INSERT INTO Hang (TenHang,DonGia,SoLuong,MoTa,TinhTrang,MaLoai,MaKhach,HinhAnh) 
		VALUES ('$TenHang','$DonGia','$SoLuong','$MoTa','$TinhTrang','$MaLoai','$MaKhach','$target_dir')";
		$resultInsert = @mysqli_query($connect,$sqlInsert);
		if (isset($resultInsert)) {
			$response= "Thêm thành công!";
			echo json_encode($response);

		} else {
			$response= "Không thể thêm sản phẩm";
			echo json_encode($response);
		}

}else{
	$response= "Error!";
	echo json_encode($response);
}

?>