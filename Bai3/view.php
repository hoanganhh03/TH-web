<?php        // Phạm Trung Hiếu
include 'db.php'; 

$stmt = $conn->query("SELECT * FROM infomation ");
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Danh sách sinh viên </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center"> DANH SÁCH SINH VIÊN </h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Tên</th>
            <th>Email</th>
            <th>Mật khẩu</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if (count($questions) > 0) { 
            foreach ($questions as $row) {
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['password']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Không có dữ liệu</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
