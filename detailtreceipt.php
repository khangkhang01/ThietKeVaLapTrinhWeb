<?php
	include("topU.php");
?>

<style>
tr,td{
		padding:10px;
	}
	.tieude{
		color:red;
		font-weight:bold;
	}
	   .progia{
		font-family:sans-serif;
		font-weight:600;
		color:gray;
	}
	  .divDet1{
		border-bottom:1px dashed #D5D6D8;
		margin-bottom:20px;
	}
</style>

<?php
	include("connec.php");
	$mahdDetail=$_REQUEST["MaHD"];
	$sql="select MaHD, HoTenNguoiNH,DiaChiNH,SoDienThoaiNH, PhuongThucTT, GhiChuHD, TrangThaiHD, TenDangNhap, NgayDatHang from hoadon AND MaHD='".$mahdDetail."'; ";
	$kq=mysqli_query($con,$sql) or die("Bạn không thể truy cập bảng sản phẩm Size".mysqli_error());
	<h3 class="progia">Thông tin hóa đơn</h3>
	echo ("<div class="divDet1'>");
	echo(" <table style='width:80%; margin:auto;' >");
		while($row=mysqli_fetch_array($kq))
		{
			echo ("<tr>");
			echo("
				<td><td style="width:30%;">Mã Hóa Đơn</td></td>
				<td><span CssClass='form-control'>".$row["MaHD"]."</span></td>
			");
			echo("</tr>");
		}
	echo("</div>");
?>

<?php
	include("bottomU.php");
?>