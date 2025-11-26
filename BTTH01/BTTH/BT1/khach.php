<?php 
require 'hoadep.php';?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách hoa</title>
    <style>
        body { font-family: Arial; }
        .container { width: 1200px; margin: auto; }
        .card {
            width: 30%;
            display: inline-block;
            margin: 10px;
            vertical-align: top;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }
        .card img { width: 100%; height: 200px; object-fit: cover; }
        .card .content { padding: 10px; }
        h2 { text-align: center; }
    </style>
</head>
<body>
<div class="container">
    <h2>4 Loại hoa đẹp mùa xuân – hè</h2>

    <?php foreach($flowers as $f): ?>
        <div class="flower">
            <h2><?= $f['name'] ?></h2>
            <img src="images/<?= $f['image'] ?>" width="300">
            <p><?= $f['desc'] ?></p>
            <hr>
        </div>
    <?php endforeach; ?>

</div>
</body>
</html>
