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
		$sql="update binhluanSP set trangthai=1";
		$kq=mysqli_query($con,$sql) or die ("không cập nhật được bảng bình luận".mysqli_error());
		echo("<script language='javascript'>
			alert('Duyệt tất cả bình luận thành công');
			window.location='listCart.php';
			</script>
		");

	}
?>


<?php
	include("bottomA.php");
?>