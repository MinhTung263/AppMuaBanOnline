
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản lý sản phẩm</title>
	<!-- CSS only -->
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<style>
		th,td{
			font-size: 12px;
			font-family: sans-serif;
			line-height: 1;

		}
		table{
			margin: 0 auto;
			width: 100
		}
		.truncate {
			 display: block;
		 display: -webkit-box;
		 max-width: 100%;
		 height: 100px;
		 margin: 0 auto;
		 font-size: 14px;
		 line-height: 1;
		 -webkit-line-clamp: 3;
		 -webkit-box-orient: vertical;
		 overflow: hidden;
		 text-overflow: ellipsis;
		}
		#menu{
			background: #343a40
		}
		#ad{
			color: #fff
		}
		.vertical-nav {
			min-width: 17rem;
			width: 17rem;
			height: 100vh;
			position: fixed;
			top: 0;
			left: 0;
			box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.1);
			transition: all 0.4s;
		}

		.page-content {
			width: calc(100% - 17rem);
			margin-left: 17rem;
			transition: all 0.4s;
		}

		/* for toggle behavior */

		#sidebar.active {
			margin-left: -17rem;
		}

		#content.active {
			width: 100%;
			margin: 0;
		}

		@media (max-width: 768px) {
			#sidebar {
				margin-left: -17rem;
			}
			#sidebar.active {
				margin-left: 0;
			}
			#content {
				width: 100%;
				margin: 0;
			}
			#content.active {
				margin-left: 17rem;
				width: calc(100% - 17rem);
			}

		}

/*
*
* ==========================================
* FOR DEMO PURPOSE
* ==========================================
*
*/

/*body {
	background: #ccc;
	background: -webkit-linear-gradient(to right, #ccc, #ccc);
	background: linear-gradient(to right, #aaa, #aaa);
	min-height: 100vh;
	overflow-x: hidden;
}
*/
.separator {
	margin: 3rem 0;
	border-bottom: 1px dashed #fff;
}

.text-uppercase {
	letter-spacing: 0.1em;
}

.text-gray {
	color: #aaa;
}
#tc{
	font-size: 20px
}
</style>
</head>
<body>
	<!-- Vertical navbar -->
	<div class="vertical-nav bg-white" id="sidebar">
		<div class="py-4 px-3 mb-4 bg-light">
			<div class="media d-flex align-items-center"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556074849/avatar-1_tcnd60.png" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
				<div class="media-body">
					<h4 class="m-0"><?php echo $_SESSION["TenAdmin"]?></h4>
				</div>
			</div>
		</div>

		<p class="text-gray font-weight-bold text-uppercase px-3 small pb-3 mb-0">Main</p>

		<ul class="nav flex-column bg-white mb-0">
			<li class="nav-item">
				<a href="index.php?server=QuanLySanPham" class="nav-link text-dark font-italic bg-light">
					<i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
					Danh mục sản phẩm
				</a>
			</li>
			<li class="nav-item">
				<a href="index.php?server=DonDatHang" class="nav-link text-dark font-italic">
					<i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
					Đơn đặt hàng
				</a>
			</li>
			<li class="nav-item">
				<a href="index.php?server=KhachHang" class="nav-link text-dark font-italic">
					<i class="fa fa-cubes mr-3 text-primary fa-fw"></i>
					Tài khoản
				</a>
			</li>
			<li class="nav-item">

				<a href="index.php?server=Dangxuat" class="nav-link text-dark font-italic">
					<i class="fa fa-sign-out mr-3 text-primary fa-fw"></i>
					Đăng xuất
				</a>
			</li>
		</ul>
	</div>
	<div class="page-content p-5" id="content">
		<table class="table">
						<thead class="thead-dark">
							<tr >
								<th id="tc" colspan="9"> + Danh mục sản phẩm</th>
							</tr>
						</thead>
					
						<tr >
							<th scope="col">#</th>
							<th scope="col">Mã hàng</th>
							<th scope="col">Tên hàng</th>
							<th scope="col">Đơn giá</th>
							<th scope="col">Hình ảnh</th>
							<th scope="col">Mô tả</th>
							<th scope="col">Loại</th>
							<th scope="col">Cửa hàng</th>
							<th scope="col">Thao tác</th>
						</tr>
					
					<?php 
					$stt=0;
					foreach ($hienthi as $hang) { $stt++?>
						<tr>
							<td scope="col"><?=$stt?></td>
							<td scope="col"><?=$hang["MaHang"]?></td>
							<td scope="col" ><h6  class="truncate "> <?=$hang["TenHang"]?></h6></td>
							<td scope="col"><?=number_format($hang["DonGia"],0).' VNĐ'?></td>
							<td scope="col"><img  width=40px ;height=40px src="<?=$hang["HinhAnh"]?>"></td>
							<td scope="col"><h6 class="truncate "><?=$hang["MoTa"]?></h6> </td>
							<td scope="col" ><h6  class="truncate "> <?=$hang["TenLoai"]?></h6></td>
							<td scope="col" ><h6  class="truncate "> <?=$hang["TenKhach"]?></h6></td>
							<td scope="col"><a href="index.php?server=Xoa&id=<?=$hang['MaHang']?>">Xóa</a></td>
						</tr>
					<?php } ?>
					
				</table>
	</div>
	
</body>
</html>