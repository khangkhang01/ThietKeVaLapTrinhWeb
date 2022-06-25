<?php
	include("topU.php");
?>

<?php
	if(!isset($_SESSION["nameU"]))
	{
		echo("<script language='javascript'>
				 alert('Bạn phải đăng nhập mới được bình luận !');
				 window.location='loginU.php';
				</script>	
				");
	}
	else
	{
		include("connec.php");
		$masp=$_POST["txtMaSP"];
		$ndbl=$_POST["txtNDbinhluan"];
		$ngbl=date("Y-m-d");
		$nguoibl=$_SESSION["nameU"];
		$sql="INSERT INTO `binhluansp` (`Id`, `NoiDungBL`, `MaND`, `MaSP`, `NgayBLSP`, `TrangThai`) VALUES (NULL, '".$ndbl."', '".$nguoibl."', '".$masp."', '".$ngbl."', '0');";
		$kq=mysqli_query($con,$sql)or die("Không thể thêm size sản phẩm này".mysqli_error());
		echo("<script language='javascript'>
				alert('Bình luận thành công. Quản trị viên sẽ duyệt bình luận của bạn sớm nhất.');
				window.location='viewdetailtproduct.php?MaSP=".$masp."';
				</script>
			 ");
	}
?>

<?php
	include("bottomU.php");
?>