
<?php 
	session_start();
	include("connec.php");	
	if(!isset($_SESSION["nameU"]) && !isset($_SESSION["nameA"]))
	{
		echo("<script language='javascript'>
			alert('Bạn không có quyền trên trang này');
			window.location='index.php';
			</script>
		");
	}
?>

<html>
<head>
	<meta http-equiv="Refresh" content="1; url=nhap_ndung_chat.php">
	<title>Gửi nội dung Chat</title>
</head>
<body>

<?php
	$n_gui=$_SESSION["nameU"];
	$n_nhan=$_SESSION["nguoinhan"];
	$ndung=$_POST["txtNDung"];
	$sql_nhap="insert into chat(nguoichat,noidung,nguoinhan) values('".$n_gui."','".$ndung."','".$n_nhan."')";
	$kq_nhap=mysqli_query($con,$sql_nhap) or die("Không thể thêm message".mysqli_error());
?>

</body>
</html>