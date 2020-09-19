<?php 
require_once "Controller/Controller.php";
$server=$_GET["server"];
switch ($server) {
	case 'QuanLySanPham':
		$index=new Controller();
		$index->HienThi();
		break;
	case 'Dangnhap':
		$index=new Controller();
		$index->DangNhap();
		break;
	case 'Xoa':
		$index=new Controller();
		$index->Xoa();
		break;
	case 'Dangxuat':
		$index=new Controller();
		$index->DX();
		break;
	case 'DonDatHang':
		$index=new Controller();
		$index->DonDatHang();
		break;
	case 'KhachHang':
		$index=new Controller();
		$index->TaiKhoan();
		break;
	default:
		break;
}
 ?>