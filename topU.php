<?php
session_start();

function online()
{
    $rip = $_SERVER['REMOTE_ADDR'];
    $sd = time();
    $count = 1;
    $maxu = 1;
 
    $file1 = "counter/online.log";
    $lines = file($file1);
    $line2 = "";
 
    foreach ($lines as $line_num => $line)
    {
        if($line_num == 0)
        {
            $maxu = $line;
        }
        else
        {
            $fp = strpos($line,'****');
            $nam = substr($line,0,$fp);
            $sp = strpos($line,'++++');
            $val = substr($line,$fp+4,$sp-($fp+4));
            $diff = $sd-$val;
 
            if($diff < 300 && $nam != $rip)
            {
                $count = $count+1;
                $line2 = $line2.$line;
            }
        }
    }
 
    $my = $rip."****".$sd."++++\n";
    if($count > $maxu)
    $maxu = $count;
 
    $open1 = fopen($file1, "w");
    fwrite($open1,"$maxu\n");
    fwrite($open1,"$line2");
    fwrite($open1,"$my");
    fclose($open1);
    $count=$count;     
    return $count;
}
 
///////////////////////
    $ip = $_SERVER['REMOTE_ADDR'];
     
    $file_ip = fopen('counter/ip.txt', 'rb');
    while (!feof($file_ip)) $line[]=fgets($file_ip,1024);
    for ($i=0; $i<(count($line)); $i++) {
        list($ip_x) = explode("\n",$line[$i]);
        if ($ip == $ip_x) {$found = 1;}
    }
    fclose($file_ip);
     
    if (!($found==1)) {
        $file_ip2 = fopen('counter/ip.txt', 'ab');
        $line = "$ip\n";
        fwrite($file_ip2, $line, strlen($line));
        $file_count = fopen('counter/count.txt', 'rb');
        $data = '';
        while (!feof($file_count)) $data .= fread($file_count, 4096);
        fclose($file_count);
        list($today, $yesterday, $total, $date, $days) = explode("%", $data);
        if ($date == date("Y m d")) $today++;
            else {
                $yesterday = $today;
                $today = 1;
                $days++;
                $date = date("Y m d");
            }
        $total++;
        $line = "$today%$yesterday%$total%$date%$days";
         
        $file_count2 = fopen('counter/count.txt', 'wb');
        fwrite($file_count2, $line, strlen($line));
        fclose($file_count2);
        fclose($file_ip2);
      }
       
       
    function today()
    {
        $file_count = fopen('counter/count.txt', 'rb');
        $data = '';
        while (!feof($file_count)) $data .= fread($file_count, 4096);
        fclose($file_count);
        list($today, $yesterday, $total, $date, $days) = explode("%", $data);
        return $today;
    }
    function yesterday()
    {
        $file_count = fopen('counter/count.txt', 'rb');
        $data = '';
        while (!feof($file_count)) $data .= fread($file_count, 4096);
        fclose($file_count);
        list($today, $yesterday, $total, $date, $days) = explode("%", $data);
        return $yesterday;
    }
    function total()
    {
        $file_count = fopen('counter/count.txt', 'rb');
        $data = '';
        while (!feof($file_count)) $data .= fread($file_count, 4096);
        fclose($file_count);
        list($today, $yesterday, $total, $date, $days) = explode("%", $data);
        echo $total;
    }
    function avg()
    {
        $file_count = fopen('counter/count.txt', 'rb');
        $data = '';
        while (!feof($file_count)) $data .= fread($file_count, 4096);
        fclose($file_count);
        list($today, $yesterday, $total, $date, $days) = explode("%", $data);
        echo ceil($total/$days);
    } 
?>

<!DOCTYPE html>

<html>
<head>
  <title>Trang chủ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script  src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
      .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
    td{
        padding:5px;
    }
     .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 100px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
      width:100px;
    }
    .dropdown-content a:hover {
        font-weight:bold;
	    background:#F51C7B;
	    color:white;
    }
      .dropdown:hover .dropdown-content {
          display: block;
      }
      * {
    font-family: Helvetica, Arial, sans-serif;
    font-size: 12pt;
}
        .affix {
    top: 0;
    width: 100%;
    z-index: 9999 !important;
  }
  </style>
  <script>
      $(document).ready(function myfunction() {
          $("#btnCart").click(function myfunction() {
              window.location.href = "Cart.php";
          });
      });
  </script>
