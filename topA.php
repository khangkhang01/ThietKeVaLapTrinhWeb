</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="admin.php">Trang chủ Admin</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <a href="index.php" class="btn btn-primary" target= "_blank">Website HKC >></a>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">

                <li style="color:white;">Xin chào <span class="navbar-brand">(<span style="color:red;font-style:italic;"><?php echo $_SESSION["nameA"]; ?></span>)</span></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
						<li><a class="dropdown-item" href="chon_ban_chat1.php">Chat với người dùng</a></li>
                        <li><a class="dropdown-item" href="ThongtinAdmin.php">Quản lý thông tin Admin</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logoutA.php">Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu"><br />
                        <div class="nav">
                             <a class="nav-link" href="shopinfo.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Thông tin cửa hàng
                            </a>
                             <a class="nav-link" href="manageuser.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Quản lý người dùng
                            </a>
                             <a class="nav-link" href="product.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Quản lý sản phẩm
                            </a>
                             <a class="nav-link" href="product_size.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Quản lý Size sản phẩm
                            </a>
                            <a class="nav-link" href="managereceipt.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Quản lý hóa đơn
                            </a>
                             <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Quản lý bình luận
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="listCart.php">Bình luận</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Quản trị bởi: </div>
 
                        <span style="font-style:italic; margin-left:25px;"><?php echo $_SESSION["nameA"]; ?></span>

                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <div>
                    <br />