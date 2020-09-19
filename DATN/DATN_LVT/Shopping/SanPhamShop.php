<?php 
require_once "connect.php";
 $json = file_get_contents('php://input');
 $obj = json_decode($json,true);
class Hang{
	function Hang($MaHang,$TenHang,$DonGia,$SoLuong,$HinhAnh,$MoTa,$TinhTrang,$MaLoai,
		$MaKhach,$TenKhach,$DiaChi,$GioiTinh,$NgaySinh,$DienThoai,$Email,$Avatar){
		$this->MaHang=$MaHang;
		$this->TenHang=$TenHang;
		$this->DonGia=$DonGia;
		$this->SoLuong=$SoLuong;
		$this->HinhAnh=$HinhAnh;
		$this->MoTa=$MoTa;
		$this->TinhTrang=$TinhTrang;
		$this->MaLoai=$MaLoai;

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
$array= array();
	 $mk=$obj['MaKhach'];
	$sql="SELECT * FROM hang,khachhang WHERE hang.MaKhach=khachhang.MaKhach AND khachhang.MaKhach='$mk' ORDER BY RAND()  ";
$data=mysqli_query($connect,$sql);	
while ($row=mysqli_fetch_assoc($data)) {
	array_push($array,new Hang($row["MaHang"],$row["TenHang"],$row["DonGia"],$row["SoLuong"],$row["HinhAnh"],
		$row["MoTa"],$row["TinhTrang"],$row["MaLoai"],
		$row["MaKhach"],$row["TenKhach"],$row["DiaChi"],$row["GioiTinh"],$row["NgaySinh"],$row["DienThoai"],$row["Email"],$row["Avatar"]));
}
$check = mysqli_fetch_array(mysqli_query($connect,$sql));
if($check==''){
	$khongcosp='Không tìm thấy sản phẩm nào';
	 echo json_encode($khongcosp);
}else{
	$json = json_encode($array);
	echo ($json);
}


?>