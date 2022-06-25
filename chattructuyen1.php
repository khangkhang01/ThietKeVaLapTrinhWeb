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
		border:1px solid black;
		padding:5px;
	}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php
	include("topA.php");
?>
	
<?php
	$ban=$_REQUEST["BanDChon"];
	$_SESSION["nguoinhan1"]=$ban;	
?>
<h2 style="text-align:center;">Chat trực tuyến</h2>
<div style="width:90%; margin: auto;">
	<iframe name="noidung" src="doc_ndung_chat1.php" width="100%" height="300"></iframe>
	<iframe name="nhap" src="nhap_ndung_chat1.php" width="100%" style="margin:auto;"></iframe>
</div>

<?php
	include("bottomA.php");
?>