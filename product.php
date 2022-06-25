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
<h2 style="text-align:center; color:red;">Danh sách Sản Phẩm</h3>
<div><a href="insertproduct.php">Thêm mới</a></div><br>   
<h4>Lọc thông tin Sản Phẩm</h2>
<input class="form-control" id="myInput" type="text" placeholder="Tìm kiếm ...">

         
	  <table class="table table-bordered table-striped">
		<thead>
		  <tr>
			<th style="width:125px; color:red;">Mã sản phẩm</th>
			<th style="color:red;">Tên sản phẩm</th>
			<th style="color:red;">Giá</th>
			<th style="color:red;">Bảo hành</th>
			<th style="width:125px; color:red;">Hình ảnh</th>
			<th style="color:red;">Danh mục</th>
			<th style="width:160px;"></th>
		  </tr>
		</thead> 
		<tbody id="myTable">
<?php
	include("connec.php");
	$sql="select * from sanpham";
	$kq=mysqli_query($con,$sql) or die("Không thể kết nối bảng sản phẩm".mysqli_error());
	while($row=mysqli_fetch_array($kq))
	{
		echo("<tr>");
		echo("<td>".$row["MaSanPham"]."</td>");$MaSP=$row["MaSanPham"];
		echo("<td>".$row["TenSanPham"]."</td>");

		echo("<td>".$row["Gia"]."</td>");
		echo("<td>".$row["BaoHanh"]."</td>");
		echo("<td align='center'><img src='".$row["HinhAnh1"]."'height='125' width='125'></td>");
		if($row["MaDanhMuc"]==1)
		{
			echo("<td>ADIDAS</td>");
		}
		else if($row["MaDanhMuc"]==2){
			echo("<td>NIKE</td>");
		}
		else{
			echo("<td>PUMA</td>");
		}
		echo("<td><a href='updateproduct.php?MaSP=$MaSP'>Sửa</a> &nbsp; <a href='detailproduct.php?MaSP=$MaSP'>Chi tiết</a> &nbsp; <a href='deleteproduct.php?MaSP=$MaSP' onclick='return hoixoa();'>Xóa</a> </td>");
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