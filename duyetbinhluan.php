<?php
	include("head.php");
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
	include("connec.php");

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
		$xacnhan=$_REQUEST["idduyet"];
		$sql="update binhluanSP set TrangThai=1 where Id=".$xacnhan;
		$kq=mysqli_query($con,$sql) or die ("không cập nhật được bình luận".mysqli_error());
		echo("<script language='javascript'>
			alert('Duyệt bình luận thành công');
			window.location='listCart.php';
			</script>
		");

	}
?>

<?php
	include("bottomA.php");
?>