<?php 
session_start();
include 'header.php'; 
?>

<body>
    <?php include 'flowers.php'; ?>
    
    
    <?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $_SESSION['error'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
    
    <div class="container pt-5 pb-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tên hoa</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody id="flower-table">
    <?php foreach ($flowers as $key => $flower): ?>
        <tr id="row-<?= $flower['id'] ?>">
            <td class="name"><?= htmlspecialchars($flower['name']) ?></td>
            <td class="description"><?= htmlspecialchars($flower['description']) ?></td>
            <td>
                <?php if (!empty($flower['image'])): ?>
                    <img src="<?= htmlspecialchars($flower['image']) ?>" alt="<?= htmlspecialchars($flower['name']) ?>" style="width: 100px; height: auto;">
                <?php else: ?>
                    <span>Không có hình ảnh</span>
                <?php endif; ?>
            </td>
            <td>
                <button type="button" class="btn btn-success edit-btn" 
                    data-id="<?= $flower['id'] ?>" 
                    data-name="<?= htmlspecialchars($flower['name']) ?>" 
                    data-description="<?= htmlspecialchars($flower['description']) ?>"
                    data-image="<?= htmlspecialchars($flower['image']) ?>">
                    Sửa
                </button>
                <button type="button" class="btn btn-danger delete-btn" 
                    data-id="<?= $flower['id'] ?>" 
                    data-name="<?= htmlspecialchars($flower['name']) ?>">
                    Xóa
                </button>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
        </table>
    </div>

    
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa hoa <span id="deleteFlowerName"></span> không?
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" action="delete_flower.php" method="POST">
                        <input type="hidden" name="id" id="deleteFlowerId">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                
                document.getElementById('flowerId').value = this.getAttribute('data-id');
                document.getElementById('editFlowerName').value = this.getAttribute('data-name');
                document.getElementById('editFlowerDescription').value = this.getAttribute('data-description');
                
                
                document.getElementById('editFlowerForm').style.display = 'block';
                document.getElementById('addFlowerForm').style.display = 'none';
            });
        });

        
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const flowerId = this.getAttribute('data-id');
                const flowerName = this.getAttribute('data-name');

                
                document.getElementById('deleteFlowerId').value = flowerId;
                document.getElementById('deleteFlowerName').textContent = flowerName;

                
                var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                deleteModal.show();
            });
        });
    </script>
</body>
</html>