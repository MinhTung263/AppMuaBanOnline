<?php 

class Model
{
	private $connect;
	public function __construct()
	{
		$this->connect=new PDO("mysql:host=localhost;dbname=shop;charset=utf8","root","");

	}
	public function View(){
		$model=new static();
		$sql="SELECT hang.MaHang,hang.TenHang,hang.DonGia,hang.HinhAnh,hang.MoTa,loai.TenLoai,khachhang.TenKhach from hang,loai,khachhang where hang.MaKhach=khachhang.MaKhach and hang.MaLoai=loai.MaLoai ";
		$stmt=$model->connect->prepare($sql);
		$stmt->execute();
		$result=$stmt->fetchAll();
		return $result;
	}
	public function Account(){
		$model=new static();
		$sql="SELECT * from khachhang";
		$stmt=$model->connect->prepare($sql);
		$stmt->execute();
		$result=$stmt->fetchAll();
		return $result;
	}
	public function Order(){
		$model=new static();
		$sql="SELECT dondathang.MaDonHang,khachhang.TenKhach,dondathang.NgayDat,hang.TenHang,hang.HinhAnh,dondathang.SoLuong,hang.DonGia   from hang,khachhang,dondathang where dondathang.MaKhach=khachhang.MaKhach AND dondathang.MaHang=hang.MaHang ";
		$stmt=$model->connect->prepare($sql);
		$stmt->execute();
		$result=$stmt->fetchAll();
		return $result;
	}
	public function Login(){
		if (isset($_POST["Dangnhap"])) {
			$username=$_POST["TenAdmin"];
			$password=$_POST["MatKhau"];
			$model=new static();
			$sql="SELECT TenAdmin,MatKhau FROM admin where TenAdmin='$username' and MatKhau='$password' ";
			$stmt=$model->connect->prepare($sql);
			$stmt->execute();
			$result=$stmt->fetch();
			if ($result!=0) {
				if (isset($_POST["TenAdmin"])||isset($_POST["MatKhau"])) {
					$_SESSION["TenAdmin"]=$_POST["TenAdmin"];
					$_SESSION["MatKhau"]=$_POST["MatKhau"];
				}
				header("location:index.php?server=QuanLySanPham");
			}else{
				header("location:index.php?server=Dangnhap&Empty");	
				}
			return $result;

		}
	}


	public function getID($id){
		$model=new static();
		$sql="DELETE from hang where MaHang='$id' ";
		$stmt=$model->connect->prepare($sql);
		$stmt->execute();
		$result=$stmt->fetch();
		return $result;

	}
	// public function getClass(){
	// 	$model=new static();
	// 	$sql="select * from tbl_lop ";
	// 	$stmt=$model->connect->prepare($sql);
	// 	$stmt->execute();
	// 	$result=$stmt->fetchAll();
	// 	return $result;

	// }
	public function Logout(){
		session_destroy();
		header("location:index.php?server=Dangnhap");
	}
}


 ?>