<?php
    $servername = "localhost:3306";
    $username = "namkks";
    $userpass = "Namkks203";
    $database = "chamsocmaytinh";
    $con = new mysqli($servername,$username,$userpass,$database);
    if($con->connect_error){
        die("Kết nối thất bại". $con->connect_error);
    }else{
        $user = $_POST["user"];
        $pass = $_POST["pass"];
        $pass2 = $_POST["pass2"];
        try{
            $sql = $con->prepare("UPDATE `nguoidung` SET `MatKhau`= ? WHERE Tentk = ? AND MatKhau = ?");
            $sql->bind_param("sss",$pass2,$user,$pass);
            $sql->execute();
            echo "Thay đổi mật khẩu thành công";

        }catch(Exception $e){
            echo "Thông tin không chính xác, vui lòng kiểm tra lại!";
        }

    }
?>