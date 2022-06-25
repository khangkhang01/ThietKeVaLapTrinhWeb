<?php
	include("topU.php");
?>

<style>
	td {
		padding: 5px;
	}
</style>

<script>
	function kiemtra1()
	{
		pass=document.frmUser1.txtPass.value;
		pass1=document.frmUser1.txtPass1.value;
		pass2=document.frmUser1.txtPass2.value;
		if(pass=="")
		{
			alert("Bạn chưa nhập mật khẩu củ ?");
			document.frmUser1.txtPass.focus();
			return false;
		}
		else if(pass1=="")
		{
			alert("Bạn chưa nhập mật khẩu mới ?");
			document.frmUser1.txtPass1.focus();
			return false;
		}
		else if(pass1.length<6)
		{
			alert("Mật khẩu phải ít nhất 6 ký tự ?");
			document.frmUser1.txtPass1.value="";
			document.frmUser1.txtPass2.value="";
			document.frmUser1.txtPass1.focus();
			return false;
		}
		else if(pass2=="")
		{
			alert("Bạn chưa nhập lại mật khẩu mới ?");
			document.frmUser1.txtPass2.focus();
			return false;
		}
		else if(pass1 != pass2)
		{
			alert("Mật khẩu của bạn không trùng khớp ?");
			document.frmUser1.txtPass1.value="";
			document.frmUser1.txtPass2.value="";
			document.frmUser1.txtPass1.focus();
			return false;
		}
		else
		{
			return true;
		}
	}
</script>
	
<?php
   include("connec.php");
   $user=$_SESSION["nameU"];
   $sql="select * from tbluser where TenDangNhap='".$user."'";
   $kq=mysqli_query($con,$sql) or die("Không thể kết nối bảng người dùng".mysqli_error());
   while($row=mysqli_fetch_array($kq))
   {
	   echo("
			<form name='frmUser1' action='xlyUpdateUser.php' method='post' onsubmit='return kiemtra1();'>
			<table style='width:80%; margin:auto;'>
	   ");
		echo("
			<tr>
				<td colspan='2'><h2 style='text-align:center;'>Đổi mật khẩu tài khoản người dùng</h2></td>
			</tr>  
			<tr>
				<td>Username</td>
			</tr>
			<tr>
				<td><input type='text' name='txtUsername' Class='form-control' value='".$row["TenDangNhap"]."' readonly='true' placeholder='Nhập Tên tài khoản' MaxLength='50'></td>
			</tr>
			<tr>
				<td>Nhập Password cũ</td>
			</tr>
			 <tr>            
				<td><input type='hidden' value='".$row["MatKhau"]."' name='hdmatkhau'><input type='password' name='txtPass' Class='form-control' placeholder='Nhập mật khẩu' MaxLength='50'></td>
			</tr>
			<tr>
				 <td>Nhập Password mới</td>
			</tr>
			 <tr>
				<td><input type='password' name='txtPass1' Class='form-control' placeholder='Nhập mật khẩu' MaxLength='50'></td>
			</tr>
			<tr>
				<td>Nhập lại Password mới</td>
			</tr>
			 <tr>
				 <td><input type='password' name='txtPass2' Class='form-control' placeholder='Nhập mật khẩu' MaxLength='50'></td>
			</tr>
			<tr>
				<td style='text-align:center;'><input type='submit' name='sbmSignUp' value='Thay đổi mật khẩu'></td>
			</tr>
		");
		echo("
			   </table>
			   </form>
		");
   }
?>
	
<?php
	include("bottomU.php");
?>
