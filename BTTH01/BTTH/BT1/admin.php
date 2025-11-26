<?php require 'hoadep.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản trị danh sách hoa</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td {
            border: 1px solid #444;
            padding: 8px;
            text-align: center;
        }
        img { width: 80px; height: 80px; object-fit: cover; }
        a.btn { padding: 4px 10px; background: green; color: white; text-decoration: none; border-radius: 4px; }
    </style>
</head>
<body>

<h2>Quản trị – Danh sách các loài hoa</h2>

<table>
    <tr>
        <th>#</th>
        <th>Tên Hoa</th>
        <th>Mô tả</th>
        <th>Ảnh</th>
        <th>Hành động</th>
    </tr>

    <?php foreach ($flowers as $i => $f): ?>
        <tr>
            <td><?= $i + 1 ?></td>
            <td><?= $f['name'] ?></td>
            <td><?= $f['desc'] ?></td>
            <td><img src="images/<?= $f['image'] ?>"></td>
            <td>
                <a href="edit.php?id=<?= $i ?>" class="btn">Sửa</a>
                <a href="delete.php?id=<?= $i ?>" class="btn" style="background:red;">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<br>
<a href="add.php" class="btn">Thêm loài hoa mới</a>

</body>
</html>
