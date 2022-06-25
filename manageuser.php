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
				hoi=confirm("Bạn có chắc muốn xóa người dùng này ?");
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
<h2 style="text-align:center; color:red;">Danh sách người dùng</h3>  
<h4>Lọc thông tin người dùng</h2>
<input class="form-control" id="myInput" type="text" placeholder="Tìm kiếm ...">

         
	  <table class="table table-bordered table-striped">
		<thead>
		  <tr>
			<th style="width:175px; color:red;">Tên đăng nhập</th>
			<th style="color:red;">Họ tên chủ tài khoản</th>
			<th style="color:red;">Email</th>
			<th style="color:red;">Số điện thoại</th>
			<th style="color:red;width:125px;">Hình đại diện</th>
			<th style="color:red;">Ngày tạo</th>
			<th style="color:red;">Ngày sửa</th>
			<th style=""></th>
		  </tr>
		</thead> 
		<tbody id="myTable">
<?php
	include("connec.php");
	$sql="select * from tblUser";
	$kq=mysqli_query($con,$sql) or die("Không thể kết nối bảng người dùng".mysqli_error());
	while($row=mysqli_fetch_array($kq))
	{
		echo("<tr>");
		echo("<td>".$row["TenDangNhap"]."</td>");$MaU=$row["TenDangNhap"];
		echo("<td>".$row["HoTenND"]."</td>");
		echo("<td>".$row["Email"]."</td>");
		echo("<td>".$row["SoDienThoai"]."</td>");
		echo("<td align='center'><img src='".$row["HinhDaiDien"]."'height='125' width='125'></td>");
		echo("<td>".$row["NgayTao"]."</td>");
		echo("<td>".$row["NgaySua"]."</td>");
		echo("<td><a href='deleteuser.php?MaUser=$MaU' onclick='return hoixoa();'>Xóa</a> </td>");
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