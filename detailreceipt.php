<?php
	include("head.php");
?>

<style>
	*{
		font-family: Helvetica, Arial, sans-serif;
		font-size: 12pt;
	}	
	tr,td{
		padding:10px;
		font-size: 14pt;
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
	include("topA.php");
?>

<?php
	include("connec.php");
	$mahdDetail=$_REQUEST["MaHD"];
	$sql="select MaHD, HoTenNguoiNH,DiaChiNH,SoDienThoaiNH, PhuongThucTT, GhiChuHD, TrangThaiHD, TenDangNhap, NgayDatHang from hoadon where MaHD='".$mahdDetail."';";
	$kq=mysqli_query($con,$sql) or die("Bạn không thể truy cập bảng sản phẩm Size".mysqli_error());
		echo("<h2 class='progia' style='text-align:center;'>Thông tin hóa đơn</h2>");
		echo ("<div class='divDet1'>");
		echo(" <table style='width:80%; margin:auto;' >");
		while($row=mysqli_fetch_array($kq))
		{
			echo("<tr>");
				echo("<td style='width:30%;'>Mã Hóa Đơn</td>
					  <td><span Class='form-control'>");echo $row["MaHD"];echo("</span></td>
					");
			echo("</tr>");
			echo("<tr>");
				echo("<td>Họ tên người nhận hàng</td>
					  <td><span Class='form-control'>");echo $row["HoTenNguoiNH"];echo("</span></td>
					");
			echo("</tr>");
			echo("<tr>");
				echo("<td>Địa chỉ nhận hàng</td>
					  <td><span Class='form-control'>");echo $row["DiaChiNH"];echo("</span></td>
					");
			echo("</tr>");
			echo("<tr>");
				echo("<td>Số điện thoại</td>
					  <td><span Class='form-control'>");echo $row["SoDienThoaiNH"];echo("</span></td>
					");
			echo("</tr>");
			echo("<tr>");
				if($row["PhuongThucTT"]==1)
				{
				 echo("<td>Phương thức thanh toán</td>
						<td><span Class='form-control'>Trả tiền khi nhận hàng</span></td>
					  ");
				}
				else
				{
				 echo("<td>Phương thức thanh toán</td>
						<td><span Class='form-control'>Chuyển khoản ngân hàng</span></td>
					");
				}
			echo("</tr>");
			echo("<tr>");
				echo("<td>Ghi chú hóa đơn</td>
					<td height='100'><span Class='form-control'>&nbsp;");echo $row["GhiChuHD"];echo("</span></td>
					");
			echo("</tr>");
			echo("<tr>");
				if($row["TrangThaiHD"]==1)
				{
				 echo("<td>Trạng thái hóa đơn</td>
						<td><span Class='form-control'>Đơn hàng mới</span></td>
					  ");
				}
				else if($row["TrangThaiHD"]==2)
				{
				 echo("<td>Trạng thái hóa đơn</td>
						<td><span Class='form-control'>Đang giao</span></td>
					");
				}
				else
				{
					echo("<td>Trạng thái hóa đơn</td>
						<td><span Class='form-control'>Đã giao</span></td>
					");
				}
			echo("</tr>");
			echo("<tr>");
				echo("<td>Tài khoản đăng nhập</td>
					  <td><span Class='form-control'>");echo $row["TenDangNhap"];echo("</span></td>
					");
			echo("</tr>");
			echo("<tr>");
				echo("<td>Ngày đặt hàng</td>
					  <td><span Class='form-control'>");echo $row["NgayDatHang"];echo("</span></td>
					");
			echo("</tr>");
		}
		echo("</table><br>");
		echo("</div>");
		$sql1="select MaHD, HoTenNguoiNH,DiaChiNH,SoDienThoaiNH, PhuongThucTT, GhiChuHD, TrangThaiHD, TenDangNhap, NgayDatHang from hoadon where MaHD='".$mahdDetail."';";
		$kq1=mysqli_query($con,$sql) or die("Bạn không thể truy cập bảng sản phẩm Size".mysqli_error());
?>
		
		<h2 class="progia" style="text-align:center;">Chi tiết hóa đơn</h2>
		<div>
		<table class="table table-bordered table-striped" style="width:90%; margin:auto;">
		<thead>
		  <tr>
			<th>Mã sản phẩm</th>
			<th>Tên sản phẩm</th>
			<th>Hình sản phẩm</th>
			<th>Size</th>
			<th>Giá</th>
			<th>Số lượng</th>
			<th>Thành tiền</th>
		  </tr>
		</thead> 
		<tbody id="myTable">
<?php
	include("connec.php");
	$sql="SELECT sp.MaSanPham, TenSanPham, HinhAnh1, SizeMua, Gia, SoLuongMua, ThanhTien FROM sanpham sp, chitiethd ct where sp.MaSanPham=ct.MaSP AND ct.MaHD='".$mahdDetail."'; ";
	$kq=mysqli_query($con,$sql) or die("Không thể kết nối bảng hóa đơn".mysqli_error());
	while($row=mysqli_fetch_array($kq))
	{
		echo("<tr>");
		echo("<td>".$row["MaSanPham"]."</td>");$MaHD=$row["MaSanPham"];
		echo("<td>".$row["TenSanPham"]."</td>");
		echo("<td style='text-align:center;'><img src='".$row["HinhAnh1"]."' alt='images' style='width:125px; height:125px; object-fit:contain;'></td>");
		echo("<td>".$row["SizeMua"]."</td>");
		echo("<td>".$row["Gia"]."</td>");
		echo("<td>".$row["SoLuongMua"]."</td>");
		echo("<td>".$row["ThanhTien"]."</td>");
		echo("</tr>");
	} 
?>
	</tbody>
	</table>
</div>
	<br>	
    <div><a href="managereceipt.php" style="margin-left:30px;"><< Trở về</a> | <a href="<?php echo("updatereceipt.php?MaHD=".$mahdDetail)?>">Sửa</a></div>
<?php
	include("bottomA.php");
?>
