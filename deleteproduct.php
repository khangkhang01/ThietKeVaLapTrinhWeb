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
	$maspDelete=$_REQUEST["MaSP"];
	$sql="DELETE from SANPHAM where MaSanPham='".$maspDelete."'";
	$kq=mysqli_query($con,$sql) or die("Không thể xóa sản phẩm".mysqli_error());
	echo("<script language='javascript'>
			 alert('Xóa thành công.');
			 window.location='product.php';
			</script>	
			");
?>

<?php
	include("bottomA.php");
?>


