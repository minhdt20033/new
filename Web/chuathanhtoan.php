<?php 
    $servername = "localhost:3306";
    $username = "namkks";
    $userpass = "Namkks203";
    $database = "chamsocmaytinh";
    $con = new mysqli($servername,$username,$userpass,$database);
    if($con->connect_error){
        die("Kết nối thất bại". $con->connect_error);
    }else{
        $mahdt = $_GET["mahdt"];
            $sql2 = $con->prepare("delete from chitiethoadontamthoi where MaHDT = ?");
            $sql2->bind_param("s", $mahdt);
            $sql2->execute();

            $sql2 = $con->prepare("delete from hoadontamthoi where MaHDT = ?");
            $sql2->bind_param("s", $mahdt);
            $sql2->execute();
        header("location: listhoadontmp.php");
    }
?>