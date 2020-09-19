<?php 
require_once "connect.php";
		$sql="SELECT * FROM theloai ORDER BY RAND() ";
class DanhMuc{
	function DanhMuc($idTheLoai,$TenTheLoai){
		$this->idTheLoai=$idTheLoai;
		$this->TenTheLoai=$TenTheLoai;
	}
}
	$Array= array();
	$data=mysqli_query($connect,$sql);	
	while ($row=mysqli_fetch_assoc($data)) {
		array_push($Array, new DanhMuc($row["idTheLoai"],$row["TenTheLoai"]));
	}
	$json = json_encode($Array);
	echo ($json);
 ?>