</head>
<body>
        <nav class="navbar navbar-default" data-spy="affix" data-offset-top="20">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     <a href="."><img src="images/fav1.png" style="width:50px; height:50px; object-fit:contain;"/></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="."><span style="font-weight:bold; color:#C7095A;">Trang chủ</span></a></li>
         <li><a href="introduce.php"><span style="font-weight:bold; color:#C7095A;">Giới thiệu</span></a></li>
        <li class="dropdown"><a class="dropbtn" href="#"><span style="font-weight:bold; color:#C7095A;">Giày ADIDAS</span></a>
          <div class="dropdown-content">
            <a href="giayadidas.php?GT=1">Nam</a>
            <a href="giayadidas.php?GT=2">Nữ</a>
        </div></li>
         <li class="dropdown"><a class="dropbtn" href="#"><span style="font-weight:bold; color:#C7095A;">Giày NIKE</span></a>
          <div class="dropdown-content">
            <a href="giaynike.php?GT=1">Nam</a>
            <a href="giaynike.php?GT=2">Nữ</a>
        </div></li>
         <li class="dropdown"><a class="dropbtn" href="#"><span style="font-weight:bold; color:#C7095A;">Giày PUMA</span></a>
          <div class="dropdown-content">
            <a href="giayPuma.php?GT=1">Nam</a>
            <a href="giayPuma.php?GT=2">Nữ</a>
        </div></li>
        <li><a href="contact.php"><span style="font-weight:bold; color:#C7095A;">Liên hệ</span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
            <li><button id="btnCart" class="btn btn-primary nav-btn" type="button" style="margin-top:8px; background:#F51C7B; border:0px;">
                Giỏ hàng <span class="badge"><?php if(isset($_SESSION["cart"])) if(isset($_SESSION["demcart"])) echo $_SESSION["demcart"]; ?></span>
             </button></li>
        <?php
		if (!isset($_SESSION["nameU"]))
        {
			echo("<li><a href='signup.php'><span class='glyphicon glyphicon-user'></span> <span style='font-weight:bold;'>Đăng ký</span></a></li>");
			echo("<li><a href='loginU.php'><span class='glyphicon glyphicon-log-in'></span> <span style='font-weight:bold;'>Đăng nhập</span></a></li>");
		}
        else
        {
         ?>
				<li class='dropdown'>
                <a class='dropdown-toggle' data-toggle='dropdown' href='#' style="font-weight:bold;"><span>
                <span class='caret'></span>Tài khoản</a>
                <ul class='dropdown-menu'>
				  <li><a href='chon_ban_chat.php'>Chat trực tuyến</a></li>
                  <li><a href='DonhangCB.php'>Đơn hàng của bạn</a></li>
                  <li><a href='ThongtinND.php'>Thông tin người dùng</a></li>
                  <li><a href='DoimatkhauND.php'>Đổi mật khẩu</a></li>
                </ul>
            </li>
            <li><a href='LogoutU.php'><span class='glyphicon glyphicon-log-out'>(<?php echo $_SESSION["nameU"]; ?>)</span> <span style='font-weight:bold;'>Logout</span></a></li>		
		<?php } ?>
      </ul>
    </div>
  </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" style="max-height:480px;">
      <div class="item active">
        <a href="http://localhost:62596/ChonXemCTSP.aspx?MaSP=A01NAT"><img src="Images/ADIDAS GRAND COURT BASE TKW.jpg" alt="Image"></a>   
      </div>

      <div class="item">
        <a href="http://localhost:62596/ChonXemCTSP.aspx?MaSP=N03NADX"><img src="Images/NIKE RENEW RUN 2 TKW.jpg" alt="Image"></a>     
      </div>

       <div class="item">
       <a href="http://localhost:62596/ChonXemCTSP.aspx?MaSP=P03NAT"><img src="Images/PUMA COURT PURE TKW.jpg" alt="Image"></a> 
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
        <p style="font-size:larger;">Thống kê truy cập</p>
        <div class="well">
          <table style="width:100%; text-align:left; font-style:italic;">       
            <tr>
                <td style="width:75%; padding-left:10px;text-align:center;">
                   Đang online:</td>
                <td style="width:50%; padding-right:10px;">
					<?php echo online(); ?>
				</td>
            </tr>
            <tr>
                <td style="width:75%; padding-left:10px;text-align:center;">
                    Hôm nay:</td>
                <td style="width:50%; padding-right:10px">
                     <?php echo today(); ?>
			    </td>
            </tr>
            <tr>
                <td style="width:75%; padding-left:10px;text-align:center;">
                     Hôm qua:</td>
                <td style="width:50%; padding-right:10px">
					<?php echo yesterday(); ?>
                </td>
            </tr>
            <tr>
                <td style="width:50%; padding-left:10px;text-align:center;">
                     Tổng số truy cập:</td>
                <td style="width:50%; padding-right:10px">
					<?php total(); ?>
				</td>
            </tr>
            <tr>
                <td style="width:50%; padding-left:10px;text-align:center;">
                    Truy cập trung bình:</td>
                <td style="width:50%; padding-right:10px">
                     <?php avg(); ?>
				 </td>
            </tr>
         </table>
      </div>
    </div>
    <div class="col-sm-8 text-left"> 
        <div>