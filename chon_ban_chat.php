<?php
	include("topU.php");
?>

<?php 
	
	if(!isset($_SESSION["nameU"]) && !isset($_SESSION["nameA"]))
	{
		echo("<script language='javascript'>
			alert('Bạn không có quyền trên trang này');
			window.location='index.php';
			</script>
		");
	}
?>

<?php
	include("connec.php");
	$myself=$_SESSION["nameA"];
	$sql="Select TenDangNhapA from tblAdmin";
	$kq=mysqli_query($con,$sql) or die("Không thể mở bảng admin".mysqli_error());
	echo("<table border='1' width='80%' align='center'>");
	echo("<caption><h1 align='center'>Chat với Admin</h1></caption>");
	echo("<tr><td style='color:red;'>Tên người Chat</td><td>Chọn</td></tr>");
	//$i=1;
	//$n=mysqli_num_rows($kq);
	while($row=mysqli_fetch_array($kq)){
		echo("<tr>");
		echo("<td>".$row["TenDangNhapA"]."</td>");
		$chonban=$row["TenDangNhapA"];
		echo("<td><a href='chattructuyen.php?BanDChon=$chonban'>Chọn</a></td>");
		echo("</tr>");
	}
	echo("</table>");
?>

<?php
	include("bottomU.php");
?>