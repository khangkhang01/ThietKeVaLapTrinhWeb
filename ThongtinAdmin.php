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
	<h2 style="text-align:center;">Thông tin tài khoản Admin</h2>
    <table style="width:80%; margin:auto;" >
<?php
   include("connec.php");
   $user=$_SESSION["nameA"];
   $sql="select * from tbladmin where TenDangNhapA='".$user."'";
   $kq=mysqli_query($con,$sql) or die("Không thể kết nối bảng admin".mysqli_error());
   while($row=mysqli_fetch_array($kq))
   {
		echo("
			<tr>
            <td style='width:25%;'>Tên đăng nhập:</td>
            <td>".$row["TenDangNhapA"]."</td>
        </tr>
        <tr>
            <td>Họ tên quản trị:</td>
            <td>".$row["HoTenA"]."</td>
        </tr>
        <tr>
            <td>Địa chỉ Email:</td>
            <td>".$row["EmailA"]."</td>
        </tr>
        <tr>
            <td>Số điện thoại:</td>
            <td>".$row["SoDienThoaiA"]."</td>
        </tr>
        <tr>
            <td colspan='2'>
                <table style='width:70%;'>
                    <tr>
                        <td style='width:30%;'>Hình đại diện:</td>
                        <td style='height:200px;'><img src='".$row["HinhDaiDienA"]."' style='height:100%; width:200px; object-fit:contain;' /></td>
                    </tr>
                </table>
            </td>
        </tr>
		");
   }
?>			
    </table><br><a href="admin.php"><< Trở về</a> | <a href="updateThongtinAdmin.php">Sửa</a>  
<?php
	include("bottomA.php");
?>
