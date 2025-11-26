<?php
$filename = "Quiz.txt";
$content = file_get_contents($filename);

// Regex tách tất cả block theo ANSWER: (hỗ trợ mọi loại xuống dòng)
preg_match_all('/(.*?)(?:\r?\n)ANSWER:\s*([A-Z](?:,\s*[A-Z])*)/si', $content, $matches, PREG_SET_ORDER);

$quiz = [];
foreach ($matches as $block) {
    $blockText = trim($block[1]);
    $answerText = trim($block[2]);
    // Tách nhiều đáp án (nếu có) thành mảng
    $answers = array_map('trim', explode(',', strtoupper($answerText)));

    // Lấy các dòng trong block (bỏ dòng trắng)
    $lines = array_filter(array_map('trim', explode("\n", $blockText)));
    if (count($lines) < 2) continue;
    $question = array_shift($lines);
    $options = $lines;
    $quiz[] = [
        "question" => $question,
        "options"  => $options,
        "answer"   => $answers
    ];
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Bài thi trắc nghiệm</title>
<style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    .question { border: 1px solid #ccc; padding: 15px; border-radius: 8px; margin-bottom: 20px; }
    .correct { color: green; font-weight: bold; }
    .wrong { color: red; font-weight: bold; }
</style>
</head>
<body>

<h2>Bài thi trắc nghiệm</h2>
<form method="post">
<?php foreach ($quiz as $index => $q): ?>
    <div class="question">
        <p><strong><?= ($index+1) . ". " . htmlspecialchars($q['question']) ?></strong></p>
        <?php foreach ($q['options'] as $opt): 
            $key = trim(explode(".", $opt)[0]);
        ?>
            <label>
                <input type="radio" name="q<?= $index ?>" value="<?= $key ?>"
                <?= (isset($_POST["q$index"]) && $_POST["q$index"] == $key) ? "checked" : "" ?>>
                <?= htmlspecialchars($opt) ?>
            </label><br>
        <?php endforeach; ?>

        <?php if ($_POST): ?>
            <p>
            <?php
                $selected = $_POST["q$index"] ?? "";
                $isCorrect = in_array(strtoupper($selected), $q['answer']);
                if ($isCorrect) {
                    echo "<span class='correct'> Đúng (Đáp án: " . implode(', ', $q['answer']) . ")</span>";
                } else {
                    echo "<span class='wrong'> Sai (Đúng: " . implode(', ', $q['answer']) . ")</span>";
                }
            ?>
            </p>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

<input type="submit" value="Nộp bài">
</form>

</body>
</html>
