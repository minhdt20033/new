<?php
    $servername = "localhost:3306";
    $username = "namkks";
    $userpass = "Namkks203";
    $database = "chamsocmaytinh";
    $con = new mysqli($servername,$username,$userpass,$database);
    if($con->connect_error){
        die("Kết nối thất bại". $con->connect_error);
    }else{
        $tenlk = $_POST["tenlk"];
        $loai = $_POST["loai"];
        $giatien = $_POST["giatien"];
        $anh = $_POST["anh"];
        $pathAnh = "./Anh/$anh";
        $sql = $con->prepare("INSERT INTO `linhkien`(`TenLK`, `Loai`, `GiaTien`, `Anh`) VALUES (?, ?, ?, ?)");
        $sql->bind_param("ssss",$tenlk,$loai, $giatien, $pathAnh);
        $sql->execute();

        echo "Thêm thành công!";
    }
?>