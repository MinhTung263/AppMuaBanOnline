<?php 
require_once "connect.php";
$json = file_get_contents('php://input');
$obj = json_decode($json,true);
$MaKhach= $obj['MaKhach'];
class Login{
		function Login($TenHang,$DonGia,$SoLuong,$HinhAnh){
			$this->TenHang=$TenHang;
			$this->DonGia=$DonGia;
			$this->SoLuong=$SoLuong;
			$this->HinhAnh=$HinhAnh;
	}
}
	$Array= array();
	if (isset($MaKhach)) {
		$sql="SELECT hang.TenHang,hang.DonGia,dondathang.SoLuong,hang.HinhAnh FROM dondathang,khachhang,hang WHERE dondathang.MaHang=hang.MaHang AND dondathang.MaKhach=khachhang.MaKhach AND dondathang.MaKhach='$MaKhach' ";
		$data=mysqli_query($connect,$sql);

		while ($row=mysqli_fetch_assoc($data)) {
			array_push($Array, new Login($row["TenHang"],$row["DonGia"],$row["SoLuong"],$row["HinhAnh"]));
		}
		$json = json_encode($Array);
		echo ($json);
	}


 ?>