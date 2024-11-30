<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload file CSV</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Upload file CSV</h1>
    <form method="POST" enctype="multipart/form-data"> 
        <div class="mb-3">
            <label for="csvFile" class="form-label">Chọn file CSV:</label>
            <input type="file" class="form-control" id="csvFile" name="csvFile" accept=".csv" required>  
        </div>
        <button type="submit" class="btn btn-primary"> Upload </button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES['csvFile']) && $_FILES['csvFile']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['csvFile']['tmp_name'];

            // Đọc và kiểm tra nội dung file CSV
            if (($handle = fopen($file, "r")) !== false) {
                echo "<h2 class='mt-4'>Nội dung file CSV:</h2>";
                echo "<table class='table table-bordered'>";
                echo "<thead><tr><th>Tên</th><th>Email</th><th>Mật khẩu</th></tr></thead>"; 
                echo "<tbody>";

                $isHeader = true; // Bỏ qua dòng tiêu đề nếu có
                while (($row = fgetcsv($handle, 1000, ",")) !== false) {
                    if ($isHeader) {
                        $isHeader = false;
                        continue;
                    }

                    if (count($row) !== 3) {
                        echo "<tr><td colspan='3'>Dòng không hợp lệ: " . implode(",", $row) . "</td></tr>";
                        continue;
                    }

                    echo "<tr>
                            <td>" . htmlspecialchars($row[0]) . "</td>
                            <td>" . htmlspecialchars($row[1]) . "</td>
                            <td>" . htmlspecialchars($row[2]) . "</td>
                          </tr>";
                }

                echo "</tbody></table>";
                fclose($handle);
            } else {
                echo "<div class='alert alert-danger'>Không thể mở file CSV.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Lỗi tải lên file CSV.</div>";
        }
    }
    ?>
</div>
</body>
</html> 
