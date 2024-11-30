<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';

    
    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'images/';
        
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
        $uploadPath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
            $image = $uploadPath;
        } else {
            $_SESSION['error'] = "Lỗi: Không thể tải lên hình ảnh.";
            header('Location: flowers_edit.php');
            exit();
        }
    }

    
    if (empty($name) || empty($description)) {
        $_SESSION['error'] = "Vui lòng nhập đầy đủ tên và mô tả hoa.";
        header('Location: flowers_edit.php');
        exit();
    }

    
    $stmt = $conn->prepare("INSERT INTO flowers (name, description, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $description, $image);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Thêm hoa thành công!";
    } else {
        $_SESSION['error'] = "Lỗi: " . $stmt->error;
    }

    $stmt->close();
    header('Location: index.php');
    exit();
} else {
    
    header('Location: index.php');
    exit();
}
?>