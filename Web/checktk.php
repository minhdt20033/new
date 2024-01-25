<?php
    $servername = "localhost:3306";
    $username = "namkks";
    $userpass = "Namkks203";
    $database = "chamsocmaytinh";
    $con = new mysqli($servername,$username,$userpass,$database);

    $kq = false;
    if($con->connect_error){
        die("Kết nối thất bại". $con->connect_error);
    }else{
        $tk = $_POST["taikhoan"];
        $mk = $_POST["matkhau"];

        $sql = $con->prepare("select * from nhanvien where TaiKhoan = ? and MatKhau = ?");
        $sql->bind_param("ss", $tk, $mk);

        $sql->execute();
        $ketqua = $sql->get_result();
        if($ketqua->num_rows > 0){
            $kq = true;
        }
    }
?>