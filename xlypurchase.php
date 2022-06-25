<?php
	include("topU.php");
?>

<?php
	include("connec.php");

	if(!isset($_SESSION["name"]))
	{
		echo("<script language='javascript'>
			alert('Ban khong co quyen tren trang nay');
			window.location='index.php';
			</script>
		");
	}
	else{
		$nguoimua=$_SESSION["nguoidung"];
		@$mua=$_REQUEST["sachmua"];
		@$sluong=$_POST["txt".$mua];
		$sql1="select so_luong from sach  where id_sach=".$mua;
		$kq1=mysqli_query($kn,$sql1) or die ("Khong lấy được số lượng".mysqli_error());
		$row1=mysqli_fetch_array($kq1);
		if($row1["so_luong"]<$sluong){
			echo("
			<script language='javascript'>
			alert('không đủ số lượng, số lượng còn là".$row1["so_luong"]."');
			window.location='index.php'
			</script>		
		");
		}
		else{
			if(!isset($_POST["sbmKThucMua"])){
				
				$sql2="insert into tam".$nguoimua."(username,id_sach,soluong_mua) values('".$nguoimua."','".$mua."','".$sluong."')";
					$kq2=mysqli_query($kn,$sql2) or die ("Khong the thêm chi tiet gio hang moi".mysqli_error());
					$sluongcon=$row1["so_luong"]-$sluong;
				$sql3="update sach set so_luong=".$sluongcon." where id_sach=".$mua;
					$kq3=mysqli_query($kn,$sql3) or die ("khong cap nhat duoc so lương sach".mysqli_error());	
					echo("<a href='index.php'>Mua tiếp</a>");
					echo("<form action='' method='post' name='frmKTMHang'>");
					echo("<input type='submit' name='sbmKThucMua' value='Kết thúc mua hàng'>");
					echo("</form>");
			}
			else{
				$ngay=date("Y-m-d");
				$sql4="insert into giohang(thoigian_giohang) values('".$ngay."')";
				$kq4=mysqli_query($kn,$sql4) or die ("Không thể thêm giỏ hàng mới".mysqli_error());
				
				$sql5="select * from giohang order by id_giohang desc limit 1";
				$kq5=mysqli_query($kn,$sql5) or die ("Không thể lấy giỏ hàng vừa thêm".mysqli_error());
				
				$row5=mysqli_fetch_array($kq5);
				$id=$row5["id_giohang"];
				
				$sql6="select * from tam".$nguoimua;
				$kq6=mysqli_query($kn,$sql6) or die ("Không thể được dữ liệu từ bảng tạm".mysqli_error());
				while($row6=mysqli_fetch_array($kq6))
				{
					$sql7="insert into chitiet_giohang (Username,id_sach,id_giohang,soluong_mua) values('".$row6["Username"]."','".$row6["id_sach"]."','".$id."','".$row6["soluong_mua"]."')";
					$kq7=mysqli_query($kn,$sql7) or die ("Không thể thêm vào chi tiết giỏ hàng".mysqli_error());	
				}
				$sql8="delete from tam".$nguoimua;
				$kq8=mysqli_query($kn,$sql8) or die ("Không thể xóa thông tin trong bảng tạm".mysqli_error());	
					echo("
					<script language='javascript'>
					alert('Kết thúc mua hàng');
					window.location='index.php'
					</script>		
				");
			}	
		}
	}
?>

<?php
	include("bottomU.php");
?>