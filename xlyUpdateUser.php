<?php
	include("topU.php");
?>

<?php	
	include("connec.php");

	if(!isset($_SESSION["nameU"]))
	{
		echo("<script language='javascript'>
			alert('Bạn không có quyền trên trang này');
			window.location='administrator.php';
			</script>
		");
	}
	else
	{	
		$username=$_POST["txtUsername"];
		$pass=md5($_POST["txtPass"]);
		$passC=$_POST["hdmatkhau"];
		$passM=md5($_POST["txtPass1"]);
		if(isset($_POST['sbmSignUp'])){
			if($pass!=$passC){
				echo("<script language='javascript'>
					alert('Mật khẩu củ của bạn không đúng ?');
					window.location='DoimatkhauND.php';
					 </script>
					");
			}
		}
		$sql="update tblUser set MatKhau='".$passM."' where TenDangNhap='".$username."'";
		$kq=mysqli_query($con,$sql) or die ("không cập nhật được bảng người dùng".mysqli_error());
		echo("<script language='javascript'>
			alert('Đổi mật khẩu thành công');
			window.location='index.php';
			</script>
		");

	}

?>	
<?php
	include("bottomU.php");
?>