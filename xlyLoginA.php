<?php
	session_start();
	include("connec.php");
	$user=$_POST["txtUsername"];
	$pass=md5($_POST["txtPass"]);
	$sql="Select * from tblAdmin Where TenDangNhapA='".$user."' AND MatKhauA='".$pass."'";
	$kq=mysqli_query($con,$sql) or die("Không thể truy cập bảng admin".mysqli_error());
	if(mysqli_fetch_array($kq))
	{
		$_SESSION["nameA"]=$user;
		$_SESSION["allowA"]=true;
		echo("
			<script language='javascript'>
			alert('Đăng nhập thành công');
			window.location='admin.php'
			</script>		
		");
	}
	else
	{
		echo("
			<script language='javascript'>
			alert('Sai tên đăng nhập hoặc mật khẩu!');
			window.location='administrator.php'
			</script>		
		");
	}
?>
