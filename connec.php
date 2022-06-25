<?php
	$con=mysqli_connect("localhost","root","") or die("Không thể kết nối đến server".mysqli_error());
	$db=mysqli_select_db($con,"csdl_duanbangiay") or die("Không thể chọn được cơ sở dữ liệu dự án bán giày".mysqli_error());
	mysqli_query($con,"SET NAMES 'utf8'");
?>