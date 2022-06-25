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
		font-size: 14pt;
	}
</style>

<script language="javascript">
	function kiemtra()
	{
		tensp=document.frmSanPham.txtTenSP.value;
		gia=document.frmSanPham.nbGia.value;
		bhanh=document.frmSanPham.txtBaoHanh.value;
		mta=document.getElementById('mota').value; 
		hanh=document.frmSanPham.image1.value;
		
		if(tensp=="")
		{
			alert("Bạn chưa nhập tên sản phẩm ?");
			document.frmSanPham.txtTenSP.focus();
			return false;
		}
		else if(gia=="")
		{
			alert("Bạn chưa nhập giá sản phẩm ?");
			document.frmSanPham.nbGia.focus();
			return false;
		}
		else if(bhanh=="")
		{
			alert("Bạn chưa nhập thông tin bảo hành ?");
			document.frmSanPham.txtBaoHanh.focus();
			return false;
		}
		else if(mta=="")
		{
			alert("Bạn chưa nhập mô tả sản phẩm ?");
			document.getElementById('mota').focus(); 
			return false;
		}
		else if(hanh=="")
		{
			alert("Bạn chưa chọn hình ảnh 1 ?");
			document.frmSanPham.image1.focus();
			return false;
		}
		else
		{
			return true;
		}
	}
	function uploadFile1(target) 
	{
		var fileInput = document.getElementById('file1');
		var filePath = fileInput.value;
		var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.jfif)$/i;
		if(!allowedExtensions.exec(filePath))
		{
			fileInput.value = '';
			alert('Vui lòng upload các file có định dạng: .jpeg/.jpg/.png/.gif/.jfif only.');
			return false;
		}
	}
	function uploadFile2(target) 
	{
		var fileInput = document.getElementById('file2');
		var filePath = fileInput.value;
		var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.jfif)$/i;
		if(!allowedExtensions.exec(filePath))
		{
			fileInput.value = '';
			alert('Vui lòng upload các file có định dạng: .jpeg/.jpg/.png/.gif/.jfif only.');
			return false;
		}
	}
	function uploadFile3(target) 
	{
		var fileInput = document.getElementById('file3');
		var filePath = fileInput.value;
		var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.jfif)$/i;
		if(!allowedExtensions.exec(filePath))
		{
			fileInput.value = '';
			alert('Vui lòng upload các file có định dạng: .jpeg/.jpg/.png/.gif/.jfif only.');
			return false;
		}
	}
	function uploadFile4(target) 
	{
		var fileInput = document.getElementById('file4');
		var filePath = fileInput.value;
		var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.jfif)$/i;
		if(!allowedExtensions.exec(filePath))
		{
			fileInput.value = '';
			alert('Vui lòng upload các file có định dạng: .jpeg/.jpg/.png/.gif/.jfif only.');
			return false;
		}
	}
</script>

<?php
	include("topA.php");
?>

    <h2 style="text-align:center; color:red;">Thêm sản phẩm mới</h2>
	<form name="frmSanPham" enctype="multipart/form-data" action="xlyInsertproduct.php" method="post" onsubmit="return kiemtra();">
    <table style="width:80%; margin:auto;" >
        <tr>
            <td>Tên sản phẩm<span style="color:red;">(*)</span></td>
            <td><input type="text" name="txtTenSP" Class="form-control" placeholder="Nhập Tên Giày" MaxLength="50"></td>
        </tr>
        <tr>
            <td>Giá<span style="color:red;">(*)</span></td>
            <td><input type="number" name="nbGia" Class="form-control" placeholder="Giá là ký tự số" MaxLength="7" min="1"></td>
        </tr>
        <tr>
            <td>Bảo hành<span style="color:red;">(*)</span></td>
            <td><input type="text" name="txtBaoHanh" Class="form-control" placeholder="Nhập thông tin bảo hành" MaxLength="50"></td>
        </tr>
        <tr>
            <td>Mô tả<span style="color:red;">(*)</span></td>
            <td>
				<textarea name="txtMoTa" id="mota" rows="6" Class="form-control" style="resize:none;" placeholder="Nhập thông tin mô tả"></textarea>
			</td>
        </tr>
        <tr>
            <td>Giới tính<span style="color:red;">(*)</span></td>
            <td>			
				<fieldset Class="form-control" style="width:25%; text-align:center;">
					<input type="radio" name="rdGiTinh" value="1" checked>Nam &nbsp; &nbsp; &nbsp; <input type="radio" name="rdGiTinh" value="2">Nữ
				</fieldset>
			</td>
        </tr>
        <tr>
            <td>Hình Ảnh 1<span style="color:red;">(*)</span></td>
            <td>
				<input type="hidden" name="MAX_FILE_SIZE1" value="1000000">
				<input type="file" name="image1" accept="image/*" id="file1" Class="form-control" onchange="uploadFile1(this)">
			</td>
        </tr>
         <tr>
            <td>Hình Ảnh 2</td>
            <td>
				<input type="hidden" name="MAX_FILE_SIZE2" value="1000000">
				<input type="file" name="image2" accept="image/*" id="file2" Class="form-control" onchange="uploadFile2(this)">
			</td>
        </tr>
           <tr>
            <td>Hình Ảnh 3</td>
            <td>
				<input type="hidden" name="MAX_FILE_SIZE3" value="1000000">
				<input type="file" name="image3" accept="image/*" id="file3" Class="form-control" onchange="uploadFile3(this)">
			</td>
        </tr>
         <tr>
            <td>Hình Ảnh 4</td>
            <td>
				<input type="hidden" name="MAX_FILE_SIZE4" value="1000000">
				<input type="file" name="image4" accept="image/*" id="file4" Class="form-control" onchange="uploadFile4(this)">
			<td>
        </tr>
        <tr>
            <td>Tên Danh Mục<span style="color:red;">(*)</span></td>
            <td>
                <select name="slDanhMuc" Class="form-control">
					<option	value="1" selected>Adidas</option>
					<option value="2">Nike</option>
					<option value="3">Puma</option>
				</select>
            </td>
        </tr>
        <tr style="text-align:center;">
			<td colspan="2"><input type="submit" value="Thêm sản phẩm" class='btn btn-primary'></td>
		</tr>
    </table>
	</form>
    <div><a href="product.php" style="margin-left:30px;"><< Trở về</a></div>
<?php
	include("bottomA.php");
?>