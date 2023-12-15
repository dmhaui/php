<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm sinh viên</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            width: 100%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-grid;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            display: flex;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="text"] {
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
            margin-top: 5px;
        }

        button[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 5px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>
        <div>
    <form action="" method="POST">
        <h1>Tìm kiếm sinh viên</h1>
        <label for="masv">Nhập mã sinh viên:</label>
        <input type="text" name="masv" required placeholder="Nhập mã sinh viên">
        <input type="submit" name="timkiem" value="Tìm kiếm">
        
    </form>
    <button type="submit" name="" value="Trở về" ><a href="tinh2.php" style="color: white;">Trở về</a></button>

    <?php
    if(isset($_POST['timkiem'])){
        $masv = $_POST['masv'];

        $kn = mysqli_connect('localhost','it6020003_minhdn','123456','thuchanh');
        if(!$kn){echo 'Kết nối thất bại';}

        $sql = "SELECT * FROM sinhvien WHERE masv = '$masv'";
        $kq = mysqli_query($kn, $sql);

        if (!$kq) {
            echo "Lỗi khi thực hiện truy vấn";
        } else {
            if (mysqli_num_rows($kq) > 0) {
                echo '<table>';
                echo '<tr>';
                echo '<th>Mã sinh viên</th>';
                echo '<th>Họ tên</th>';
                echo '<th>Điểm toán</th>';
                echo '<th>Điểm lý</th>';
                echo '<th>Điểm hoá</th>';
                echo '</tr>';

                while ($row = mysqli_fetch_assoc($kq)) {
                    echo '<tr>';
                    echo '<td>' . $row['masv'] . '</td>';
                    echo '<td>' . $row['hoten'] . '</td>';
                    echo '<td>' . $row['toan'] . '</td>';
                    echo '<td>' . $row['ly'] . '</td>';
                    echo '<td>' . $row['hoa'] . '</td>';
                    echo '</tr>';
                }

                echo '</table>';
            } else {
                echo "Không tìm thấy sinh viên có mã $masv";
            }
        }

        mysqli_close($kn);
    }
    ?>
   </div>
</body>
</html>
