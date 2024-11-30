<?php
require 'db.php'; 
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Danh sách hoa - Quản lý và chỉnh sửa thông tin hoa">
    <meta name="keywords" content="hoa, danh sách hoa, quản lý hoa">
    <title>Danh sách hoa</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="custom.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="header">
                <button type="button" class="btn btn-success" id="addButton">Thêm</button>
            </div>
        </div>
    </nav>

    
    <div id="addFlowerForm" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px; border: 1px solid #ccc; z-index: 1000; width: 400px;">
        <h3>Thêm Hoa</h3>
        <form method="POST" action="add_flower.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="flowerName" class="form-label">Tên Hoa</label>
                <input type="text" class="form-control" id="flowerName" name='name' required>
            </div>
            <div class="mb-3">
                <label for="flowerDescription" class="form-label">Mô Tả</label>
                <input type="text" class="form-control" id="flowerDescription" name='description' required>
            </div>
            <div class="mb-3">
                <label for="flowerImage" class="form-label">Ảnh</label>
                <input type="file" class="form-control" id="flowerImage" name='image' accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
            <button type="button" class="btn btn-secondary" id="cancelAddButton">Hủy</button>
        </form>
    </div>

    
    <div id="editFlowerForm" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px; border: 1px solid #ccc; z-index: 1000; width: 400px;">
        <h3>Sửa Hoa</h3>
        <form method="POST" action="edit_flower.php" enctype="multipart/form-data">
            <input type="hidden" id="flowerId" name="id">
            <div class="mb-3">
                <label for="editFlowerName" class="form-label">Tên Hoa</label>
                <input type="text" class="form-control" id="editFlowerName" name="name" required>
            </div>
            <div class="mb-3">
                <label for="editFlowerDescription" class="form-label">Mô Tả</label>
                <input type="text" class="form-control" id="editFlowerDescription" name="description" required>
            </div>
            <div class="mb-3">
                <label for="editFlowerImage" class="form-label">Ảnh</label>
                <input type="file" class="form-control" id="editFlowerImage" name="image" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
            <button type="button" class="btn btn-secondary" id="cancelEditButton">Hủy</button>
        </form>
    </div>

    <script>
        
        document.getElementById('addButton').addEventListener('click', function() {
            document.getElementById('addFlowerForm').style.display = 'block';
            document.getElementById('editFlowerForm').style.display = 'none';
        });

        
        document.getElementById('cancelAddButton').addEventListener('click', function() {
            document.getElementById('addFlowerForm').style.display = 'none';
        });

        
        document.getElementById('cancelEditButton').addEventListener('click', function() {
            document.getElementById('editFlowerForm').style.display = 'none';
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>