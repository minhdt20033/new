<?php
    $servername = "localhost:3306";
    $username = "namkks";
    $userpass = "Namkks203";
    $database = "chamsocmaytinh";
    $con = new mysqli($servername,$username,$userpass,$database);
    if($con->connect_error){
        die("Kết nối thất bại". $con->connect_error);
    }else{
        $madv = $_GET["madv"];
        $mand = $_GET["mand"];
        $sql = $con->prepare("INSERT INTO `hoadondichvu`(`MaDV`, `MaND`) VALUES (?,?)");
        $sql->bind_param("ss",$madv, $mand);
        $sql->execute();

        header("location: listlichhen.php");
    }
?>