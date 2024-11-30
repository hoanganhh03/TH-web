<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <title>Upload Quiz File</title>
</head>
<body class="container mt-5">
    <h1 class="mb-4">Upload File Câu Hỏi</h1>
    <form method="post" enctype="multipart/form-data" action="process_file.php">
        <div class="mb-3">
            <label for="file" class="form-label">Chọn tệp câu hỏi:</label>
            <input type="file" name="file" id="file" class="form-control" required>
        </div>
        <button type="submit" name="upload" class="btn btn-primary">Tải lên</button>
    </form>
</body>
</html>
