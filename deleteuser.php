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
	$mauDelete=$_REQUEST["MaUser"];
	$sql="DELETE from tblUser where TenDangNhap='".$mauDelete."'";
	$kq=mysqli_query($con,$sql) or die("Không thể xóa người dùng này".mysqli_error());
	echo("<script language='javascript'>
			 alert('Xóa thành công.');
			 window.location='manageuser.php';
			</script>	
			");
?>

<?php
	include("bottomA.php");
?>


