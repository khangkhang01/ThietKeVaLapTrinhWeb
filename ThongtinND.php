<?php
	include("topU.php");
?>

<style>
	tr,td{
		padding:10px;
	}
	.tieude{
		color:red;
		font-weight:bold;
	}
 </style>
    <h2 style="text-align:center;">Thông tin tài khoản người dùng</h2>
    <table style="width:80%; margin:auto;" >
<?php
   include("connec.php");
   $user=$_SESSION["nameU"];
   $sql="select * from tbluser where TenDangNhap='".$user."'";
   $kq=mysqli_query($con,$sql) or die("Không thể kết nối bảng người dùng".mysqli_error());
   while($row=mysqli_fetch_array($kq))
   {
		echo("
			<tr>
            <td style='width:25%;'>Tên đăng nhập:</td>
            <td>".$row["TenDangNhap"]."</td>
        </tr>
        <tr>
            <td>Họ tên người dùng:</td>
            <td>".$row["HoTenND"]."</td>
        </tr>
        <tr>
            <td>Địa chỉ Email:</td>
            <td>".$row["Email"]."</td>
        </tr>
        <tr>
            <td>Số điện thoại:</td>
            <td>".$row["SoDienThoai"]."</td>
        </tr>
        <tr>
            <td colspan='2'>
                <table style='width:70%;'>
                    <tr>
                        <td style='width:30%;'>Hình đại diện:</td>
                        <td style='height:200px;'><img src='".$row["HinhDaiDien"]."' style='height:100%; width:200px; object-fit:contain;' /></td>
                    </tr>
                </table>
            </td>
        </tr>
		");
   }
?>			
    </table><br><a href="index.php"><< Trở về</a> | <a href="updateThongtinND.php">Sửa</a>

<?php
	include("bottomU.php");
?>