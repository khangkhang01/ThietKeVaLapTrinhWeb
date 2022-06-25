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
		hoi=confirm("Bạn có chắc muốn xóa hóa đơn này ?");
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
<h2 style="text-align:center; color:red;">Quản lý đơn hàng</h3> 
<h4>Lọc thông tin đơn hàng</h2>
<input class="form-control" id="myInput" type="text" placeholder="Tìm kiếm ...">

         
	  <table class="table table-bordered table-striped">
		<thead>
		  <tr>
			<th style="width:125px; color:red;">Mã hóa đơn</th>
			<th style="color:red;">Họ tên người nhận</th>
			<th style="color:red;">Địa chỉ nhận hàng</th>
			<th style="color:red;">Số điện thoại</th>
			<th style="color:red;">Trạng thái HD</th>
			<th style="color:red;">Ngày đặt hàng</th>
			<th style="width:160px;"></th>
		  </tr>
		</thead> 
		<tbody id="myTable">
<?php
	include("connec.php");
	$sql="SELECT * FROM `hoadon`; ";
	$kq=mysqli_query($con,$sql) or die("Không thể kết nối bảng hóa đơn".mysqli_error());
	while($row=mysqli_fetch_array($kq))
	{
		echo("<tr>");
		echo("<td>".$row["MaHD"]."</td>");$MaHD=$row["MaHD"];
		echo("<td>".$row["HoTenNguoiNH"]."</td>");
		echo("<td>".$row["DiaChiNH"]."</td>");
		echo("<td>".$row["SoDienThoaiNH"]."</td>");
		if($row["TrangThaiHD"]==1){
			echo("<td>Đơn hàng mới</td>");
		}
		else if($row["TrangThaiHD"]==2){
			echo("<td>Đang giao</td>");
		}
		else{
			echo("<td>Đã giao</td>");
		}
		echo("<td>".$row["NgayDatHang"]."</td>");
		echo("<td><a href='updatereceipt.php?MaHD=$MaHD'>Sửa</a> &nbsp; <a href='detailreceipt.php?MaHD=$MaHD'>Chi tiết</a> &nbsp; <a href='deletereceipt.php?MaHD=$MaHD' onclick='return hoixoa();'>Xóa</a> </td>");
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