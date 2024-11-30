<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

    if ($id > 0) {
        
        $stmt = $conn->prepare("DELETE FROM flowers WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            
            $_SESSION['message'] = "Xóa hoa thành công!";
        } else {
            
            $_SESSION['error'] = "Lỗi: Không thể xóa hoa. " . $conn->error;
        }

        $stmt->close();
    } else {
        
        $_SESSION['error'] = "ID không hợp lệ!";
    }

    header('Location: index.php');
    exit();
} else {
    
    header('Location: index.php');
    exit();
}
?>