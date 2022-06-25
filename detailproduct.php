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
</style>


<?php
	include("topA.php");
?>
    <h2 style="text-align:center; color:red;">Chi tiết thông tin sản phẩm</h2>
<?php
	include("connec.php");
	$maspDetail=$_REQUEST["MaSP"];
	$sql="select * from SANPHAM where MaSanPham='".$maspDetail."'";
	$kq=mysqli_query($con,$sql) or die("Bạn không thể truy cập bảng sản phẩm".mysqli_error());
		echo("<table style='width:80%; margin:auto;'>");
		while($row=mysqli_fetch_array($kq))
		{
			echo("<tr>");
				echo("<td style='width:20%;'>Mã sản phẩm</td>
					  <td><span Class='form-control' style='font-weight:bold; font-style:italic;'>");echo $row["MaSanPham"];echo("</span></td>
					");
			echo("</tr>");
			echo("<tr>");
				echo("<td>Tên sản phẩm</td>
					  <td><span Class='form-control'style='font-weight:bold; font-style:italic;'>");echo $row["TenSanPham"];echo("</span></td>
					");
			echo("</tr>");
			echo("<tr>");
				echo("<td>Giá</td>
					  <td><span Class='form-control' style='font-weight:bold; font-style:italic;'>");echo $row["Gia"];echo("</span></td>
					");
			echo("</tr>");
			echo("<tr>");
				echo("<td>Bảo hành</td>
					  <td><span Class='form-control' style='font-weight:bold; font-style:italic;'>");echo $row["BaoHanh"];echo("</span></td>
					");
			echo("</tr>");
			echo("<tr>");
				echo("<td>Mô tả</td>
					<td height='100'><span Class='form-control' style='font-weight:bold; font-style:italic;'>");echo $row["MoTa"];echo("</span></td>
					");
			echo("</tr>");
			echo("<tr>");
				if($row["GioiTinh"]==1)
				{
				 echo("<td>Giới tính</td>
						<td><span Class='form-control' style='font-weight:bold; font-style:italic;'>Nam</span></td>
					  ");
				}
				else
				{
				 echo("<td>Giới tính</td>
						<td><span Class='form-control' style='font-weight:bold; font-style:italic;'>Nữ</span></td>
					");
				}
			echo("</tr>");
			echo("<tr style='height:300px;'>");
				echo("<td colspan='2'><table style='width:100%;'>
                    <tr style='height:200px; text-align:center;'>
                        <td style='width:25%;'>Hình Ảnh 1</td>
                        <td style='width:25%;'><img src='".$row["HinhAnh1"]."' style='height:150px; width:100%; object-fit:contain;'></td>
                        <td style='width:25%;'>Hình Ảnh 2</td>
                        <td><img src='".$row["HinhAnh2"]."' style='height:150px; width:100%; object-fit:contain;'></td>
                    </tr>
                     <tr style='height:150px; text-align:center;'>
                        <td>Hình Ảnh 3</td>
                        <td><img src='".$row["HinhAnh3"]."' style='height:150px; width:100%; object-fit:contain;'></td>
                        <td>Hình Ảnh 4</td>
                        <td><img src='".$row["HinhAnh4"]."' style='height:150px; width:100%; object-fit:contain;'></td>
                    </tr>
                </table>
					</td>
					");
			echo("</tr>");

			echo("<tr>");
				if($row["MaDanhMuc"]==1)
				{
					 echo("<td>Tên Danh Mục</td>
							<td><span Class='form-control' style='font-weight:bold; font-style:italic;'>Adidas</span></td>
						  ");
				}
				else if($row["MaDanhMuc"]==2)
				{
					 echo("<td>Tên Danh Mục</td>
							<td><span Class='form-control' style='font-weight:bold; font-style:italic;'>Nike</span></td>
						  ");
				}
				else
				{
					echo("<td>Tên Danh Mục</td>
						<td><span Class='form-control' style='font-weight:bold; font-style:italic;'>Puma</span></td>	
						");
				}
			echo("</tr>");
			echo("<tr>");
				echo("<td>Người tạo</td>
					  <td><span Class='form-control' style='font-weight:bold; font-style:italic;'>");echo $row["NguoiTao"];echo("</span></td>
					");
			echo("</tr>");
			echo("<tr>");
				echo("<td>Ngày tạo</td>
					  <td><span Class='form-control' style='font-weight:bold; font-style:italic;'>");echo $row["NgayTao"];echo("</span></td>
					");
			echo("</tr>");
			echo("<tr>");
				echo("<td>Người sửa</td>
					  <td><span Class='form-control' style='font-weight:bold; font-style:italic;'>&nbsp;");echo $row["NguoiSua"];echo("</span></td>
					");
			echo("</tr>");
			echo("<tr>");
				echo("<td>Ngày sửa</td>
					  <td><span Class='form-control' style='font-weight:bold; font-style:italic;'>&nbsp;");echo $row["NgaySua"];echo("</span></td>
					");
			echo("</tr>");
		}
		echo("</table>");
?>
    <div><a href="product.php" style="margin-left:30px;"><< Trở về</a> | <a href="<?php echo("updateproduct.php?MaSP=".$maspDetail)?>">Sửa</a></div>
<?php
	include("bottomA.php");
?>