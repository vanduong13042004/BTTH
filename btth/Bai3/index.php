<?php
include "db.php";
$sql = "SELECT * FROM accounts";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/icon/themify-icons.css">
    <style>
    .bg-light {
      background-image: linear-gradient(120deg, #1d4a69 0%, #90f99e 100%);
    }
    </style>
</head>
<body>
    <div class="container mt-5">
        <header class="bg-light p-3 mb-4">
            <nav class="nav d-flex justify-content-center">
                <a class="nav-link fs-1 fw-bold text-center" style=" color:white;" href="#"> DANH SÁCH SINH VIÊN</a>
            </nav>
        </header>
        <table class="table table-bordered table-striped">
            <thead class="table">
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Họ</th>
                    <th>Tên</th>
                    <th>Thành phố</th>
                    <th>Email</th>
                    <th>Khóa học</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['username']}</td>";
                        echo "<td>{$row['password']}</td>";
                        echo "<td>{$row['lastname']}</td>";
                        echo "<td>{$row['firstname']}</td>";
                        echo "<td>{$row['city']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['course_id']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>Không có dữ liệu</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>