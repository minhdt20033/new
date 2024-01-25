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
      
            $sql2 = $con->prepare("INSERT INTO hoadontamthoi (MaND) VALUES (?)");
            $sql2->bind_param("s", $mand);
            $sql2->execute();

            $sql3 = $con->prepare("select * from hoadontamthoi order by MaHDT desc limit 1");
            $sql3->execute();
            $kqtmp = $sql3->get_result();
            $rowtmp = $kqtmp->fetch_assoc();
            $mahdt = $rowtmp["MaHDT"];
            
                $sql2 = $con->prepare("INSERT INTO chitiethoadontamthoi VALUES (?, ?, 1)");
                $sql2->bind_param("ss", $mahdt, $malk);
                $sql2->execute();
            
        
       
        header("location:ttram.php?malk=$malk");
    }
?>