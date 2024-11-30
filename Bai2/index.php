<?php
include 'db.php';  // Phạm Trung Hiếu

$stmt = $conn->query("SELECT * FROM questions");
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Bài kiểm tra trắc nghiệm</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Bài kiểm tra trắc nghiệm</h1>
    <form action="submit.php" method="POST">
        <?php foreach ($questions as $index => $question): ?>
            <div class="card mb-4">
                <div class="card-header"><strong>Câu <?= $index + 1 ?>: <?= $question['question'] ?></strong></div>
                <div class="card-body">
                    <?php foreach (['a', 'b', 'c', 'd'] as $option): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="question_<?= $question['id'] ?>" value="<?= strtoupper($option) ?>" id="q<?= $question['id'] . $option ?>">
                            <label class="form-check-label" for="q<?= $question['id'] . $option ?>">
                                <?= $question["option_$option"] ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary">Nộp bài</button>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
