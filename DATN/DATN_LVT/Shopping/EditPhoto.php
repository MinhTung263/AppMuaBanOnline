<?php 
require_once "connect.php";
$domain_name = "http://192.168.56.1:263/Shopping/" ;
$target_dir = "Image";
$target_dir = $target_dir . "/" .rand() . "_" . time() . ".jpeg";
if(move_uploaded_file($_FILES['image']['tmp_name'],$target_dir)){
	$DienThoai= $_POST['DienThoai'];
	$target_dir = $domain_name . $target_dir ;
	$sql= "UPDATE KhachHang SET HinhAnh='$target_dir' WHERE DienThoai='$DienThoai'";
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