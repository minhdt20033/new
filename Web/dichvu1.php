<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bao tri</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./baitaplon1.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
</head>
<style>
table {
    border-collapse: collapse; /* Để làm cho đường viền không có khoảng trống giữa các ô */
    width: 100%;
}

th, td {
    border: 1px solid #ddd; /* Đường viền 1px với màu xám nhạt (#ddd) */
    padding: 12px; /* Khoảng cách giữa nội dung và đường viền */
    text-align: left;
    padding-bottom: 15px;
    padding-left: 23px;
    
}
.cangiua{
    text-align: center;
}

th {
    background-color: #f2f2f2; /* Màu nền cho dòng tiêu đề */
}

#table-of-contents ul li a {
    white-space: nowrap; /* Ngăn chặn ngắt dòng */
}
a{
    text-decoration: none; /* Loại bỏ dấu gạch dưới */
}
</style>
<body>
<?php
        $servername = "localhost:3306";
        $username = "namkks";
        $userpass = "Namkks203";
        $database = "chamsocmaytinh";
        $con = new mysqli($servername,$username,$userpass,$database);
        session_start();
    ?>
<div class="head">
        <nav class="navbar navbar-expand-lg bg-success">
        <div class="container-fluid" style="margin-left: 20%;">
            <a class="navbar-brand" href="./1home.php?"><img src="./Anh/Logo.png" style="width: 250px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-warning" type="submit">Search</button>
            </form>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="" data-bs-toggle="modal" data-bs-target="#ModalLH" style="width: auto">
                    <img src="./Anh/CalendarLogo.png" style="width: 60px;">
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light fw-semibold" href="" data-bs-toggle="modal" data-bs-target="#ModalLH"><p style="width: 70px;">Đặt lịch sửa chữa</p></a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light fw-semibold" href="tel:+84896130627" target="_blank"><i class="bi bi-telephone-fill"></i>+84896130627</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light fw-semibold" id="giohang" href="./giohang.php?mand=<?php 
                if(isset($_SESSION["idnd"])) echo $_SESSION["idnd"] ?>"><i class="bi bi-basket-fill"></i>Giỏ hàng</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light fw-semibold" id="account" href="" data-bs-toggle="modal" data-bs-target="#ModalDN"><i class="bi bi-person-circle"></i>Tài khoản</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
    </div>
    <div class="modal fade" id="ModalLH" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal">
                        <span>&times;</span></button>
                    <h4 class="modal-title">Đặt lịch</h4>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="form-group" style="width: 25%; float: left; margin-left: 8%;">
                                <label for="">Ngày</label>
                                <select class="form-select" id="ngaydl" aria-label="Default select example">
            <?php
                                    for($i = 1; $i <= 31; $i++){
            ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php

                                    }
            ?>
                                </select>
                            </div>
                            <div class="form-group" style="width: 25%; float: left; margin-left: 3%;">
                                <label for="">Tháng</label>
                                <select class="form-select" id="thangdl" aria-label="Default select example">
            <?php
                                    for($i = 1; $i <= 12; $i++){
            ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php

                                    }
            ?>
                                </select>
                            </div>
                    <div class="form-group" style="clear: both;">
                        <label for="">Dịch vụ</label>
                        <select class="form-select" id="madv" aria-label="Default select example">
            <?php
                    $result = $con->query("select * from dichvu");
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc())
                        {
            ?>
                            <option value="<?php echo $row["MaDV"] ?>"><?php echo $row["TenDV"] ?></option>
            <?php
                        }
                    }
            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success btn-lg" id="btndl" style="margin-top: 20px;float:right">Đặt lịch</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#btndl").click(function(){
                $.ajax({
                    url: "datlich.php",
                    method: "post",
                    dataType: "html",
                    data: {
                        ngay: $("#ngaydl").val(),
                        thang: $("#thangdl").val(),
                        madv: $("#madv").val()
                    }
                }).done(function(ketqua){
                    alert(ketqua);
                });
            });
        });
    </script>
    <?php
        $quyen = -1;
        
        if(isset($_SESSION["idnv"])){
            $ma = $_SESSION["idnv"];
            $sql = $con->prepare("select * from nhanvien where MaNV = ?");
            $sql->bind_param("s",$ma);
            $sql->execute();
            $ketqua = $sql->get_result();
            if($ketqua->num_rows > 0){
                $quyen = 1;
                $row = $ketqua->fetch_assoc();
    ?>
                
        <div class="modal fade" id="ModalTT" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal">
                        <span>&times;</span></button>
                    <h4 class="modal-title">Thông tin tài khoản</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="taikhoan"><b>Mã nhân viên</b></label><br>
                            <label for=""><?php echo $row["MaNV"] ?></label>
                        </div>
                        <div class="form-group">
                            <label for="taikhoan"><b>Họ Tên</b></label><br>
                            <label for=""><?php echo $row["HoTen"] ?></label>
                        </div>
                        <div class="form-group">
                            <label for="taikhoan"><b>Số điện thoại</b></label><br>
                            <label for=""><?php echo $row["SDT"] ?></label>
                        </div>
                        <div class="form-group">
                            <label for="taikhoan"><b>Địa chỉ</b></label><br>
                            <label for=""><?php echo $row["DiaChi"] ?></label>
                        </div>
                        <button class="btn btn-danger" id="btnDX">Đăng Xuất</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-lg" style="margin-top: 20px;float:right" data-bs-toggle="modal" data-bs-target="#ModalDK">Đăng Xuất</button>
                </div>
            </div>
        </div>
        </div>
    <?php
            }
        }else if(isset($_SESSION["idnd"])){
            $ma = $_SESSION["idnd"];
            $sql = $con->prepare("select * from nguoidung where MaND = ?");
            $sql->bind_param("s",$ma);
            $sql->execute();
            $ketqua = $sql->get_result();
            if($ketqua->num_rows > 0){
                $quyen = 0;
                $row = $ketqua->fetch_assoc();
    ?>
                
        <div class="modal fade" id="ModalTT" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal">
                        <span>&times;</span></button>
                    <h4 class="modal-title">Thông tin tài khoản</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="taikhoan"><b>Mã người dùng</b></label><br>
                            <label for=""><?php echo $row["MaND"] ?></label>
                        </div>
                        <div class="form-group">
                            <label for="taikhoan"><b>Họ Tên</b></label><br>
                            <label for=""><?php echo $row["HoTen"] ?></label>
                        </div>
                        <div class="form-group">
                            <label for="taikhoan"><b>Tên tài khoản</b></label><br>
                            <label for=""><?php echo $row["Tentk"] ?></label>
                        </div>
                        <div class="form-group">
                            <label for="taikhoan"><b>Số điện thoại</b></label><br>
                            <label for=""><?php echo $row["SDT"] ?></label>
                        </div>
                        <div class="form-group">
                            <label for="taikhoan"><b>Ngày sinh</b></label><br>
                            <label for=""><?php echo $row["NgaySinh"] ?></label>
                        </div>
                        <div class="form-group">
                            <label for="taikhoan"><b>Địa chỉ</b></label><br>
                            <label for=""><?php echo $row["DiaChi"] ?></label>
                        </div>
                        <button class="btn btn-danger" id="btnDX">Đăng Xuất</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-lg" style="margin-top: 20px;float:right" data-bs-toggle="modal" data-bs-target="#ModalDK">Đăng Xuất</button>
                </div>
            </div>
        </div>
        </div>
        
    <?php
            }
        }
    ?>
    <script>
            $(document).ready(function(){
            $("#account").text("<?php echo $row["HoTen"] ?>");
            $("#account").attr("data-bs-target","#ModalTT");
            $("#btnDX").click(function(){
                $.ajax({
                    url: "dangxuat.php",
                    dataType: "html"
                }).done(function(tmp){
                    alert(tmp);
                });
            });
            });
        </script>
    <!------------ form dang nhap----------->
    <div class="modal fade" id="ModalDN" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal">
                        <span>&times;</span></button>
                    <h4 class="modal-title">Đăng nhập</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="taikhoan">Tài khoản</label>
                            <input class="form-control" id="taikhoan">
                        </div>
                        <div class="form-group">
                            <label for="taikhoan">Mật khẩu</label>
                            <input class="form-control" type="password" id="matkhau">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Nhớ tài khoản?
                            </label>
                        </div>
                        <button class="btn btn-info btn-lg" id="btnDN" style="margin-top: 20px;">Login</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-lg" style="margin-top: 20px;float:right" data-bs-toggle="modal" data-bs-target="#ModalDK">Đăng kí</button>
                </div>
            </div>
        </div>
    </div>
    <!-----------------form dang ki----------->
    <div class="modal fade" id="ModalDK" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal">
                        <span>&times;</span></button>
                    <h4 class="modal-title">Đăng Kí</h4>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="form-group">
                            <label for="taikhoan">Họ Tên</label>
                            <input class="form-control" id="dkhoten">
                        </div>
                        <div class="form-group">
                            <label for="taikhoan">Tài khoản</label>
                            <input class="form-control" id="dktaikhoan">
                        </div>
                        <div class="form-group">
                            <label for="taikhoan">Mật khẩu</label>
                            <input class="form-control" type="password" id="dkmatkhau">
                        </div>
                        <div class="form-group">
                            <label for="taikhoan">Nhập lại mật khẩu</label>
                            <input class="form-control" id="dkmatkhautmp">
                        </div>
                        <div class="form-group">
                            <label for="taikhoan">Số điện thoại</label>
                            <input class="form-control" id="dksdt">
                        </div>
                        <div class="form-group">
                            <label for="">Ngày sinh</label>
                        </div>
                            <div class="form-group" style="width: 25%; float: left; margin-left: 8%;">
                                <label for="">Ngày</label>
                                <select class="form-select" id="ngay" aria-label="Default select example">
            <?php
                                    for($i = 1; $i <= 31; $i++){
            ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php

                                    }
            ?>
                                </select>
                            </div>
                            <div class="form-group" style="width: 25%; float: left; margin-left: 3%;">
                                <label for="">Tháng</label>
                                <select class="form-select" id="thang" aria-label="Default select example">
            <?php
                                    for($i = 1; $i <= 12; $i++){
            ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php

                                    }
            ?>
                                </select>
                            </div>
                            <div class="form-group" style="width: 25%; float: left; margin-left: 3%;">
                                <label for="">Năm</label>
                                <select class="form-select" id="nam" aria-label="Default select example">
            <?php
                                    for($i = 1980; $i <= 2023; $i++){
            ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php

                                    }
            ?>
                                </select>
                            </div>
                        <div class="form-group" style="clear:both;">
                            <label for="taikhoan">Địa chỉ</label>
                            <input class="form-control" id="dkdiachi">
                        </div>
                        <button class="btn btn-info btn-danger" id="btndk" style="margin-top: 20px;">Đăng Kí</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#btndk").click(function(e){
                e.preventDefault();
                if($("#dkhoten").val() == "" || $("#dktaikhoan").val() == "" ||$("#dkmatkhau").val() == "" 
                ||$("#dkmatkhautmp").val() == "" ||$("#dkdiachi").val() == "" ||$("#dksdt").val() == ""){
                    alert("Bạn phải điền đầy đủ thông tin");
                }else{
                    if($("#dkmatkhau").val() != $("#dkmatkhautmp").val()){
                        alert("Mật khẩu nhập lại không trùng khớp với mật khẩu của bạn!");
                    }else{
                        $.ajax({
                            url: "dangki.php",
                            type: "post",
                            dataType: "html",
                            data: {
                                name: $("#dkhoten").val(),
                                user: $("#dktaikhoan").val(),
                                pass: $("#dkmatkhau").val(),
                                sdt: $("#dksdt").val(),
                                ngay: $("#ngay").val(),
                                thang: $("#thang").val(),
                                nam: $("#nam").val(),
                                diachi: $("#dkdiachi").val()
                            }
                        }).done(function(ketqua){
                            alert(ketqua);
                        });
                    }
                }
            });
        });
    </script>
    <div class="bg-info">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href=""><i class="bi bi-house-door-fill"></i></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="./gioithieu.php">Giới thiệu</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dịch vụ
                </a>
                <ul class="dropdown-menu">
    <?php

            $result = $con->query("select * from dichvu");
            if($result->num_rows > 0){
                $i = 1;
                while($row = $result->fetch_assoc())
                {
    ?>
                    <li><a class="dropdown-item" href="./dichvu<?php echo $i ?>.php"><?php echo $row["TenDV"] ?></a></li>
    <?php
                    $i++;
                }
            }
    ?>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" id="cndichvu" href="">Cập nhật dịch vụ</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Linh kiện
                </a>
                <ul class="dropdown-menu">
    <?php

            $result = $con->query("SELECT DISTINCT Loai FROM `linhkien`");
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc())
                {
    ?>
                    <li><a class="dropdown-item" href="./phanloai.php?loai=<?php echo $row["Loai"] ?>"><?php echo $row["Loai"] ?></a></li>
    <?php
                }
            }
    ?>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" id="cnlinhkien" href="">Cập nhật linh kiện</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Hóa đơn
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" id="lbhoadon" href="./listhoadon.php">Hóa đơn</a></li>
                    <li><a class="dropdown-item" id="lbhoadontmp" href="">Hóa đơn tạm thời</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" id="laphoadon" href="./listhoadondv.php">Hóa đơn dịch vụ</a></li>
                </ul>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Lịch hẹn
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" id="lbhoadon" href="./listlichhen.php">Lịch hẹn</a></li>
                    <li><hr class="dropdown-divider"></li>
                </ul>
                </li>
            </ul>
            
            </div>
        </div>
        </nav>
    </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#btnDN").click(function(){
                if($("#taikhoan").val() == "" || $("#matkhau").val() == ""){
                    alert("Tài khoản hoặc mật khẩu không được bỏ trống!");
                }else{
                    $.ajax({
                        url: "checktaikhoan.php",
                        type: "post",
                        dataType: "html",
                        data: {
                            user: $("#taikhoan").val(),
                            pass: $("#matkhau").val()
                        }
                    }).done(function(ketqua){
                        alert(ketqua);
                    });
                }
            });
        });
    </script>
    <?php
        if($quyen <= 0){
    ?>
        <script>
            $(document).ready(function(){
                $("#cndichvu").click(function(){
                    alert("Chức năng này chỉ dành cho nhân viên!");
                });
                $("#cnlinhkien").click(function(){
                    alert("Chức năng này chỉ dành cho nhân viên!");
                });
                $("#lbhoadon").attr("href","listhoadon.php");
                $("#lbhoadontmp").click(function(){
                    alert("Chức năng này chỉ dành cho nhân viên!");
                });
                $("#laphoadon").click(function(){
                    alert("Chức năng này chỉ dành cho nhân viên!");
                });
            });
        </script>
    <?php
        }else{
    ?>
        <script>
            $(document).ready(function(){
                $("#lbhoadontmp").attr("href","listhoadontmp.php");
                $("#cndichvu").click(function(){
                    alert("Xin chao!");
                });
                $("#cnlinhkien").attr("href","listlinhkien.php?")
            });
        </script>
    <?php
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-11 mx-auto">
                <h2 style="color:#2080ca;">Dịch vụ Spa Laptop - Vệ sinh bảo dưỡng laptop</h2>
                <p><b>Hệ thống Sửa chữa Laptop 24h là đơn vị đầu tiên mang tới khái niệm "Spa Laptop" trên thị trường hiện nay. Để hiểu rõ hơn về dịch vụ này, cùng theo dõi trong bài viết dưới đây nhé!</b></p>
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" style="text-align: center;">
                                    <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                                        Nội dung bài viết
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                                    <div class="card-body">
                                        <div class="col-lg-4">
                                            <!-- Mục Lục Dọc -->
                                            <nav id="table-of-contents" class="flex-column">
                                                <h4>Mục Lục</h4>
                                                <ul>
                                                    <li><a href="#section1">1.  Khái niệm Spa Laptop</a></li>
                                                    <li><a href="#section2">2.  Các dịch vụ Spa Laptop cung cấp</a></li>
                                                    <li><a href="#section3">3.  Quy trình Spa Laptop tại Sửa chữa Laptop 24h</a></li>
                                                    <li><a href="#section4">4.  Một số câu hỏi thường gặp</a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="text-align:center;">
                    <br><img src="https://suachualaptop24h.com/upload_images/images/2023/04/10/dich-vu-spa-laptop-ve-sinh-bao-duong-laptop.jpg" width="750px" height="410px">
                    <p><em>Dịch vụ Spa Laptop tại Sửa chữa Laptop 24h</em></p>
                </div>
                <p>Dịch vụ Spa Laptop giúp giảm thiểu rất nhiều nguy cơ máy tính bị hỏng, bị lỗi nhờ việc giữ cho laptop sạch sẽ và bền bỉ. Sử dụng dịch vụ Spa Laptop tại Sửa chữa Laptop 24h để được các kỹ thuật viên bảo dưỡng laptop định kỳ cho bạn theo quy trình chuyên nghiệp.</p>
                
                <h2 id="section1">1. Khái niệm Spa Laptop</h2><br>
                    <p>Spa Laptop là toàn bộ quá trình vệ sinh, bảo dưỡng laptop bao gồm các bước: thổi bụi, vệ sinh bề mặt laptop, lau khô keo tản nhiệt cũ, tra kem tản nhiệt mới, tra mỡ quạt, vệ sinh khe tản nhiệt ống đồng, vệ sinh cánh quạt, bàn phím, loại bỏ các vết bẩn cứng đầu… </p>
                    <div style="text-align:center;">
                        <br><img src="https://lh5.googleusercontent.com/BR_m-2z6wN374HwbH7ZCzQCksQKonvvIvAEWYDkiU-LH1RKk8mPp9ftbip5-iAMJizYlVTXFgEsMt7KLHtBwmJoj8Pzoq2-NRjyxbn1OgkrItAwDRf_2qA0W1xSyiw3aupoDBHIxr-_6khC4P5Crfwg" width="750px" height="410px">
                        <p><em>Dịch vụ Spa Laptop tại hệ thống Sửa chữa Laptop 24h</em></p>
                    </div>
                    <p>Bạn nên thực hiện Spa Laptop từ 3 đến 6 tháng tùy theo tình trạng để đảm bảo máy luôn hoạt động ở tình trạng làm việc tốt nhất.</p>
                <h2 id="section2">2. Các dịch vụ Spa Laptop cung cấp</h2>
                    <p>Hiện tại Sửa chữa laptop 24h đang cấp 2 gói dịch vụ Spa Laptop bao gồm: Spa Laptop Cơ Bản và Spa Laptop Nâng Cao. Tùy theo từng dòng máy và nhu cầu vệ sinh bảo dưỡng, bạn hãy lựa chọn gói Spa Laptop phù hợp cho mình.</p>
                    <table style="border-collapse: collapse;">
                        <tr>
                            <th class="cangiua">Spa Laptop CƠ BẢN</th>
                            <th class="cangiua">Spa Laptop NÂNG CAO</th>
                        </tr>
                        <tr>
                            <td>Áp dụng với các dòng máy phổ thông</td>
                            <td>Áp dụng với các dòng máy: Laptop Gaming, MacBook và các đời máy cao cấp.</td>
                        </tr>
                        <tr>
                            <td>Sử dụng loại kem tản nhiệt chuyên dụng</td>
                            <td>Sử dụng loại kem tản nhiệt chuyên dụng cao cấp</td>
                        </tr>
                        <tr>
                            <td><b>Các dịch vụ cung cấp:</b><br>
                                Vệ sinh bề mặt laptop, tản nhiệt laptop<br>
                                Bảo dưỡng phần cứng: CPU, VGA, RAM, cổng kết nối, <br>
                                Bảo dưỡng bản lề
                            </td>
                            <td><b>Các dịch vụ cung cấp:</b><br>
                                Toàn bộ các dịch vụ của gói Spa Laptop cơ bản<br>
                                Kiểm tra đánh giá phần mềm, dọn rác, dọn bộ nhớ, quét diệt virus miễn phí
                            </td>
                        </tr>
                        <tr>
                            <td>Theo dõi trực tiếp toàn bộ quá trình<br>
                                Lấy ngay trong 1 giờ
                            </td>
                            <td>Theo dõi trực tiếp toàn bộ quá trình<br>
                                Lấy ngay trong 1 giờ<br>
                                Hỗ trợ ship 1 chiều nếu khách hàng để máy lại cơ sở.
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:center;"><b>Giá tham khảo</b>: 150.000VNĐ</td>
                            <td style="text-align:center;"><b>Giá tham khảo</b>: 250.000VNĐ</td>
                        </tr>
                    </table>
                    <p><b>Lưu ý: Chi phí trên áp dụng với dịch vụ Spa Laptop trực tiếp tại cơ sở, không áp dụng cho Dịch vụ Sửa Chữa Laptop Tại Nhà.</b></p>
                    <div style="text-align:center;">
                        <br><img src="https://lh4.googleusercontent.com/fQ3gucefE6Q3NK4PEyZqAz9tCDpq8gSmn886xnqoQguN1NnBkus2KFKlPDZc0QDzS29MxfYsmjCPhtWaeehJIAD2_ZbRlc4R5ai8xwaR2rbEvSEbLyjEdAIl1bhlJdGeGjyVP666Z9rGUvdo6gsOrQ8" width="750px" height="410px">
                        <p><em>Các dịch vụ Spa Laptop cung cấp tại Sửa chữa Laptop 24h</em></p>
                    </div>
                <h2 id="section3">3. Quy trình Spa Laptop tại Sửa chữa Laptop 24h</h2>
                    <p><b>Bước 1: Liên hệ</b><br>
                    <br>Khách hàng trực tiếp mang laptop tới cơ sở hoặc liên hệ 1800 6024 để được tư vấn về Dịch vụ Spa Laptop tại nhà.<br>
                    <br><b>Bước 2: Tiếp nhận</b><br>
                        <br>Kỹ thuật viên tiếp nhận laptop và lắng nghe tình trạng máy/mong muốn của khách hàng.<br>
                        <br><b>Bước 3: Kiểm tra tổng quát</b><br>
                        <br> Kỹ thuật viên tiến hành kiểm tra tình trạng máy, test các bộ phận và các lỗi có thể phát sinh.<br>
                        <br><b>Bước 4: Tiến hành vệ sinh bảo dưỡng laptop</b><br>
                        <br> Kỹ thuật viên tiến hành tháo máy và vệ sinh lần lượt các bộ phận từ trong ra ngoài. <br>
                        <br><b>Bước 5: Lắp lại máy và kiểm tra</b><br>
                        <br> Sau khi lắp ráp lại các bộ phận như ban đầu, kỹ thuật viên sẽ kiểm tra tổng quát lại các chức năng của máy, đảm bảo máy không gặp vấn đề gì trước khi bàn giao máy cho khách hàng.<br>
                        <br><b>Bước 6: Tư vấn bảo hành</b><br>
                        <br> Kỹ thuật viên tư vấn kỹ lưỡng cho khách hàng các nội dung về bảo hành và nhắc lại lịch Spa Laptop định kỳ.
                    </p>
                    <div style="text-align:center;">
                        <br><img src="https://suachualaptop24h.com/upload_images/images/2023/04/10/dich-vu-spa-laptop-ve-sinh-bao-duong-laptop-a1.jpg" width="750px" height="587px">
                        <p><em>Quy trình Spa Laptop tại Sửa chữa Laptop 24h</em></p>
                    </div>
                <h2 id="section4">4. Một số câu hỏi thường gặp</h2>
                    <br><p>Dưới đây hệ thống Sửa chữa Laptop 24h sẽ giải đáp một số câu hỏi thường gặp liên quan tới vấn đề vệ sinh bảo dưỡng laptop được đông đảo người dùng quan tâm:<br>
                        <br><b>Câu hỏi 1</b>: Bao lâu nên tới Spa Laptop 1 lần?<br>
                        <br><b>Trả lời</b>: Người dùng nên vệ sinh bảo dưỡng laptop định kỳ 3-6 tháng/lần.<br>
                        <br><b>Câu hỏi 2</b>: Dịch vụ Spa Laptop tốn bao nhiêu thời gian?<br>
                        <br><b>Trả lời</b>: Thời gian vệ sinh bảo dưỡng tại Sửa chữa Laptop 24h khoảng 30-45 phút.<br>
                        <br><b>Câu hỏi 3</b>: Có nên tự vệ sinh laptop thường xuyên?<br>
                        <br><b>Trả lời</b>: Có. Người dùng nên vệ sinh laptop thường xuyên để hạn chế tối đa bụi bẩn, mẩu thức ăn mắc kẹt lâu ngày trong laptop.<br>
                        <br><b>Câu hỏi 4</b>: Spa Laptop có làm mất bảo hành không?<br>
                        <br><b>Trả lời</b>: Thao tác tháo máy chắc chắn sẽ làm rách tem và mất bảo hành. Do đó, nếu laptop còn bảo hành, kỹ thuật sẽ chỉ vệ sinh các bộ phận bên ngoài để không ảnh hưởng đến bảo hành của khách.
                    </p>
                    <div style="text-align:center;">
                        <br><img src="https://lh3.googleusercontent.com/dmto8rj1G79dVJQmHePxwuIi_PYUWHO3JGn2u8t0CqXacEethlJUq-35Fyl2dCXb-8mkHflFh-sLl6KV2zLYSfW7VCrXlGiD-yFoefu-HsqKx_TVtSO0-1OudjCNQ3hHmjXbAK8q5UwyuSfx6n5tKYs" width="750px" height="500px">
                        <p><em>Spa Laptop uy tín chuyên nghiệp</em></p><br>
                    </div>
                    <p>Spa Laptop định kỳ là điều cần thiết để laptop luôn hoạt động mượt mà, ổn định và tối ưu hiệu suất. Đồng thời, điều này cũng giúp kéo dài tuổi thọ của các linh kiện bên trong laptop, giảm thiểu chi phí thay thế, sửa chữa trong tương lai.<br>

                        <br>Khách hàng cần sử dụng dịch vụ Spa Laptop vui lòng liên hệ <b>Hotline 1800 6024</b> để được hướng dẫn tới cơ sở gần nhất. Với đội ngũ kỹ thuật viên nhiệt tình, giàu kinh nghiệm, Sửa chữa Laptop 24h sẽ hỗ trợ khách hàng một cách nhanh chóng, hiệu quả nhất.
                    </p>
            </div>
        </div>
    </div>
</body>
</html>