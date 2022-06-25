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
		padding:10px;
	}
	.tieude{
		color:red;
		font-weight:bold;
	}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php
	include("topA.php");
?>

<?php
	include("connec.php");
	$tendn=$_POST["txtTenDN"];
	$hoten=$_POST["txtHotenND"];
	$email=$_POST["txtEmail"];
	$sdt=$_POST["txtSdt"];
	$ngaysua=date("Y-m-d");
	
	$duongdan1="images/".date("dmY_His_a")."_";
	$duongdan1=$duongdan1.basename($_FILES["image1"]["name"]);
	$fileType = strtolower(pathinfo($duongdan1,PATHINFO_EXTENSION));
	if($_FILES["image1"]["name"]=="")
	{
		$duongdan1=$_POST["hinhC1"];
	}
	else
	{
		$file_tam1=$_FILES["image1"]["tmp_name"];
		move_uploaded_file($file_tam1,$duongdan1);
	}
	
	$sql2="UPDATE tblAdmin SET HoTenA='".$hoten."',EmailA='".$email."',SoDienThoaiA='".$sdt."', HinhDaiDienA='".$duongdan1."',NgaySuaA='".$ngaysua."' where TenDangNhapA='".$tendn."'";
	$kq2=mysqli_query($con,$sql2)or die("Không thể sửa admin này".mysqli_error());
	echo("<script language='javascript'>
			alert('Thay đổi thông tin admin thành công.');
			window.location='ThongtinAdmin.php';
			</script>
		 ");
	
?>

<?php
	include("bottomA.php");
?>
