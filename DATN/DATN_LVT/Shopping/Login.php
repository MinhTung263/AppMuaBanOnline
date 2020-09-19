<?php 
require_once "connect.php";
 $json = file_get_contents('php://input');
 $obj = json_decode($json,true);
 $DienThoai = $obj['DienThoai'];
$MatKhau = $obj['MatKhau'];
 class Login{
		function Login($MaKhach,$TenKhach,$DiaChi,$GioiTinh,$NgaySinh,$DienThoai,$Email,$Avatar){
			$this->MaKhach=$MaKhach;
			$this->TenKhach=$TenKhach;
			$this->DiaChi=$DiaChi;
			$this->GioiTinh=$GioiTinh;
			$this->NgaySinh=$NgaySinh;
			$this->DienThoai=$DienThoai;
			$this->Email=$Email;
			$this->Avatar=$Avatar;
	}
}

$sql = "select * from khachhang where DienThoai = '$DienThoai'  and MatKhau = '$MatKhau' ";
$check = mysqli_fetch_array(mysqli_query($connect,$sql));
if(isset($check)){
		$Array= array();
		$sql="SELECT * FROM khachhang WHERE FIND_IN_SET('$DienThoai',DienThoai)";
		$data=mysqli_query($connect,$sql);	
		while ($row=mysqli_fetch_assoc($data)) {
			array_push($Array, new Login($row["MaKhach"],$row["TenKhach"],$row["DiaChi"],$row["GioiTinh"],$row["NgaySinh"],$row["DienThoai"],$row["Email"],$row["Avatar"]));
		}
		$json = json_encode($Array);
		echo ($json);
	}else{
	$thatbai = 'Tài khoản hoặc mật khẩu không chính xác!' ;
	echo json_encode($thatbai);
 }
	
 ?>