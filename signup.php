<?php
	include("topU.php");
?>
	<style>
		td {
			padding: 5px;
		}
    </style>
	<script>
	function kiemtra()
	{
		username=document.frmUser.txtUsername.value;
		pass=document.frmUser.txtPass.value;
		pass1=document.frmUser.txtPass1.value;
		hoten=document.frmUser.txtHoten.value;
		email=document.frmUser.txtEmail.value;
		sdt=document.frmUser.txtSdt.value; 
		var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
		
		var fileInput = document.getElementById('hinhanh');
		var filePath = fileInput.value;
		if(filePath=="")
		{
			filePath="images/hinhNULL.jpg";
		}
		var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.jfif)$/i;
		
		if(username=="")
		{
			alert("Bạn chưa nhập tên tài khoản ?");
			document.frmUser.txtUsername.focus();
			return false;
		}
		else if(pass=="")
		{
			alert("Bạn chưa nhập mật khẩu ?");
			document.frmUser.txtPass.focus();
			return false;
		}
		else if(pass.length<6)
		{
			alert("Mật khẩu phải ít nhất 6 ký tự ?");
			document.frmUser.txtPass.value="";
			document.frmUser.txtPass1.value="";
			document.frmUser.txtPass.focus();
			return false;
		}
		else if(pass1=="")
		{
			alert("Bạn chưa nhập lại mật khẩu ?");
			document.frmUser.txtPass1.focus();
			return false;
		}
		else if(pass != pass1)
		{
			alert("Mật khẩu của bạn không trùng khớp ?");
			document.frmUser.txtPass.value="";
			document.frmUser.txtPass1.value="";
			document.frmUser.txtPass.focus();
			return false;
		}
		else if(hoten=="")
		{
			alert("Bạn chưa nhập họ tên ?");
			document.frmUser.txtHoten.focus();
			return false;
		}
		else if(email=="")
		{
			alert("Bạn chưa nhập email ?");
			document.frmUser.txtEmail.focus(); 
			return false;
		}
		else if(sdt=="")
		{
			alert("Bạn chưa Nhập số điện thoại ?");
			document.frmUser.txtSdt.focus();
			return false;
		}
		else if(!sdt.match(phoneno))
		{
			alert("Số điện thoại không hợp lệ ?");
			document.frmUser.txtSdt.focus();
			return false;
		}
		else if(!allowedExtensions.exec(filePath))
		{
			fileInput.value = '';
			alert('Vui lòng upload các file có định dạng: .jpeg/.jpg/.png/.gif/.jfif only.');
			return false;
		}
		else
		{
			return true;
		}
	}
		function ShowImagePreview(imageUploader, previewImage) {
			if (imageUploader.files && imageUploader.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$(previewImage).attr('src', e.target.result);
				}
				reader.readAsDataURL(imageUploader.files[0]);
			}
		}
	</script>
	<h2 style="text-align:center; color:red;">Đăng ký tài khoản người dùng</h2>
	<form name="frmUser" enctype="multipart/form-data" action="xlyInsertUser.php" method="post" onsubmit="return kiemtra();">
    <table border="0" style="width:90%; margin:auto;">
        <tr>
            <td>Nhập Username<span style="color:red;">(*)</span></td>
        </tr>
        <tr>
            <td><input type="text" name="txtUsername" Class="form-control" placeholder="Nhập Tên tài khoản" MaxLength="50"></td>
        </tr>
        <tr>
            <td>Nhập Password<span style="color:red;">(*)</span></td>
        </tr>
        <tr>
            <td><input type="password" name="txtPass" Class="form-control" placeholder="Nhập mật khẩu" MaxLength="50"></td>
        </tr>
        <tr>
            <td>Nhập lại Password<span style="color:red;">(*)</span></td>
        </tr>
        <tr>
            <td><input type="password" name="txtPass1" Class="form-control" placeholder="Nhập lại mật khẩu" MaxLength="50"></td>
        </tr>
         <tr>
            <td>Họ và tên<span style="color:red;">(*)</span></td>
        </tr>
        <tr>
            <td><input type="text" name="txtHoten" Class="form-control" placeholder="Nhập họ và tên" MaxLength="50"></td>
        </tr>
         <tr>
            <td>Email<span style="color:red;">(*)</span></td>
        </tr>
        <tr>
            <td><input type="email" name="txtEmail" Class="form-control" placeholder="Nhập địa chỉ email" MaxLength="50"></td>
        </tr>
         <tr>
            <td>Số điện thoại<span style="color:red;">(*)</span></td>
        </tr>
        <tr>
            <td><input type="number" name="txtSdt" Class="form-control" placeholder="Nhập số diện thoại" MaxLength="10"></td>
            
        </tr>
         <tr>
            <td>Chọn ảnh</td>
        </tr>
        <tr>
            <td>
				<img src="images/hinhNULL.jpg";" style="height:100px; width:100px; margin:10px;" id="previewImage">
				<input type="file" id="hinhanh" accept="image/*" name="ImageUpload" onchange="ShowImagePreview(this, document.getElementById('previewImage'))">
			</td>
        </tr>
        <tr>
            <td style="text-align:center;"><input type="submit" name="sbmSignUp" value="Đăng ký"></td>
        </tr>
    </table>
	<form><br />
<?php
	include("bottomU.php");
?>