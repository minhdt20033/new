<?php
    $servername = "localhost:3306";
    $username = "namkks";
    $userpass = "Namkks203";
    $database = "chamsocmaytinh";
    $con = new mysqli($servername,$username,$userpass,$database);
    if($con->connect_error){
        die("Kết nối thất bại". $con->connect_error);
    }else{
        $malh = $_GET["malh"];
        $sql = $con->prepare("UPDATE `lichhen` SET `TinhTrang`= -1 WHERE MaLH = ?");
        $sql->bind_param("s",$malh);
        $sql->execute();

        header("location: listlinhkien.php");
    }
?>