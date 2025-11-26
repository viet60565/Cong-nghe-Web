<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hiển thị danh sách tài khoản từ CSV</title>
    <style>
        table { border-collapse: collapse; margin-top: 15px; width: 100%; }
        th, td { border: 1px solid #222; padding: 6px 12px; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h2>Danh sách tài khoản từ CSV</h2>
    <?php
    $filename = "65HTTT_Danh_sach_diem_danh.csv"; // Đường dẫn tới file CSV trên server

    if (file_exists($filename)) {
        if (($handle = fopen($filename, "r")) !== FALSE) {
            echo "<table>";
            $firstRow = true;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($firstRow) {
                    echo "<thead><tr>";
                    foreach ($data as $cell) {
                        echo "<th>" . htmlspecialchars($cell) . "</th>";
                    }
                    echo "</tr></thead><tbody>";
                    $firstRow = false;
                } else {
                    echo "<tr>";
                    foreach ($data as $cell) {
                        echo "<td>" . htmlspecialchars($cell) . "</td>";
                    }
                    echo "</tr>";
                }
            }
            echo "</tbody></table>";
            fclose($handle);
        } else {
            echo "<p>Không thể đọc file.</p>";
        }
    } else {
        echo "<p>File không tồn tại.</p>";
    }
    ?>
</body>
</html>
