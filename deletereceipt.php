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
	$mahdDelete=$_REQUEST["MaHD"];
	$selectCTHD="Select * from chitiethd where MaHD='".$mahdDelete."'";
	$kqSelect=mysqli_query($con,$selectCTHD) or die("Không thể mở bảng chi tiết hóa đơn".mysqli_error());
	
	while($row=mysqli_fetch_array($kqSelect))
	{
		$selectsize="Select * from kichthuoc where Size='".$row["SizeMua"]."'";
		$kqSize=mysqli_query($con,$selectsize) or die("Không thể mở bảng kích thước".mysqli_error());
		while($rowSize=mysqli_fetch_array($kqSize))
		{
			$sqlSL="update kichthuoc_sanpham set SoLuong=SoLuong + '".$row["SoLuongMua"]."' where MaSanPham='".$row["MaSP"]."' AND MaKichThuoc='".$rowSize["MaKichThuoc"]."'";
			$kqsize=mysqli_query($con,$sqlSL) or die("Không thể kết nối bảng kích thước sản phẩm".mysqli_error());
		}
	}
	$sql="DELETE from chitiethd where MaHD='".$mahdDelete."'";
	$kq=mysqli_query($con,$sql) or die("Không thể xóa hóa đơn".mysqli_error());
	$sql1="DELETE from hoadon where MaHD='".$mahdDelete."'";
	$kq1=mysqli_query($con,$sql1) or die("Không thể xóa hóa đơn".mysqli_error());
	echo("<script language='javascript'>
			 alert('Xóa thành công.');
			 window.location='managereceipt.php';
			</script>	
			");
?>

<?php
	include("bottomA.php");
?>


