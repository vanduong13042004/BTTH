<?php
require 'db.php'; 
?>
<?php
require 'db.php';


$sql = "SELECT * FROM flowers";
$result = $conn->query($sql);


$flowers = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $flowers[] = $row;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = $_POST['name']; 
    $description = $_POST['description']; 
    $image = 'images/' . $_POST['image']; 

    
    $sql = "INSERT INTO flowers (name, description, image) VALUES ('$name', '$description', '$image')";

    
    if ($conn->query($sql) === TRUE) {
        echo "Thêm hoa thành công!";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}




