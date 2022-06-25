<?php
	include("topU.php");
?>

<?php
	include("connec.php");
	
	$tendn=$_POST["txtUsername"];
	$pass=md5($_POST["txtPass"]);
	$hoten=$_POST["txtHoten"];
	$email=$_POST["txtEmail"];
	$sdt=$_POST["txtSdt"];
	$ngtao=date("Y-m-d");
	
	$sql="Select count(*) AS 'abc' from tblUser WHERE TenDangNhap='".$tendn."'";
	$kq=mysqli_query($con,$sql) or die("Không thể truy xuất bảng người dùng".mysqli_error());
	$kq1=mysqli_fetch_assoc($kq);
	$dem=$kq1['abc'];
	if($dem > 0)
	{
		echo("<script language='javascript'>
			alert('Tên đăng nhập này đã tồn tại. Vui lòng nhập mã khác !');
			window.location='signup.php';
			 </script>
			");
	}
	else
	{
		$duongdan1="images/".date("dmY_His_a")."_";
		$duongdan1=$duongdan1.basename($_FILES["ImageUpload"]["name"]);
		$fileType = strtolower(pathinfo($duongdan1,PATHINFO_EXTENSION));
		
		if($_FILES["ImageUpload"]["name"]=="")
		{
			$duongdan1="images/hinhNULL.jpg";
		}
		else
		{
			$file_tam1=$_FILES["ImageUpload"]["tmp_name"];
			move_uploaded_file($file_tam1,$duongdan1);
		}
		
		$sql2="INSERT INTO tblUser VALUES('".$tendn."','".$pass."','".$hoten."','".$email."',".$sdt.",'".$duongdan1 ."','".$ngtao."',NULL)";
		$kq2=mysqli_query($con,$sql2)or die("Không thể thêm người dùng này".mysqli_error());
		echo("<script language='javascript'>
				alert('Đăng ký thành viên thành công.');
				window.location='loginU.php';
				</script>
			 ");
	}
?>

<?php
	include("bottomU.php");
?>