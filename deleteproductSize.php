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
	$maspDelete=$_REQUEST["Masp"];
	$maktDelete=$_REQUEST["Makt"];
	$sql="DELETE from kichthuoc_sanpham where MaSanPham='".$maspDelete."' AND MaKichThuoc='".$maktDelete."'";
	$kq=mysqli_query($con,$sql) or die("Không thể xóa kích thước sản phẩm".mysqli_error());
	echo("<script language='javascript'>
			 alert('Xóa thành công.');
			 window.location='product_size.php';
			</script>	
			");
?>

<?php
	include("bottomA.php");
?>


