
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
	<meta http-equiv="Refresh" content="5; url=doc_ndung_chat1.php">
	<title>Đọc nội dung Chat</title>
</head>
<body>

<?php
	$n_gui=$_SESSION["nameA"];
	$n_nhan=$_SESSION["nguoinhan1"];
	$sql="select id, nguoichat, noidung, nguoinhan from chat where nguoichat='".$n_gui."' and nguoinhan='".$n_nhan."' 
	or nguoichat='".$n_nhan."' and nguoinhan='".$n_gui."' order by id desc limit 10";
	$kq=mysqli_query($con,$sql) or die("Không thể mở bảng chat".mysqli_error());
	while($dong=mysqli_fetch_array($kq)){
		if($dong["nguoichat"]==$_SESSION["nameA"]){
			echo("<div style='width:100%; text-align:right;'><b>".$dong["nguoichat"]."</b> Gửi tới <i>".$dong["nguoinhan"]."</i>: ".$dong["noidung"]."<br><br></div>");	
		}
		else{
			echo("<div style='width:100%;'><b>".$dong["nguoichat"]."</b> Gửi tới <i>".$dong["nguoinhan"]."</i>: ".$dong["noidung"]."<br><br></div>");
		}
	}
?>

</body>
</html>