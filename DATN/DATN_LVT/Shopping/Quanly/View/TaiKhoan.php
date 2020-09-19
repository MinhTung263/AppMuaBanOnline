
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
			font-size: 12px;
			font-family: sans-serif;
			max-width: 154px;
			overflow-x: hidden;
		  text-overflow: ellipsis;
		  white-space: nowrap;
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
				<a href="index.php?server=QuanLySanPham" class="nav-link text-dark font-italic">
					<i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
					Danh mục sản phẩm
				</a>
			</li>
			<li class="nav-item">
				<a href="index.php?server=DonDatHang" class="nav-link text-dark font-italic  ">
					<i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
					Đơn đặt hàng
				</a>
			</li>
			<li class="nav-item">
				<a href="index.php?server=KhachHang" class="nav-link text-dark font-italic bg-light">
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
								<th id="tc" colspan="11"> + Quản lý tài khoản khách hàng</th>
							</tr>
						</thead>
					
						<tr >
							<th scope="col">#</th>
							<th scope="col">Mã khách</th>
							<th scope="col">Tên khách hàng</th>
							<th scope="col">Địa chỉ</th>
							<th scope="col">Điện thoại</th>
							<th scope="col">Email</th>
							<th scope="col">Mật khẩu</th>
							<th scope="col">Giới tính</th>
							<th scope="col">Ngày sinh</th>
							<th scope="col">Avatar</th>
							<th scope="col">Thao tác</th>
						</tr>
					
					<?php 
					$stt=0;
					foreach ($kh as $hang) { $stt++?>
						<tr>
							<td scope="col"><?='0'.$stt?></td>
							<td scope="col"><?=$hang["MaKhach"]?></td>
							<td scope="col" ><h6  class="truncate "> <?=$hang["TenKhach"]?></h6></td>
							<td scope="col"><?=$hang["DiaChi"]?></td>
							<td scope="col"><h6  class="truncate "> <?=$hang["DienThoai"]?></h6></td>
							<td scope="col"><h6  class="truncate "> <?=$hang["Email"]?></h6></td>
							<td scope="col"><h6  class="truncate "> <?=$hang["MatKhau"]?></h6></td>
							<td scope="col"><h6  class="truncate "> <?=$hang["GioiTinh"]?></h6></td>
							<td scope="col"><h6  class="truncate "> <?=date("d/m/Y",strtotime($hang["NgaySinh"]))?></h6></td>
							<td scope="col"><img  width=40px ;height=40px src="<?=$hang["Avatar"]?>"></td>
							<td scope="col">
								<a href="index.php?server=Xoa&id=<?=$hang['MaHang']?>"> Xóa</a>

							</td>
						</tr>
					<?php } ?>
					
				</table>
	</div>
	
</body>
</html>