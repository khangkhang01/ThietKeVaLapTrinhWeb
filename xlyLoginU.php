<?php
	session_start();
	include("connec.php");
	$user=$_POST["txtUsername"];
	$pass=md5($_POST["txtPass"]);
	$sql="Select * from tblUser Where TenDangNhap='".$user."' AND MatKhau='".$pass."'";
	$kq=mysqli_query($con,$sql) or die("Không thể truy cập bảng USER".mysqli_error());
	if(mysqli_fetch_array($kq))
	{
		$_SESSION["nameU"]=$user;
		$_SESSION["allowU"]=true;
		echo("
			<script language='javascript'>
			alert('Đăng nhập với quyền thành viên thành công');
			window.location='cart.php'
			</script>		
		");
	}
	else
	{
		echo("
			<script language='javascript'>
			alert('Sai tên đăng nhập hoặc mật khẩu!');
			window.location='LoginU.php'
			</script>		
		");
	}
?>