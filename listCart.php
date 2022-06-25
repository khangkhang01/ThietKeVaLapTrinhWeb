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

<?php
	include("topA.php");
?>

<?php	
	if(!isset($_SESSION["nameA"]))
	{
		echo("<script language='javascript'>
			alert('Bạn không có quyền trên trang này');
			window.location='administrator.php';
			</script>
		");
	}
	else
	{
?>
	<h1 align="center">Danh sách bình luận chưa duyệt</h1>
<?php
	include("connec.php");
	$sql1="SELECT * FROM sanpham sp, binhluansp bl WHERE sp.MaSanPham=bl.MaSP AND TrangThai=0";
	$kq1=mysqli_query($con,$sql1) or die ("không truy vấn được bảng bình luận".mysqli_error());
	if(mysqli_num_rows($kq1)>0)
	{	
		echo("<h3 style='margin-left:150px;'><a href='duyetbinhluanALL.php'>Duyệt tất cả bình luận</a></h3>");
		echo("<form name='frmDSDuyet' action='' method='post' onsubmit='return dsxoa();'>");
		echo("<table cellspacing='0' width='80%' style='margin:auto;'>");
		while($row1=mysqli_fetch_array($kq1))
		{
			$idBL=$row1["Id"];
			echo("
				<tr>
					<td colspan='2' style='font-size:20px;font-style:italic;'>Thời gian tạo: ".$row1["NgayBLSP"]."</td>
					<td><a href='duyetbinhluan.php?idduyet=$idBL'>Duyệt bình luận ".$idBL."</a></td>
				</tr>			
			");
			echo("
				<tr bgcolor='HotPink' align='center'>
					<th>Tên sản phẩm</td>
					<th>Tên tài khoản</td>
					<th>Nội dung bình luận</td>
				</tr>			
			");
			echo("
				<tr height='25' >
					<td style='text-align:center;'>".$row1["TenSanPham"]."</td>
					<td style='text-align:center;'>".$row1["MaND"]."</td>
					<td style='text-align:center;'>".$row1["NoiDungBL"]."</td>
				</tr>
				<tr height='25' >
					<td colspan='3'></td>
				</tr>
				");			
		}
		echo("</table>");
	}
	else
	{
		
	}

?>	
<?php
	}
?>

<?php
	include("bottomA.php");
?>