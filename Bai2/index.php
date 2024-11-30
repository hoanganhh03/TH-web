<?php
include 'db.php';

$stmt = $conn->query("SELECT * FROM questions");
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài kiểm tra trắc nghiệm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f4f4f9;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .question {
            margin-bottom: 20px;
            padding: 10px;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .question h3 {
            margin: 0 0 10px;
        }
        .answer {
            margin: 5px 0;
        }
    </style>
</head>
<body>

<h1>Bài kiểm tra trắc nghiệm</h1>

<?php
$file_path = "Quiz.txt";
if (file_exists($file_path)) {
    $content = file_get_contents($file_path);
    $questions = explode("ANSWER:", $content);

    foreach ($questions as $key => $questionBlock) {
        if (trim($questionBlock) == '') continue;
        $parts = explode("\n", trim($questionBlock));
        $questionText = array_shift($parts);
        $answers = $parts;

        echo "<div class='question'>";
        echo "<h3>Câu " . ($key + 1) . ": $questionText</h3>";
        foreach ($answers as $answer) {
            if (stripos($answer, "ANSWER:") === false) {
                echo "<div class='answer'><input type='radio' name='q$key'> $answer</div>";
            }
        }
        echo "</div>";
    }
} else {
    echo "<p>Không tìm thấy file Quiz.txt!</p>";
}
?>

</body>
</html>
