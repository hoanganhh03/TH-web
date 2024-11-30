<?php
include 'db.php';    // Phạm Trung Hiếu

$stmt = $conn->query("SELECT id, correct_answer FROM questions");
$answers = $stmt->fetchAll(PDO::FETCH_ASSOC);

$score = 0;
foreach ($answers as $answer) {
    $questionId = $answer['id'];
    if (isset($_POST["question_$questionId"]) && $_POST["question_$questionId"] === $answer['correct_answer']) {
        $score++;
    }
}

$totalQuestions = count($answers);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Kết quả</title>
</head>
<body>
<div class="container mt-5">
    <div class="alert alert-success text-center">
        Bạn trả lời đúng <strong><?= $score ?></strong> / <strong><?= $totalQuestions ?></strong> câu.
        </div>
    <div class="d-flex justify-content-center">
        <a href="index.php" class="btn btn-primary">Làm lại</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
