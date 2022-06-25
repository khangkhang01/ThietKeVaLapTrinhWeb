<?php
	$_SESSION["nameU"]=null;
	$_SESSION["allowU"]=null;
	include("topU.php");
?>
	<form name="frm_dangnhap" action="xlyLoginU.php" method="POST" onsubmit="return kiemtra()">
	<table border="0" style="width:85%; margin:auto;">
        <tr>
            <th><h2 style="text-align:center">Đăng nhập vào Website để thanh toán</h2></th>
        </tr>
         <tr>
            <td>Nhập Username<span style="color:red;">(*)</span></td>
        </tr>
         <tr>
            <td><input type="text" name="txtUsername" Class="form-control" required="required" placeholder="Nhập tên tài khoản"></td>
        </tr>
         <tr>
            <td>Nhập Password<span style="color:red;">(*)</span></td>
        </tr>
        <tr>
            <td><input type="password" name="txtPass" Class="form-control" required="required" placeholder="Nhập mật khẩu"></td>
        </tr>
        <tr>
            <td><input type="submit" Class="btn btn-primary" value="Đăng nhập" Width="112px"></td>
        </tr>
        <tr>
            <td style="text-align:right"><a href="ForgotPass.aspx">Quên mật khẩu?</a></td>
        </tr>
    </table>
	</form>
<?php
	include("bottomU.php");
?>