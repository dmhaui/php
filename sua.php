<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sửa thông tin sinh viên</title>
  <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            width: 50%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<?php
    $kn = mysqli_connect('localhost', 'it6020003_minhdn', '123456','thuchanh');
    if (!$kn) {
        echo 'Kết nối thất bại';
    }

    if(isset($_GET['masv'])){
        $masv = $_GET['masv'];

        $sql = "SELECT * FROM sinhvien WHERE masv = '$masv'";
        $kq = mysqli_query($kn, $sql);

        if (!$kq) {
            echo 'Lỗi truy vấn';
        }
        
        $row = mysqli_fetch_array($kq);
        $hoten = $row['hoten'];
        $toan = $row['toan'];
        $ly = $row['ly'];
        $hoa = $row['hoa'];
    }else { echo "<p>Không lấy được mã sinh viên bên kia</p>";}

    if(isset($_POST['submit'])){
        $masv = $_POST['masv'];
        $hoten = $_POST['hoten'];
        $toan = $_POST['toan'];
        $ly = $_POST['ly'];
        $hoa = $_POST['hoa'];

        $sql = "UPDATE sinhvien SET hoten = '$hoten', toan = '$toan', ly = '$ly', hoa = '$hoa' WHERE masv = '$masv'";
        $kq = mysqli_query($kn, $sql);

        if($kq){
            echo'<script>
            alert("Sửa thông tin sinh viên thành công");
            window.location.href = "tinh2.php";
        </script>';
        } else {
            echo'<script>
            alert("Lỗi khi sửa thông tin sinh viên");
            
        </script>';
        }
    }
?>

<form method="POST">
    <h1>Sửa thông tin sinh viên</h1>
    <label for="masv">Mã sinh viên:</label>
    <input type="text" name="masv" value="<?php echo $masv; ?>" readonly><br><br>
    <label for="hoten">Họ tên:</label>
    <input type="text" name="hoten" value="<?php echo $hoten; ?>" readonly><br><br>
    <label for="toan">Điểm Toán:</label>
    <input type="text" name="toan" value="<?php echo $toan; ?>" require><br><br>
    <label for="ly">Điểm Lý:</label>
    <input type="text" name="ly" value="<?php echo $ly; ?>" require><br><br>
    <label for="hoa">Điểm Hóa:</label>
    <input type="text" name="hoa" value="<?php echo $hoa; ?>" require><br><br>
    <input type="submit" name="submit" value="Lưu">
</form>
</body>
</html>
