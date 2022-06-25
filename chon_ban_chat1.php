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
		border:1px solid black;
		padding:5px;
	}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php
	include("topA.php");
?>

	<h2 style="text-align:center;">Chat với người dùng</h2>
<?php
	include("connec.php");
	$myself=$_SESSION["nameU"];
	$sql="Select TenDangNhap from tblUser";
	$kq=mysqli_query($con,$sql) or die("Không thể mở bảng người dùng".mysqli_error());
	echo("<table  width='50%' align='center'>");
	echo("<tr><td style='color:red;'>Tên người Chat</td><td>Chọn</td></tr>");
	//$i=1;
	//$n=mysqli_num_rows($kq);
	while($row=mysqli_fetch_array($kq)){
		echo("<tr>");
		echo("<td>".$row["TenDangNhap"]."</td>");
		$chonban=$row["TenDangNhap"];
		echo("<td><a href='chattructuyen1.php?BanDChon=$chonban'>Chọn</a></td>");
		echo("</tr>");
	}
	echo("</table>");
?>

<?php
	include("bottomA.php");
?>