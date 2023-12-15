<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bảng với Tiêu đề Cột</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      text-align: center;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
<h1 align="center">ĐIỂM TỔNG KẾT CỦA SINH VIÊN</h1>
<?php
    $kn = mysqli_connect('localhost', 'it6020003_minhdn', '123456','thuchanh');
    if (!$kn) {
        echo 'Kết nối thất bại';
    }

    $sql = 'select * from sinhvien';
    $kq = mysqli_query($kn, $sql);

    if (!$kq) {
        echo 'Lỗi truy vấn';
    }

    echo '<table>';
    echo '<tr>';
    echo '<th>Mã sinh viên</th>';
    echo '<th>Tên sinh viên</th>';
    echo '<th>Toán</th>';
    echo '<th>Lý</th>';
    echo '<th>Hoá</th>';
    echo '<th>Tổng điểm</th>';
    echo '<th>Kết quả</th>';
    echo '<th>Thực hiện</th>';
    echo '</tr>';

    while ($row = mysqli_fetch_row($kq)){
        $masv = $row[0];
        $hoten = $row[1];
        $toan = $row[2];
        $ly = $row[3];
        $hoa = $row[4];
        $tongdiem = $toan * 2 + $ly + $hoa;

        if ($tongdiem > 20){
            $a = 'Được lên lớp';
        } else {
            $a = 'Ở lại lớp';
        }

        echo '<tr>';
        echo "<td>$masv</td>";
        echo "<td>$hoten</td>";
        echo "<td>$toan</td>";
        echo "<td>$ly</td>";
        echo "<td>$hoa</td>";
        echo "<td>$tongdiem</td>";
        echo "<td>$a</td>";
        echo "<td><a href='them.php'>Thêm</a> | <a href='sua.php?masv=$masv'>Sửa</a> | <a href='xoa.php?masv=$masv'>Xoá</a> | <a href='timkiem.php'>Tìm kiếm</a></td>";
        echo '</tr>';
    }
    echo '</table>';
?>

</body>
</html>