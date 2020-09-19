<?php 
session_start();
require_once "Model/Model.php";
class Controller extends Model
{
	
	public function HienThi(){
		if (isset($_SESSION["TenAdmin"])||isset($_SESSION["MatKhau"])) {
			$hienthi=Model::View();
			require_once "View/View.php";
		}else{
			header("location:index.php?server=Dangnhap");
		}
		
	}

	
	public function DangNhap(){
		Model::Login();
		require_once "View/Dangnhap.php";
	}
	public function Xoa(){
		$id=$_GET["id"];
		$sp=Model::getID($id);
		if (isset($_GET["id"])==$sp["MaHang"]) {
			if (isset($_POST["Xoa"])) {
				if (isset($_SESSION["TenAdmin"])) {
					if ($_SESSION["TenAdmin"]=="Admin") {
						Model::getID($id);
					}else{
						header("location:index.php?server=Dangxuat");
						}
				}else{
					header("location:index.php?server=Dangnhap");
				}
			}
			require_once "View/View.php";
		}else{
			header("location:index.php?server=QuanLySanPham");
		}
	}
	public function DonDatHang(){
		$od=Model::Order();
		require_once "View/DonDatHang.php";
	}
	public function TaiKhoan(){
		$kh=Model::Account();
		require_once "View/TaiKhoan.php";
	}
	public function DX(){
		Model::Logout();
		require_once "View/View.php";
	}


}


 ?>