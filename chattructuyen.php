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
	$ban=$_REQUEST["BanDChon"];
	$_SESSION["nguoinhan"]=$ban;	
?>
<h2 style="text-align:center;">Chat trực tuyến</h2>
<div style="width:95%; margin: auto;">
	<iframe name="noidung" src="doc_ndung_chat.php" width="100%" height="300"></iframe>
	<iframe name="nhap" src="nhap_ndung_chat.php" width="100%" style="margin:auto;"></iframe>
</div>

<?php
	include("bottomU.php");
?>