<?php
	include("topU.php");
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
	
	$sql2="UPDATE tblUser SET HoTenND='".$hoten."',Email='".$email."',SoDienThoai='".$sdt."', HinhDaiDien='".$duongdan1."',NgaySua='".$ngaysua."' where TenDangNhap='".$tendn."'";
	$kq2=mysqli_query($con,$sql2)or die("Không thể sửa người dùng này".mysqli_error());
	echo("<script language='javascript'>
			alert('Thay đổi thông tin người dùng thành công.');
			window.location='ThongtinND.php';
			</script>
		 ");
	
?>

<?php
	include("bottomU.php");
?>
	
	