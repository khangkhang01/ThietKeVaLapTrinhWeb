<?php
	include("head.php");
?>

<style>
	*{
		font-family: Helvetica, Arial, sans-serif;
		font-size: 12pt;
	}
</style>

<?php
	include("topA.php");
?>

<?php
	include("connec.php");
	
	$mahd=$_POST["txtMaHD"];
	$tthd=$_POST["slDanhMuc"];
	
	$sql="UPDATE HoaDon SET TrangThaiHD='".$tthd."' where MaHD='".$mahd."'";
	$kq=mysqli_query($con,$sql)or die("Không thể sửa hóa đơn này".mysqli_error());
	echo("<script language='javascript'>
			alert('Cập nhật thành công.');
			window.location='managereceipt.php';
			</script>
		 ");
?>

<?php
	include("bottomA.php");
?>