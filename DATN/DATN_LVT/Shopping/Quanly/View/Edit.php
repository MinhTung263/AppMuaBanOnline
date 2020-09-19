
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sửa</title>
	<style>
		tr{
			text-align: left;
		}
		table{
			margin: 0 auto;
			width: 600px;
		}
		.container{
			width: 700px;
			margin: 0 auto;
			box-shadow:0px 0px 3px 0px #000 ;
		}
		#a{

			text-align: center;
		}
		center{
			padding: 30px 10px;
			text-transform: uppercase;
			color: white;
		}
			#empty{
			margin-top: 10px;
			color: red;
		}
		#dx{
			color: #000;
			text-decoration: none;

		}
	</style>
</head>
<body>
	<div class="container">
		<form action="" method="post" enctype="multipart/form-data">
			<table >
				<tr>
					<th id="a" colspan="2"><h1>Sửa sinh viên</h1></th>
				</tr>
				<tr>
					<th>Tên sinh viên</th>
					<td><input type="text" name="ten_sv" value="<?=$sv['ten_sv']?>"></td>
				</tr>
				<tr>
					<th>Ngày sinh</th>
					<td><input type="date" name="ngaysinh" value="<?=$sv['ngaysinh']?>" ></td>
				</tr>
				<tr>
					<th>Giới tính</th>
					<td><input type="radio" name="gt" value="1" checked="checked">Nam
						<input type="radio" name="gt" value="0" > Nữ
					</td>
					
				</tr>
				<tr>
					<th>Lớp</th>
					<td>
						<select name="ma_lop">
						<?php foreach ($lop as $key => $value) {?>

							<option value="<?=$value['ma_lop']?>"
								<?php if ($sv['ma_lop']==$value['ma_lop']) {?>
									selected="selected"
								<?php } ?>>
								<?=$value['tenlop']?></option>
						<?php } ?>
						</select>
					</td>
				</tr>
			</table>
			<center><input type="submit" value="Sửa sinh viên" name="Sua"> <center>
		</form>
	</div>
</body>
</html>