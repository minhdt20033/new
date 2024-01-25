<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./baitaplon1.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
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
            <form class="d-flex" role="search" action="./timkiem.php" method="GET">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="tk">
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
        <table class="table table-bordered">
            <tr>
                <th>Tên sản phẩm</th>
                <th>Loại</th>
                <th>Giá Tiền</th>
                <th>Số lượng</th>
                <th>Thêm</th>
                <th>Xóa</th>
            </tr>
    <?php
        $sol =  0;
        $tongtien = 0;
        $mand = $_GET["mand"];
        $sql = $con->prepare("select * from giohang where MaND = ?");
        $sql->bind_param("s", $mand);
        $sql->execute();
        $kq = $sql->get_result();
        if($kq->num_rows > 0){
            while($row = $kq->fetch_assoc()){
                $sol = $row["SoL"];
                $sql2 = $con->prepare("select * from linhkien where MaLK = ?");
                $sql2->bind_param("s", $row["MaLK"]);
                $sql2->execute();
                $kq2 = $sql2->get_result();
                if($kq2->num_rows > 0){
                    $row2 = $kq2->fetch_assoc();
                    $tongtien += $row2["GiaTien"] * $sol;
    ?>
            <tr>
                <th><?php echo $row2["TenLK"] ?></th>
                <th><?php echo $row2["Loai"] ?></th>
                <th><?php echo number_format($row2["GiaTien"],0,',','.') ?>đ</th>
                <th><?php echo $row["SoL"] ?></th>
                <th><a href="./themsol.php?mand=<?php echo $mand ?>&malk=<?php echo $row2["MaLK"] ?>&sol=<?php echo $row["SoL"] ?>"><button class="btn btn-warning">Thêm</button></a></th>
                <th><a href="./trusol.php?mand=<?php echo $mand ?>&malk=<?php echo $row2["MaLK"] ?>&sol=<?php echo $row["SoL"] ?>"><button class="btn btn-danger">Xóa</button></a></th>
            </tr>
    <?php
                }
            }
        }
    ?>
        </table>
        <p class="text-xxl-end fs-4 fw-bold">Tổng tiền: <?php echo number_format($tongtien,0,',','.') ?>đ</p>
        <form class="d-flex" style="width: 30%;">
            <label for="">Hình thức thanh toán</label>
            <select class="form-select" aria-label="Default select example">
                <option value="">Chuyển khoản</option>
                <option selected value="">Thanh toán khi nhận hàng</option>
                <option value="">Thanh toán qua thẻ Visa, Master,...</option>
            </select>
        </form>
        <a href="./themhoadontmp.php?mand=<?php echo $mand ?>"><button class="btn btn-success btn-lg" id="btndh" style="margin-top: 20px;">Đặt hàng</button></a>
    </div>
    <script>
        $(document).ready(function(){
            $("#btndh").click(function(){
                alert("Đặt hàng thành công!");
            });
        });
    </script>
</body>
</html>