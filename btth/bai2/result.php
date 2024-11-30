<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Quả Bài Trắc Nghiệm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Kết Quả Bài Trắc Nghiệm</h1>

    <?php
    require 'db_connection.php';

    $sql = "SELECT * FROM questions";
    $result = $conn->query($sql);

    $score = 0;
    $index = 1;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $correct_ans = strtolower($row['correct_ans']);
            if (isset($_POST["question{$index}"]) && $_POST["question{$index}"] === $correct_ans) {
                $score++;
            }
            $index++;
        }

        echo "<div class='alert alert-success text-center'>";
        echo "Bạn trả lời đúng <strong>$score</strong>/" . ($index - 1) . " câu.";
        echo "</div>";
    }

    $conn->close();
    ?>

    <div class="text-center">
        <a href="index.php" class="btn btn-primary">Làm lại</a>
    </div>
</div>
</body>
</html>
