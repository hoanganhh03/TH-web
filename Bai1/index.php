<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Hoa</title>

</head>
<body>
    <div class="container py-5">
        <h1 class="text-center mb-4">Danh Sách Các Loài Hoa</h1>
        <div class="list-group">
            <?php
            $flowers = [
                ["name" => "Hoa Đỗ Quyên", "image" => "./image/doquyen.jpg"],
                ["name" => "Hoa Hải Đường", "image" => "./image/haiduong.jpg"],
                ["name" => "Hoa Mai", "image" => "./image/mai.jpg"],
                ["name" => "Hoa Tường Vy", "image" => "./image/tuongvy.jpg"]
            ];
            foreach ($flowers as $flower): ?>
                <div class="list-group-item text-center">
                    <h5 class="mb-3"><?= $flower['name'] ?></h5>
                    <img src="<?= $flower['image'] ?>" alt="<?= $flower['name'] ?>" class="img-fluid rounded" style="max-width: 200px;">
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>
