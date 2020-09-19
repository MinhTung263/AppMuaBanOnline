
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<style>
		.container{
			border-radius: 7px;
			
			border: 1px solid rgba(128,0,0,1);
		}
		.tieude{
			width: 100%;

			border-top-right-radius: 5px;
			border-top-left-radius:5px;
			background: rgba(128,0,0,1) ;
		}
		.center{
						padding: 10px 100px;
			text-transform: uppercase;
			color: white;
		}
		.noidung{
			padding: 30px 35px;
		}
		
		#cancel{
			text-transform: capitalize;
			text-decoration: none;
			color: #000;
		}
		#empty{
			margin-top: 10px;
			color: red;
		}
		
	</style>
</head>
<body>
	<div class="container">
			<h1><center>ĐĂNG NHẬP</center></h1>
		<div class="noidung">
			<form action="" method="post">
				<table class="table table-borderless">
					<tr>
						<th>Username</th>
						<td><input class="container" type="text" name="TenAdmin" ></td>
					</tr>
					<tr>
						<th>Password</th>
						<td><input  class="container" type="password" name="MatKhau" ></td>
					</tr>
					<tr>
						<th></th>
						<td id="empty">
						<?php if (isset($_GET["Empty"])) {?>
							<span>Người dùng không tồn tại!</span>
						<?php } ?>							
						</td>
					</tr>
				</table>
				<center>
					<input class="btn btn-success" type="submit" name="Dangnhap" value="Đăng nhập">
					<input type="button" class="btn btn-danger" type="submit" value="Cancel"><a id="cancel" href="index.php?server=Dangnhap"></a></input>
				</center>
			</form>
		</div>
	</div>
</body>
</html>