<?php
	include("head.php");
?>

<?php
	if(!isset($_SESSION["allowA"]))
	{
		echo("<script language='javascript'>
				 alert('Bạn không có quyền trên trang này!');
				 window.location='administrator.php';
				</script>	
				");
	}
?>

<style>
	*{
		font-family: Helvetica, Arial, sans-serif;
		font-size: 12pt;
	} 
	tr,td{
            padding:15px;
        }
	.tieude{
		color:red;
		font-weight:bold;
	}
</style>
<script language="javascript">
	function hoixoa()
	{
		hoi=confirm("Bạn có chắc muốn xóa sản phẩm này ?");
		if(hoi==false)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php
	include("topA.php");
?>
	    <div style="width:95%; margin:auto;">
    <h3 style="text-align:center;">Quản lý Size Sản Phẩm</h3>
	<form name="frmSizeSanPham" action="xlyInsertProduct_size.php" method="post" onsubmit="return kiemtra();">
    <table style="width:80%; margin:auto;" >
        <tr>
            <td style="width:200px;">Tên sản phẩm<span style="color:red;">(*)</span></td>
            <td><select name='slSanPham' Class='form-control'>
<?php
	include("connec.php");
	$sql="SELECT MaSanPham, TenSanPham FROM sanpham;";
	$kq=mysqli_query($con,$sql) or die("Không thể kết nối bảng sản phẩm".mysqli_error());
		while($row=mysqli_fetch_array($kq))
		{
			echo("
					<option	value='".$row["MaSanPham"]."'>".$row["TenSanPham"]."</option>
			");
		}
?>
				</select>
			</td>
        </tr>
        <tr>
            <td>Size sản phẩm<span style="color:red;">(*)</span></td>
            <td><select name='slSize' Class='form-control'>
<?php
	$sql1="SELECT MaKichThuoc, Size FROM kichthuoc; ";
	$kq1=mysqli_query($con,$sql1) or die("Không thể kết nối bảng Size".mysqli_error());
		while($row=mysqli_fetch_array($kq1))
		{
			echo("
					<option	value='".$row["MaKichThuoc"]."'>".$row["Size"]."</option>
			");
		}
?>
				</select>
			</td>
        </tr>
        <tr>
            <td>Số lượng</td>
			<td><input type="number" name="nbSoLuong" required="required" Class="form-control" placeholder="Số lượng là ký tự số" MaxLength="3" min="1" max="999"requied></td>
        </tr>
        <tr style="text-align:center;">
			<td colspan="2"><input type="submit" value="Thêm size sản phẩm" class='btn btn-primary'></td>
        </tr>
    </table>
	</form>
    <h2>Lọc thông tin Size Sản Phẩm</h2>
    <input class="form-control" id="myInput" type="text" placeholder="Search...">         
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Tên sản phẩm</th>
                <th>Size sản phẩm</th>
                 <th>Số lượng</th>
                <th style="width:145px;"></th>
              </tr>
            </thead> 
            <tbody id="myTable">
<?php	
	include("connec.php");
	$sqlS="SELECT ks.MaSanPham, ks.MaKichThuoc, sp.TenSanPham, kt.Size, ks.SoLuong FROM sanpham sp, kichthuoc_sanpham ks, kichthuoc kt WHERE sp.MaSanPham=ks.MaSanPham AND ks.MaKichThuoc=kt.MaKichThuoc;";
	$kqS=mysqli_query($con,$sqlS) or die("Không thể kết nối bảng hóa đơn".mysqli_error());
	while($row=mysqli_fetch_array($kqS))
	{
		echo("<tr>");
		echo("<td>".$row["TenSanPham"]."</td>");$Masp=$row["MaSanPham"];$Makt=$row["MaKichThuoc"];
		echo("<td>".$row["Size"]."</td>");
		echo("<td>".$row["SoLuong"]."</td>");
		echo("<td><a href='deleteproductSize.php?Masp=$Masp&Makt=$Makt' onclick='return hoixoa();'>Xóa</a> </td>");
		echo("</tr>");
	}
?>
            </tbody>
            </table>
    </div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<?php
	include("bottomA.php");
?>