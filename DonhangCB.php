<?php
	include("topU.php");
?>

<div> 
		<h3>Đơn hàng của bạn</h3>         
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Mã hóa đơn</th>
                <th>Phương thức thanh toán</th>
                <th>Trạng thái hóa đơn</th>
                <th>Ngày đặt hàng</th>
              </tr>
            </thead> 
            <tbody id="myTable">
<?php
	   include("connec.php");
	   $sql="select * from hoadon";
	   $kq=mysqli_query($con,$sql) or die("Không thể kết nối bảng hóa đơn".mysqli_error());
       while($row=mysqli_fetch_array($kq))
	   {
			echo("
				<tr>
					<td>    
						".$row["MaHD"]."
					</td>
					<td>");   
						if($row["PhuongThucTT"]==1){
							echo("Trả tiền mặt khi nhận hàng");
						}
						else{
							echo("Chuyển khoản ngân hàng");
						}
			echo("		</td>
					<td>");  
					   if($row["TrangThaiHD"]==1){
						   echo("Đơn hàng mới");
					   }
					   else if($row["TrangThaiHD"]==2){
						    echo("Đang giao");
					   }
					   else{
						    echo("Đã giao");
					   }
						   
			echo("		</td>
					 <td>  
						".$row["NgayDatHang"]."
					</td>
			  </tr>      
			");
	   }
?>			
            </tbody>
            </table>
    </div>

<?php
	include("bottomU.php");
?>