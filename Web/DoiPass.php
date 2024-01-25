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
    <div class = "container" >
        <form action="">
            <div class = "form-group">
                <label for="">Tài Khoản</label>
                <input class = "form-control" id = "tk" type="text">
            </div>
            <div class = "form-group">
                <label for="">Mật khẩu hiện tại</label>
                <input class = "form-control" id = "mk1" type="text">
            </div>
            <div class = "form-group">
                <label for="">Mật khẩu mới</label>
                <input class = "form-control" id = "mk2" type="text">
            </div>
            <button class = "btn btn-warning" id = "btn-ChPass">Đặt lại mật khẩu</button>
        </form>
    </div>
    <script>
        $(document).ready(function(){
            $("#btn-ChPass").click(function(){
                $.ajax({
                    url: "DoiPass2.php",
                    type: "post",
                    datatype: "html",
                    data: {
                        user: $("#tk").val(),
                        pass: $("#mk1").val(),
                        pass2: $("#mk2").val()
                    }
                }).done(function(x){
                    alert(x);
                });

            });
        });
    </script>
</body>
</html>