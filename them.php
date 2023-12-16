<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên</title>
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
    <form action="" method="POST" id="addForm">
        <h1>Thêm Sinh Viên</h1>
        <table>
            <tr>
                <th>Mã sinh viên:</th>
                <td><input type="number" name="masv" required placeholder="Nhập mã sinh viên"></td>
            </tr>
            <tr>
                <th>Họ tên:</th>
                <td><input type="text" name="hoten" required placeholder="Nhập họ tên"></td>
            </tr>
            <tr>
                <th>Điểm toán:</th>
                <td><input type="number" name="toan" required placeholder="Nhập điểm toán" min="0" max="10"></td>
            </tr>
            <tr>
                <th>Điểm lý:</th>
                <td><input type="number" name="ly" required placeholder="Nhập điểm lý" min="0" max="10"></td>
            </tr>
            <tr>
                <th>Điểm hoá:</th>
                <td><input type="number" name="hoa" required placeholder="Nhập điểm hoá" min="0" max="10"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" name="them" value="Thêm"></td>
            </tr>
        </table>
    </form>


    <?php
    if(isset($_POST['them'])){
        $masv = $_POST['masv'];
        $hoten = $_POST['hoten'];
        $toan = $_POST['toan'];
        $ly = $_POST['ly'];
        $hoa = $_POST['hoa'];

        $kn = mysqli_connect('localhost', 'root', 'root','thuchanh');
        if (!$kn) {
            echo 'Kết nối thất bại: '. mysqli_connect_error()."\n\n";;
        }

        $sql = "INSERT INTO sinhvien VALUES ('$masv','$hoten','$toan','$ly','$hoa')";
        $kq = mysqli_query($kn, $sql);
        if (!$kq) {echo "Lỗi khi thêm sinh viên";}
        else{
            echo'<script>
            alert("Thêm sinh viên thành công");
            window.location.href = "tinh2.php";
        </script>';
        }
        mysqli_close($kn);      
    }
    ?>
</body>
</html>
