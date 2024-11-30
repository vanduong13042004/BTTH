<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Trắc Nghiệm Android</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f6f9; }
        .quiz-container { max-width: 800px; margin: 2rem auto; }
    </style>
</head>
<body>
<div class="container quiz-container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h1 class="mb-0">Bài Trắc Nghiệm Kiến Thức Android</h1>
        </div>
        <div class="card-body">
            <?php
            require_once 'db_connection.php';

            
            $count_query = "SELECT COUNT(*) as total FROM questions";
            $count_result = $conn->query($count_query);
            $count_row = $count_result->fetch_assoc();
            $total_questions = $count_row['total'];

            if ($total_questions > 0) {
               
                ?>
                <form method="post" action="result.php">
                    <?php
                    $sql = "SELECT * FROM questions ORDER BY RAND()";
                    $result = $conn->query($sql);

                    $index = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='card mb-3'>";
                        echo "<div class='card-header bg-light'><strong>Câu {$index}: {$row['question']}</strong></div>";
                        echo "<div class='card-body'>";

                        foreach (['a', 'b', 'c', 'd'] as $letter) {
                            $answer = $row["answer_$letter"];
                            echo "<div class='form-check'>";
                            echo "<input class='form-check-input' type='radio' name='question{$index}' value='{$letter}' id='question{$index}{$letter}' required>";
                            echo "<label class='form-check-label' for='question{$index}{$letter}'>$answer</label>";
                            echo "</div>";
                        }

                        echo "</div>";
                        echo "</div>";
                        $index++;
                    }

                    $conn->close();
                    ?>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Nộp bài</button>
                    </div>
                </form>
                <?php
            } else {
                echo "<div class='alert alert-warning text-center'>";
                echo "Không có câu hỏi nào trong cơ sở dữ liệu. Vui lòng nhập câu hỏi trước.";
                echo "</div>";
                echo "<div class='text-center'>";
                echo "<a href='import_questions.php' class='btn btn-primary'>Nhập câu hỏi</a>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>