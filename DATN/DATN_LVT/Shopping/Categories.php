<?php 
require_once "connect.php";

$result = mysqli_query($connect, 'select count(MaLoai) as total from loai');
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 3;
 
// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
// tổng số trang
$total_page = ceil($total_records / $limit);
 
// Giới hạn current_page trong khoảng 1 đến total_page
if ($current_page > $total_page){
    $current_page = $total_page;
}
else if ($current_page < 1){
    $current_page = 1;
}
 
// Tìm Start
$start = ($current_page - 1) * $limit;
		$sql="SELECT * FROM Loai LIMIT $start, $limit ";
class Loai{
	function Loai($MaLoai,$TenLoai,$HinhAnh){
		$this->MaLoai=$MaLoai;
		$this->TenLoai=$TenLoai;
		$this->HinhAnh=$HinhAnh;
	}
}
	$Array= array();
	$data=mysqli_query($connect,$sql);	
	while ($row=mysqli_fetch_assoc($data)) {
		array_push($Array, new Loai($row["MaLoai"],$row["TenLoai"],$row["HinhAnh"]));
	}
	$json = json_encode($Array);
	echo ($json);
 ?>