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
	
	$masp=$_POST["txtMaSP"];
	$tensp=$_POST["txtTenSP"];
	$gia=$_POST["nbGia"];
	$bhanh=$_POST["txtBaoHanh"];
	$mota=$_POST["txtMoTa"];
	$gt=$_POST["rdGiTinh"];
	$dmuc=$_POST["slDanhMuc"];
	$nguoisua=$_SESSION["nameA"];
	$ngaysua=date("Y-m-d");
	
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
	
	if($_FILES["image2"]["name"]=="")
	{
		$duongdan1=$_POST["hinhC1"];
	}
	else
	{
		$file_tam1=$_FILES["image1"]["tmp_name"];
		move_uploaded_file($file_tam1,$duongdan1);
	}
	if($_FILES["image2"]["name"]=="")
	{
		$duongdan2=$_POST["hinhC2"];
	}
	else
	{
		$file_tam2=$_FILES["image2"]["tmp_name"];
		move_uploaded_file($file_tam2,$duongdan2);
	}
	if($_FILES["image3"]["name"]=="")
	{
		$duongdan3=$_POST["hinhC3"];
	}
	else
	{
		$file_tam3=$_FILES["image3"]["tmp_name"];
		move_uploaded_file($file_tam3,$duongdan3);
	}
	if($_FILES["image4"]["name"]=="")
	{
		$duongdan4=$_POST["hinhC4"];
	}
	else
	{
		$file_tam4=$_FILES["image4"]["tmp_name"];
		move_uploaded_file($file_tam4,$duongdan4);
	}

		
	$sql2="UPDATE SANPHAM SET TenSanPham='".$tensp."',Gia=".$gia.",BaoHanh='".$bhanh."',MoTa='".$mota."',GioiTinh=".$gt.", HinhAnh1='".$duongdan1."',HinhAnh2='".$duongdan2."',HinhAnh3='".$duongdan3."',HinhAnh4='".$duongdan4."',MaDanhMuc='".$dmuc."',NguoiSua='".$nguoisua."',NgaySua='".$ngaysua."' where MaSanPham='".$masp."'";
	$kq2=mysqli_query($con,$sql2)or die("Không thể sửa sản phẩm này".mysqli_error());
	echo("<script language='javascript'>
			alert('Cập nhật sản phẩm thành công.');
			window.location='product.php';
			</script>
		 ");
?>

<?php
	include("bottomA.php");
?>