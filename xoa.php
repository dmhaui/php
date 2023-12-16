<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xoá thông tin sinh viên</title>
</head>
<body>
<?php
    $kn = mysqli_connect('localhost', 'root', 'root','thuchanh');
    if (!$kn) {
        echo 'Kết nối thất bại';
    }

    if($_GET['masv']){
        $masv = $_GET['masv'];

        $sql = "DELETE FROM sinhvien WHERE masv = '$masv'";
        $kq = mysqli_query($kn, $sql);

        if (!$kq) {
            echo'<script>
            alert("Lỗi khi xoá thông tin sinh viên");
            window.location.href = "tinh2.php";
        </script>';
        } else {            echo'<script>
            alert("Xoá thông tin sinh viên thành công");
            window.location.href = "tinh2.php";
        </script>';}

    }else { echo "<p>Không lấy được mã sinh viên bên kia</p>";}
 
?>

</body>
</html>
