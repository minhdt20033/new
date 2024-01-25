<?php
    $servername = "localhost:3306";
    $username = "namkks";
    $userpass = "Namkks203";
    $database = "chamsocmaytinh";
    $con = new mysqli($servername,$username,$userpass,$database);
    if($con->connect_error){
        die("Kết nối thất bại". $con->connect_error);
    }else{
        $mand = $_GET["mand"];
        $malk = $_GET["malk"];
        $sol = $_GET["sol"];
        $sol+= 1;
        $sql = $con->prepare("UPDATE giohang SET SoL=? WHERE MaND = ? and MaLK = ?");
        $sql->bind_param("iss",$sol,$mand, $malk);
        $sql->execute();
        header("location:giohang.php?mand=$mand");
    }

    
?>