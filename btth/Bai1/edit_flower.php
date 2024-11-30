<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';

    
    if ($id <= 0 || empty($name) || empty($description)) {
        $_SESSION['error'] = "Vui lòng nhập đầy đủ thông tin.";
        header('Location: index.php');
        exit();
    }

    
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
            header('Location: index.php');
            exit();
        }
    }

    
    if (!empty($image)) {
        
        $stmt = $conn->prepare("UPDATE flowers SET name = ?, description = ?, image = ? WHERE id = ?");
        $stmt->bind_param("sssi", $name, $description, $image, $id);
    } else {
        
        $stmt = $conn->prepare("UPDATE flowers SET name = ?, description = ? WHERE id = ?");
        $stmt->bind_param("ssi", $name, $description, $id);
    }

    
    if ($stmt->execute()) {
        $_SESSION['message'] = "Sửa hoa thành công!";
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