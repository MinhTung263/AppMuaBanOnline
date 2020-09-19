<?php 
require_once "connect.php";
 $json = file_get_contents('php://input');
 $obj = json_decode($json,true);
class Hang{
	function Hang($MaHang,$TenHang,$DonGia,$HinhAnh,$MoTa,$MaLoai,
		$MaKhach,$TenKhach,$DiaChi,$GioiTinh,$NgaySinh,$DienThoai,$Email,$Avatar){
		$this->MaHang=$MaHang;
		$this->TenHang=$TenHang;
		$this->DonGia=$DonGia;
		$this->HinhAnh=$HinhAnh;
		$this->MoTa=$MoTa;
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
if (isset($obj['tukhoa']) &&isset($obj['MaKhach'])) {
	$tukhoa=$obj['tukhoa'];
	$makhach=$obj['MaKhach'];
	$sql ="SELECT * FROM hang,khachhang where hang.MaKhach=khachhang.MaKhach AND hang.MaKhach!='$makhach' AND hang.TenHang   like N'%$tukhoa%'";	
	$check = mysqli_fetch_array(mysqli_query($connect,$sql));
	if($check==''){
		$khongcosp='Không tìm thấy sản phẩm nào';
		 echo json_encode($khongcosp);
	}else{
		$data=mysqli_query($connect,$sql);	
		while ($row=mysqli_fetch_assoc($data)) {
			array_push($array,new Hang($row["MaHang"],$row["TenHang"],$row["DonGia"],$row["HinhAnh"],
				$row["MoTa"],$row["MaLoai"],
				$row["MaKhach"],$row["TenKhach"],$row["DiaChi"],$row["GioiTinh"],$row["NgaySinh"],$row["DienThoai"],$row["Email"],$row["Avatar"]));
		}
			$json = json_encode($array);
		echo ($json);
	}

}else{
			$tukhoa=$obj['tukhoa'];
			$sql ="SELECT * FROM hang,khachhang where hang.MaKhach=khachhang.MaKhach AND hang.TenHang   like N'%$tukhoa%'";	
			$check = mysqli_fetch_array(mysqli_query($connect,$sql));
			if($check==''){
				$khongcosp='Không tìm thấy sản phẩm nào';
				 echo json_encode($khongcosp);
			}else{
				$data=mysqli_query($connect,$sql);	
				while ($row=mysqli_fetch_assoc($data)) {
					array_push($array,new Hang($row["MaHang"],$row["TenHang"],$row["DonGia"],$row["HinhAnh"],
						$row["MoTa"],$row["MaLoai"],
						$row["MaKhach"],$row["TenKhach"],$row["DiaChi"],$row["GioiTinh"],$row["NgaySinh"],$row["DienThoai"],$row["Email"],$row["Avatar"]));
				}
					$json = json_encode($array);
				echo ($json);
			}

	}


?>