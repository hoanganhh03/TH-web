<?php
// Mảng chứa dữ liệu sản phẩm
$products = [
    ["name" => "Sản phẩm 1", "price" => 1000],
    ["name" => "Sản phẩm 2", "price" => 2000],
    ["name" => "Sản phẩm 3", "price" => 3000],
];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Admin</title>
    <!-- Liên kết tới file CSS -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<!-- Thanh menu -->
<div class="menu">
    <a href="#">Trang chủ</a>
    <a href="#">Trang ngoài</a>
    <a href="#">Thể loại</a>
    <a href="#">Tác giả</a>
    <a href="#">Bài viết</a>
</div>


<div class="content">
    <h2>Danh sách sản phẩm</h2>
    <table>
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Giá thành</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                    <td><?php echo number_format($product['price'], 0, ',', '.'); ?> VND</td>
                    <td>
                        <a href="edit.php?id=<?php echo urlencode($product['name']); ?>" class="action-btn">Sửa</a>
                    </td>
                    <td>
                        <a href="delete.php?id=<?php echo urlencode($product['name']); ?>" class="action-btn delete-btn">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Footer -->
<div class="footer">
    2023 Trang Sản Phẩm
</div>

</body>
</html>
