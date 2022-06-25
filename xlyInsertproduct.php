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
	
	$tensp=$_POST["txtTenSP"];
	$gia=$_POST["nbGia"];
	$bhanh=$_POST["txtBaoHanh"];
	$mota=$_POST["txtMoTa"];
	$gt=$_POST["rdGiTinh"];
	$dmuc=$_POST["slDanhMuc"];
	$ngtao=date("Y-m-d");
	$nguoitao=$_SESSION["nameA"];

	$duongdan1="images/".date("dmY_His_a")."_";
	$duongdan1=$duongdan1.basename($_FILES["image1"]["name"]);
	$fileType = strtolower(pathinfo($duongdan1,PATHINFO_EXTENSION));
	
	$duongdan2="images/".date("dmY_His_a")."_";
	$duongdan2=$duongdan2.basename($_FILES["image2"]["name"]);
	$fileType = strtolower(pathinfo($duongdan2,PATHINFO_EXTENSION));
	
	$duongdan3="images/".date("dmY_His_a")."_";
	$duongdan3=$duongdan3.basename($_FILES["image3"]["name"]);
	$fileType = strtolower(pathinfo($duongdan3,PATHINFO_EXTENSION));
	
	$duongdan4="images/".date("dmY_His_a")."_";
	$duongdan4=$duongdan4.basename($_FILES["image4"]["name"]);
	$fileType = strtolower(pathinfo($duongdan4,PATHINFO_EXTENSION));
	
	$file_tam1=$_FILES["image1"]["tmp_name"];
	move_uploaded_file($file_tam1,$duongdan1);
	if($_FILES["image2"]["name"]=="")
	{
		$duongdan2="images/hinhNULL.jpg";
	}
	else
	{
		$file_tam2=$_FILES["image2"]["tmp_name"];
		move_uploaded_file($file_tam2,$duongdan2);
	}
	if($_FILES["image3"]["name"]=="")
	{
		$duongdan3="images/hinhNULL.jpg";
	}
	else
	{
		$file_tam3=$_FILES["image3"]["tmp_name"];
		move_uploaded_file($file_tam3,$duongdan3);
	}
	if($_FILES["image4"]["name"]=="")
	{
		$duongdan4="images/hinhNULL.jpg";
	}
	else
	{
		$file_tam4=$_FILES["image4"]["tmp_name"];
		move_uploaded_file($file_tam4,$duongdan4);
	}

		
	$sql2="INSERT INTO SANPHAM VALUES(NULL,'".$tensp."',".$gia.",'".$bhanh."','".$mota."',".$gt.",'".$duongdan1."','".$duongdan2."','".$duongdan3."','".$duongdan4."',".$dmuc.",'".$nguoitao."','".$ngtao."',NULL,NULL)";
	$kq2=mysqli_query($con,$sql2)or die("Không thể thêm sản phẩm này".mysqli_error());
	echo("<script language='javascript'>
			alert('Thêm sản phẩm thành công.');
			window.location='product.php';
			</script>
		 ");
?>

<?php
	include("bottomA.php");
?>