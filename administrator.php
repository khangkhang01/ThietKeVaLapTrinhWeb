<?php
	session_start();
?>

<!DOCTYPE html>

<html>
<head>
    <title>Login</title>
    <link href="css1/styles.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<style>
	*{
		font-size:large;
	}
	</style>
</head>

<body style="background-color:HotPink;">
<div id="layoutAuthentication">
	<div id="layoutAuthentication_content"  style="margin-top:50px;">
		<main>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-5">
						<div class="card shadow-lg border-0 rounded-lg mt-5">
							<div class="card-header" style="background:Cornsilk; color:red;"><h2 class="text-center font-weight-light my-4">Đăng nhập</h2></div>
							<form name="frm_dangnhap" action="xlyLoginA.php" method="POST" onsubmit="return kiemtra()">
								<div class="card-body">
									<div style="padding:15px;">
										<table style="width:100%;">
											<tr>
												<td><i class="fas fa-user"></i></td>
												<td><input type="text" name="txtUsername" Class="form-control" required="required" placeholder="Nhập tên tài khoản"></td>
											</tr>
										</table>    							
									</div>
									<div style="padding:15px;">
										<table style="width:100%;">
											<tr>
												<td><i class="fas fa-lock"></i></td>
												<td><input type="password" name="txtPass" Class="form-control" required="required" placeholder="Nhập mật khẩu"></td>
											</tr>
										</table>    
									</div>
									<div class="form-check mb-3">
										<input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
										<label class="form-check-label" for="inputRememberPassword">Nhớ mật khẩu</label>
									</div>
									<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
										<a class="small" href="#">Quên mật khẩu?</a>
										<input type="submit" Class="btn btn-primary" value="Đăng nhập" Width="112px">
									</div>
								</div>
							</form>
							<div class="card-footer text-center py-3" style="background:Cornsilk;">
								<div class="small">Đăng nhập hệ thống</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
</div>
</body>
</html>