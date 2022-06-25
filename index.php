<?php
	include("topU.php");
?>

    <style type="text/css">
        .mota{
            font-size:15px;
            font-weight:bold;
            line-height:15px;
            text-transform:uppercase;
            font-family:sans-serif;
            text-align:center;
        }
        .active1{
            font-size:20px;
            font-weight:bold;
            font-style:italic;
        }
         .pronameview{
            line-height:25px;
            font-family:sans-serif;
            font-weight:600;
            color:#696e80;
        }
    </style>

    <h3 style="text-align:center;">TOP SẢN PHẨM MỚI NHẤT</h3>
	<form method="POST" name="frmTimkiem" action="">
		<table style="width:80%;margin:auto;">
			<tr>
				<td style="width:70%;"><input type="text" name="txtTimkiem" placeholder="Search theo giá hoặc tên sản phẩm" Class="form-control"></td>
				<td>
					<select name="slGia">
						<option	value="0">Giá</option>
						<option	value="1">Dưới 1 triệu</option>
						<option value="2">Từ 1 - 2 triệu</option>
						<option value="3">Trên 2 triệu</option>
					</select>
				</td>
				<td><input type="submit" name="sbmTimkiem" value="Tìm kiếm"></td>
			</tr>
		</table>
	</form>
    <div class="row">
		<?php
		include("connec.php");
		if(isset($_POST["sbmTimkiem"]))
		{
			$ten=$_POST["txtTimkiem"];
			$gia=$_POST["slGia"];
			if($ten!="")
			{
				if($gia==0)
				{
					$sql="select DISTINCT sp.MaSanPham, sp.TenSanPham,sp.Gia, sp.GioiTinh,sp.MaDanhMuc,sp.HinhAnh1 from sanpham sp, kichthuoc_sanpham ks where sp.MaSanPham=ks.MaSanPham AND ks.SoLuong>0 AND TenSanPham LIKE '%".$ten."%' ORDER BY sp.MaSanPham ASC";
					$kq=mysqli_query($con,$sql) or die("Không thể kết nối bảng sản phẩm".mysqli_error());
				}
				if($gia==1)
				{
					$sql="select DISTINCT sp.MaSanPham, sp.TenSanPham,sp.Gia, sp.GioiTinh,sp.MaDanhMuc,sp.HinhAnh1 from sanpham sp, kichthuoc_sanpham ks where sp.MaSanPham=ks.MaSanPham AND ks.SoLuong>0  AND TenSanPham LIKE '%".$ten."%' AND Gia < 1000000 ORDER BY sp.MaSanPham ASC";
					$kq=mysqli_query($con,$sql) or die("Không thể kết nối bảng sản phẩm".mysqli_error());
				}
				if($gia==2)
				{
					$sql="select DISTINCT sp.MaSanPham, sp.TenSanPham,sp.Gia, sp.GioiTinh,sp.MaDanhMuc,sp.HinhAnh1 from sanpham sp, kichthuoc_sanpham ks where sp.MaSanPham=ks.MaSanPham AND ks.SoLuong>0  AND TenSanPham LIKE '%".$ten."%' AND Gia >= 1000000 AND Gia <=2000000 ORDER BY sp.MaSanPham ASC";
					$kq=mysqli_query($con,$sql) or die("Không thể kết nối bảng sản phẩm".mysqli_error());
				}
				if($gia==3)
				{
					$sql="select DISTINCT sp.MaSanPham, sp.TenSanPham,sp.Gia, sp.GioiTinh,sp.MaDanhMuc,sp.HinhAnh1 from sanpham sp, kichthuoc_sanpham ks where sp.MaSanPham=ks.MaSanPham AND ks.SoLuong>0  AND TenSanPham LIKE '%".$ten."%' AND Gia > 2000000 ORDER BY sp.MaSanPham ASC";
					$kq=mysqli_query($con,$sql) or die("Không thể kết nối bảng sản phẩm".mysqli_error());
				}
			}
			else
			{
				if($gia==0)
				{
					echo("<script language='javascript'>
							window.location='index.php';
							 </script>");
				}
				if($gia==1)
				{
					$sql="select DISTINCT sp.MaSanPham, sp.TenSanPham,sp.Gia, sp.GioiTinh,sp.MaDanhMuc,sp.HinhAnh1 from sanpham sp, kichthuoc_sanpham ks where sp.MaSanPham=ks.MaSanPham AND ks.SoLuong>0  AND Gia < 1000000 ORDER BY sp.MaSanPham ASC";
					$kq=mysqli_query($con,$sql) or die("Không thể kết nối bảng sản phẩm".mysqli_error());
				}
				if($gia==2)
				{
					$sql="select DISTINCT sp.MaSanPham, sp.TenSanPham,sp.Gia, sp.GioiTinh,sp.MaDanhMuc,sp.HinhAnh1 from sanpham sp, kichthuoc_sanpham ks where sp.MaSanPham=ks.MaSanPham AND ks.SoLuong>0  AND Gia >= 1000000 AND Gia <=2000000 ORDER BY sp.MaSanPham ASC";
					$kq=mysqli_query($con,$sql) or die("Không thể kết nối bảng sản phẩm".mysqli_error());
				}
				if($gia==3)
				{
					$sql="select DISTINCT sp.MaSanPham, sp.TenSanPham,sp.Gia, sp.GioiTinh,sp.MaDanhMuc,sp.HinhAnh1 from sanpham sp, kichthuoc_sanpham ks where sp.MaSanPham=ks.MaSanPham AND ks.SoLuong>0  AND Gia > 2000000 ORDER BY sp.MaSanPham ASC";
					$kq=mysqli_query($con,$sql) or die("Không thể kết nối bảng sản phẩm".mysqli_error());
				}
			}
			while($row=mysqli_fetch_array($kq))
			{
				echo("<div class='col-sm-6 col-md-4' style='padding-top:25px;'>");
				$MaSP=$row["MaSanPham"];
				echo("<div class='thumbnail' style='width:90%;height:325px; margin:auto;' >");;
				echo("<a href='viewdetailtproduct.php?MaSP=$MaSP'><img src='".$row["HinhAnh1"]."' alt='images'  style='height:225px;width:225px; object-fit:contain;' /></a>");
				echo("<div class='caption'>");
				echo("<div class='mota'>");
				echo("<span class='PronameView'>".$row["TenSanPham"]."</span>");
				echo("<br /><br />Giá: <span style='font-style:italic;'>"); echo number_format($row["Gia"],0,",","."); echo(" VND</span>");
				echo('</div>');
				echo('</div>');
				echo('</div>');
				echo('</div>');
			}
		}
		else
		{
			$item_per_page= !empty($_GET["per_page"])?$_GET["per_page"]:9;
			$current_page= !empty($_GET["page"])?$_GET["page"]:1;
			$offset=($current_page-1)*$item_per_page;
			$sql="select DISTINCT sp.MaSanPham, sp.TenSanPham,sp.Gia, sp.GioiTinh,sp.MaDanhMuc,sp.HinhAnh1 from sanpham sp, kichthuoc_sanpham ks where sp.MaSanPham=ks.MaSanPham AND ks.SoLuong>0 ORDER BY sp.MaSanPham ASC LIMIT ".$item_per_page." OFFSET ".$offset;
			$kq=mysqli_query($con,$sql) or die("Không thể kết nối bảng sản phẩm".mysqli_error());
			$totalRecords=mysqli_query($con, "select DISTINCT sp.MaSanPham, sp.TenSanPham,sp.Gia, sp.GioiTinh,sp.MaDanhMuc,sp.HinhAnh1 from sanpham sp, kichthuoc_sanpham ks where sp.MaSanPham=ks.MaSanPham AND ks.SoLuong>0");
			$totalRecords=$totalRecords->num_rows;
			$totalPages=ceil($totalRecords / $item_per_page);
			while($row=mysqli_fetch_array($kq))
			{
				echo("<div class='col-sm-6 col-md-4' style='padding-top:25px;'>");
				$MaSP=$row["MaSanPham"];
				echo("<div class='thumbnail' style='width:90%;height:325px; margin:auto;' >");;
				echo("<a href='viewdetailtproduct.php?MaSP=$MaSP'><img src='".$row["HinhAnh1"]."' alt='images'  style='height:225px;width:225px; object-fit:contain;' /></a>");
				echo("<div class='caption'>");
				echo("<div class='mota'>");
				echo("<span class='PronameView'>".$row["TenSanPham"]."</span>");
				echo("<br /><br />Giá: <span style='font-style:italic;'>"); echo number_format($row["Gia"],0,",","."); echo(" VND</span>");
				echo('</div>');
				echo('</div>');
				echo('</div>');
				echo('</div>');
			}
		}
		?>
    </div>
	
<?php
	if(!isset($_POST["sbmTimkiem"]))
	{
		include("pagination.php");
	}
?>

<?php
	include("bottomU.php");
?>