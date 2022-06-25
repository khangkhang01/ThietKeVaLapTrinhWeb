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
	
	$masp=$_POST["slSanPham"];
	$makt=$_POST["slSize"];
	$sluong=$_POST["nbSoLuong"];
	
	$sql="Select count(*) AS 'abc' from kichthuoc_sanpham WHERE MaKichThuoc='".$makt."' AND MaSanPham='".$masp."'";
	$kq=mysqli_query($con,$sql) or die("Không thể truy xuất bảng người dùng".mysqli_error());
	$kq1=mysqli_fetch_assoc($kq);
	$dem=$kq1['abc'];
	if($dem > 0)
	{
		echo("<script language='javascript'>
			alert('Size sản phẩm này đã tồn tại. Vui lòng chọn size sản phẩm khác !');
			window.location='product_size.php';
			 </script>
			");
	}
	else{	
		$sqlT="INSERT INTO `kichthuoc_sanpham` (`Id`, `MaSanPham`, `MaKichThuoc`, `SoLuong`) VALUES (NULL, '".$masp."', '".$makt."', '".$sluong."');";
		$kqT=mysqli_query($con,$sqlT)or die("Không thể thêm size sản phẩm này".mysqli_error());
		echo("<script language='javascript'>
				alert('Thêm thành công.');
				window.location='product_size.php';
				</script>
			 ");
	}
?>

<?php
	include("bottomA.php");
?>