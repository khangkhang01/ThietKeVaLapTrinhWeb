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
<?php
	if($_REQUEST["GT"] == "1")
	{
		echo("<h3 style='text-align:center;'>TOP SẢN PHẨM NIKE NAM</h3>");
	}
	else
	{
		echo("<h3 style='text-align:center;'>TOP SẢN PHẨM NIKE NỮ</h3>");
	}
?>

    <div class="row">
		<?php
		include("connec.php");
		if ($_REQUEST["GT"] == "1" || $_REQUEST["GT"] == "2")
		{
			$sql="select DISTINCT sp.MaSanPham, sp.TenSanPham,sp.Gia, sp.GioiTinh,sp.MaDanhMuc,sp.HinhAnh1 from sanpham sp, kichthuoc_sanpham ks where sp.MaSanPham=ks.MaSanPham AND ks.SoLuong>0 AND MaDanhMuc='2' AND GioiTinh='".$_REQUEST["GT"]."' ORDER BY MaSanPham ASC";
			$kq=mysqli_query($con,$sql) or die("Không thể kết nối bảng sản phẩm".mysqli_error());
		}
		else
		{
			echo("<script language='javascript'>
							window.location='index.php';
							 </script>
							");
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
		?>
    </div>

<?php
	include("bottomU.php");
?>