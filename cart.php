<?php
	include("topU.php");
?>

<?php
	include("connec.php");
	if(!isset($_GET['action'])){
		if($_SESSION["demcart"]==0)
		{
			echo("<script language='javascript'>
				window.location='index.php';
				 </script>
			");
		}
	}
	
	if(!isset($_SESSION["cart"])){
		$_SESSION["cart"] = array();
	}
	else
	{
		$_SESSION["demcart"]=0; 
	}
	if(!isset($_SESSION["Size"])){
		$_SESSION["Size"] = array();
	}
	if(isset($_GET['action'])){
		function update_cart($add = false){
			foreach( $_POST["quantity"] as $id => $quantity ){
				if($quantity==0){
					unset($_SESSION["cart"][$id]);
				}
				else{
					if($add){
						$_SESSION["cart"][$id] += $quantity;
					}else{
						$_SESSION["cart"][$id]=$quantity;
					}
				}				
			}	
			foreach($_POST["rdSize"] as $id => $rdSize){
					$_SESSION["Size"][$id] = $rdSize;		
			}
		}
		switch($_GET['action']){
			case "add": 
				foreach($_POST["rdSize"] as $id => $rdSize){
					$_SESSION["Size1"][$id]= $rdSize;
				}
				foreach($_POST["quantity"] as $id => $quantity ){
					$_SESSION["cart1"][$id]=$quantity;
				}
				$sqlSize="SELECT ks.SoLuong FROM sanpham sp, kichthuoc_sanpham ks, kichthuoc kt WHERE sp.MaSanPham=ks.MaSanPham AND ks.MaKichThuoc=kt.MaKichThuoc AND sp.MaSanPham=".$_POST["masp"]." AND kt.Size='".$_SESSION["Size1"][$id]."';";
				$kqS=mysqli_query($con,$sqlSize) or die("Bạn không thể truy cập bảng kích thước sản phẩm Size".mysqli_error());
				$rowS=mysqli_fetch_array($kqS);	
				if($_SESSION["cart1"][$id]<=$rowS["SoLuong"])
				{
					update_cart(true);
					echo("<script language='javascript'>
						window.location='cart.php';
						 </script>
					");
				}
				else
				{				
					echo("<script language='javascript'>
						alert('Số lượng mua phải nhỏ hơn số lượng tồn [".$rowS["SoLuong"]."] của ".$_SESSION["Size1"][$id]."');
						window.location='viewdetailtproduct.php?MaSP=".$_POST["masp"]."';
						 </script>
					");
				}
				
				break;
			case "delete":
				if(isset($_GET["MaSP"])){
					unset($_SESSION["cart"][$_GET["MaSP"]]);
					unset($_SESSION["Size"][$_GET["MaSP"]]);
				}
				echo("<script language='javascript'>
					window.location='cart.php';
					 </script>
				");
				break;
			case "submit":
				if(isset($_POST["update_click"])){
					foreach( $_POST["quantity"] as $id => $quantity ){
						if($quantity==0){
							unset($_SESSION["cart"][$id]);
							echo("<script language='javascript'>
							window.location='cart.php';
							 </script>
							");
						}
						else{
							$sqlSize="SELECT ks.SoLuong FROM sanpham sp, kichthuoc_sanpham ks, kichthuoc kt WHERE sp.MaSanPham=ks.MaSanPham AND ks.MaKichThuoc=kt.MaKichThuoc AND sp.MaSanPham=".$id." AND kt.Size='".$_SESSION["Size"][$id]."';";
							$kqS=mysqli_query($con,$sqlSize) or die("Bạn không thể truy cập bảng kích thước sản phẩm Size".mysqli_error());
							$rowS=mysqli_fetch_array($kqS);	
							$_SESSION["cart"][$id]=$quantity;
							if($_SESSION["cart"][$id]<=$rowS["SoLuong"])
							{
								$_SESSION["cart"][$id]=$quantity;
							}
							else{
								$_SESSION["cart"][$id]=1;
								echo("<script language='javascript'>
								alert('Số lượng mua phải nhỏ hơn số lượng tồn [".$rowS["SoLuong"]."] của ".$_SESSION["Size"][$id]."');
								window.location='cart.php';
								 </script>
							");
							}
						}
					}
				}else if($_POST["order_click"]){
					if(!isset($_SESSION["nameU"]))
					{
						echo("<script language='javascript'>
								 alert('Bạn phải đăng nhập mới được thanh toán !');
								 window.location='loginU.php';
								</script>	
								");
					}
					else
					{
						if(empty($_POST["quantity"])){
							echo("<script language='javascript'>
								alert('Giỏ hàng của bạn rỗng');
								window.location='cart.php';
								 </script>
								");
						}
						if(!empty($_POST["quantity"])){
							$sql="SELECT * FROM `sanpham` WHERE `MaSanPham` IN (".implode(",",array_keys($_POST["quantity"])).")";
							$kq=mysqli_query($con,$sql) or die("Bạn không thể truy cập bảng sản phẩm".mysqli_error());
							$total=0;
							$orderProduct = array();
							while($row=mysqli_fetch_array($kq)){
								$orderProduct[]=$row;
								$total+=$row["Gia"] * $_POST["quantity"][$row["MaSanPham"]];
							}
							$ngDH=date("Y-m-d");
							$nguoiDH=$_SESSION["nameU"];
							$sql1="INSERT INTO `hoadon` (`MaHD`, `HoTenNguoiNH`, `DiaChiNH`, `SoDienThoaiNH`, `PhuongThucTT`, `GhiChuHD`, `TrangThaiHD`, `TenDangNhap`, `NgayDatHang`) VALUES ('HD".date("dmHis")."', '".$_POST["name"]."', '".$_POST["address"]."', '".$_POST["phone"]."', '".$_POST["rdPttt"]."', '".$_POST["note"]."', '1', '".$nguoiDH."', '".$ngDH."');";
							$inserthd=mysqli_query($con,$sql1) or die("Bạn không thể truy cập bảng hóa đơn".mysqli_error());
							$orderID = $con->insert_id;
							$insertString="";
							foreach($orderProduct as $key => $kq)
							{
								$insertString .= "(NULL, 'HD".date("dmHis")."', '".$kq["MaSanPham"]."', '".$_POST["quantity"][$kq["MaSanPham"]]."', '".$kq["Gia"]*$_POST["quantity"][$kq["MaSanPham"]]."', '".$_POST["size"][$kq["MaSanPham"]]."')";
								if($key != count($orderProduct) - 1){
									$insertString .= ",";
								}
								$size="Select MaKichThuoc from kichthuoc where Size='".$_POST["size"][$kq["MaSanPham"]]."'";
								$kqsize=mysqli_query($con,$size) or die("Không thể kết nối bảng kích thước".mysqli_error());
								while($row=mysqli_fetch_array($kqsize))
								{
									$sqlSL="update kichthuoc_sanpham set SoLuong=SoLuong - '".$_POST["quantity"][$kq["MaSanPham"]]."' where MaSanPham='".$kq["MaSanPham"]."' AND MaKichThuoc='".$row["MaKichThuoc"]."'";
									$kqsize=mysqli_query($con,$sqlSL) or die("Không thể kết nối bảng kích thước sản phẩm".mysqli_error());
								}

							}
							$sql00="INSERT INTO `chitiethd` (`Id`, `MaHD`, `MaSP`, `SoLuongMua`, `ThanhTien`, `SizeMua`) VALUES ".$insertString.";";
							$kq1=mysqli_query($con,$sql00) or die("Bạn không thể truy cập bảng chi tiết hóa đơn".mysqli_error());
							
							unset($_SESSION["cart"]);
							$_SESSION["cart"]=null;
							echo("<script language='javascript'>
							window.location='shopingSuccess.php';
							 </script>
							");
						}
					}
				}
				break;
		}
	}
	if(!empty($_SESSION["cart"])){	
		$sql="SELECT * FROM sanpham WHERE MaSanPham IN (".implode(",",array_keys($_SESSION["cart"])).")";
		$kq=mysqli_query($con,$sql) or die("Bạn không thể truy cập bảng sản phẩm".mysqli_error());
	}
?>

	<h2 align="center">THÔNG TIN GIỎ HÀNG CỦA QUÝ KHÁCH<br><br></h>
	<form name="frm_Carst" action="cart.php?action=submit" method="POST" onsubmit="return kiemtra();">
	<table width="100%" class="table table-condensed">
		<tr>
			<th style="color:red; text-align:center;">STT</th>
			<th style="color:red; text-align:center;">Tên sản phẩm</th>
			<th width="125" style="color:red; text-align:center;">Ảnh sản phẩm</th>
			<th style="color:red; text-align:center;">Size</th>
			<th style="color:red; text-align:center;">Đơn giá</th>
			<th style="color:red; text-align:center;">Số lượng</th>
			<th style="color:red; text-align:center;">Thành tiền</th>
			<th style="color:red; text-align:center;">Xóa</th>
		</tr>
		<?php 
			if(!empty($kq)){
				$total=0;
				$num=1;
				while($row=mysqli_fetch_array($kq)){ ?>
				<tr>
					<td><?=$num?></td>
					<td><?=$row["TenSanPham"]?></td>
					<td><img src="<?=$row["HinhAnh1"]?>" height="125" width="100%"></td>
					<td>
						<?=$_SESSION["Size"][$row["MaSanPham"]]?> <input type="hidden" value="<?=$_SESSION["Size"][$row["MaSanPham"]]?>" name="size[<?=$row["MaSanPham"]?>]">
					</td>
					<td><?=$row["Gia"]?></td>
					<td><input type="text" value="<?=$_SESSION["cart"][$row["MaSanPham"]]?>" name="quantity[<?=$row["MaSanPham"]?>]" size="5"></td>
					<td><?=$row["Gia"] * $_SESSION["cart"][$row["MaSanPham"]]?></td>
					<td><a href="cart.php?action=delete&MaSP=<?=$row["MaSanPham"]?>">Xóa</a></td>
				</tr>
			<?php 
				$total += $row["Gia"] * $_SESSION["cart"][$row["MaSanPham"]];
			$num++; } $_SESSION["demcart"] = $num-1; ?>
				<tr>
					<td colspan="5">Tổng tiền</td>
					<td colspan="2"><?=number_format($total, 0, ",", ".")?></td>
				</tr>
			<?php } ?>
	</table>
	<div style="text-align:right;">
		<input type="submit" name="update_click" value="Cập nhật giỏ hàng">
	</div>
	<div>
		<h2>THÔNG TIN ĐẶT HÀNG<br><br></h2>
		<table style="width:80%;text-align:center; margin:auto;">
			<tr>
				<td>Họ tên người nhận hàng(<span style="color:red;">*</span>)</td>
				<td><input type="text" placeholder="Nhập họ tên người nhận hàng" class="form-control" name="name"></td>
			</tr>
			<tr>
				<td>Địa chỉ nhận hàng(<span style="color:red;">*</span>)</td>
				<td><input type="text" placeholder='Nhập địa chỉ nhận hàng' class="form-control" name="address" ></td>
			</tr>
			<tr>
				<td>Số điện thoại(<span style="color:red;">*</span>)</td>
				<td><input type="text" placeholder='Nhập số diện thoại'MaxLength="10" class="form-control" name="phone" ></td>
			</tr>
			<tr>
				<td>Phương thức thanh toán(<span style="color:red;">*</span>)</td>
				<td><input type='radio' name='rdPttt' value='1' checked="checked">Trả tiền mặt khi nhận hàng &nbsp; <input type='radio' name='rdPttt' value='2'>Chuyển khoản ngân hàng</td>
			</tr>
			<tr>
				<td>Ghi chú đơn hàng(tùy chọn)</td>
				<td><textarea name="note" class="form-control" cols="50" rows="7"></textarea></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="order_click" value="Đặt hàng"></td>
			</tr>
		</table>
	</div>
	</form>
<?php
	include("bottomU.php");
?>
<script>
function kiemtra()
	{
		hoten=document.frm_Carst.name.value;
		diachi=document.frm_Carst.address.value;
		sdt=document.frm_Carst.phone.value;
 
		var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
		
		if(hoten=="")
		{
			alert("Bạn chưa nhập họ tên người nhận hàng?");
			document.frm_Carst.name.focus();
			return false;
		}
		else if(diachi=="")
		{
			alert("Bạn chưa nhập địa chỉ nhận hàng ?");
			document.frm_Carst.address.focus();
			return false;
		}
		else if(sdt=="")
		{
			alert("Bạn chưa Nhập số điện thoại ?");
			document.frm_Carst.phone.focus();
			return false;
		}
		else if(!sdt.match(phoneno))
		{
			alert("Số điện thoại không hợp lệ ?");
			document.frm_Carst.phone.value="";
			document.frm_Carst.phone.focus();
			return false;
		}
		else
		{
			return true;
		}
	}
</script>