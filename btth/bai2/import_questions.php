<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once 'db_connection.php';


$filename = 'questions.txt';


if (!file_exists($filename)) {
    die("Không tìm thấy file câu hỏi: $filename");
}


$content = file_get_contents($filename);


if (empty($content)) {
    die("File câu hỏi trống.");
}


$conn->autocommit(FALSE);

try {
    
    $conn->query("TRUNCATE TABLE questions");

    
    $questions = preg_split('/Câu \d+:/', $content, -1, PREG_SPLIT_NO_EMPTY);

    
    $stmt = $conn->prepare("INSERT INTO questions (question, answer_a, answer_b, answer_c, answer_d, correct_ans) VALUES (?, ?, ?, ?, ?, ?)");

    $success_count = 0;
    $error_count = 0;

    
    foreach ($questions as $question_block) {
        
        $question_block = trim($question_block);
        
        
        if (empty($question_block)) continue;

       
        $lines = explode("\n", $question_block);
        
        
        if (count($lines) < 6) {
            $error_count++;
            continue;
        }

        
        $question = trim($lines[0]);
        $answer_a = trim(substr($lines[1], 3));
        $answer_b = trim(substr($lines[2], 3));
        $answer_c = trim(substr($lines[3], 3));
        $answer_d = trim(substr($lines[4], 3));
        
        
        $correct_ans = strtolower(trim(substr($lines[5], -1)));

        
        $stmt->bind_param("ssssss", $question, $answer_a, $answer_b, $answer_c, $answer_d, $correct_ans);

        
        if ($stmt->execute()) {
            $success_count++;
        } else {
            $error_count++;
        }
    }

    
    $stmt->close();

    
    $conn->commit();

    
    echo "Nhập câu hỏi thành công:\n";
    echo "- Tổng số câu: " . ($success_count + $error_count) . "\n";
    echo "- Câu nhập thành công: $success_count\n";
    echo "- Câu bị lỗi: $error_count\n";

} catch (Exception $e) {
    
    $conn->rollback();
    echo "Lỗi: " . $e->getMessage();
} finally {
    
    $conn->close();
}
?>