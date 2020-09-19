<?php 
require_once "connect.php";
if(isset($_FILES['image']['tmp_name'])&&isset( $_POST['TenKhach'] )&&isset( $_POST['DiaChi']) &&isset( $_POST['GioiTinh'])&&isset( $_POST['NgaySinh'])&&isset( $_POST['DienThoai'])&&isset( $_POST['Email'])&&isset( $_POST['MatKhau'])){
	$TenKhach = $_POST['TenKhach'];
	$DiaChi= $_POST['DiaChi'];
	$GioiTinh= $_POST['GioiTinh'];
	$NgaySinh= $_POST['NgaySinh'];
	$DienThoai= $_POST['DienThoai'];
	$Email= $_POST['Email'];
	$MatKhau= $_POST['MatKhau'];
	
	$domain_name = "http://192.168.56.1:263/Shopping/" ;
	$target_dir = "Image";
	$target_dir = $target_dir . "/" .rand() . "_" . time() . ".jpeg";
	$sqlCheck = "SELECT DienThoai,Email FROM KhachHang WHERE DienThoai = '$DienThoai' or Email='$Email' ";
	$result = mysqli_fetch_array(mysqli_query($connect,$sqlCheck));
	if ($result != 0){	
		$response = "Tài khoản đã tồn tại!";
		echo json_encode($response);
	} else {
		if($TenKhach!=""&&$DiaChi!=""&&$GioiTinh!=""&&$NgaySinh!=""&&$DienThoai!=""&&$Email!=""&&$MatKhau!=""){
			move_uploaded_file($_FILES['image']['tmp_name'],$target_dir);
			$target_dir = $domain_name . $target_dir ;
			$sqlInsert = "INSERT INTO KhachHang (TenKhach,DiaChi,GioiTinh,NgaySinh,DienThoai,Email,MatKhau,HinhAnh) 
			VALUES ('$TenKhach','$DiaChi','$GioiTinh','$NgaySinh','$DienThoai','$Email','$MatKhau','$target_dir')";
			$resultInsert = @mysqli_query($connect,$sqlInsert);
			if (isset($resultInsert)) {
				$response= "Đăng ký thành công!";
				echo json_encode($response);

			} else {
				$response= "Đăng ký thất bại!";
				echo json_encode($response);
			}

		}else{
				$response= "Nhập đầy đủ thông tin";
				echo json_encode($response);
		}
		
	}

}else{
	$response= "Error";
	echo json_encode($response);
}

?>