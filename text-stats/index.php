<?php require_once '../helpers.php'; ?>

<?php setHeaders(); ?>
<!doctype html>
<html lang="en">
<head>
    <?php renderHeadBase('Text stats'); ?>
    <link rel="stylesheet" href="/text-stats/text-stats.css">
</head>
<body class="tool">
<div class="tool-wrapper">
    <div class="form-container">
        <textarea id="text-input" class="textarea" rows="10" cols="50" placeholder="Type something..."></textarea>
        <p id="char-count">Characters: 0</p>
        <p id="word-count">Words: 0</p>
        <p id="sentence-count">Sentences: 0</p>
        <p id="paragraph-count">Paragraphs: 0</p>
    </div>
</div>

<script>
    document.getElementById('text-input').addEventListener('input', function() {
        const text = this.value;
        const charCount = text.length;
        const wordCount = text.trim().split(/\s+/).filter(function (word) {
            return word.length > 0;
        }).length;
        const sentenceCount = text.split(/[.!?]+/).filter(function (sentence) {
            return sentence.trim().length > 0;
        }).length;
        const paragraphCount = text.split(/\n{2,}/).filter(function (paragraph) {
            return paragraph.trim().length > 0;
        }).length;
        document.getElementById('char-count').textContent = 'Characters: ' + charCount;
        document.getElementById('word-count').textContent = 'Words: ' + wordCount;
        document.getElementById('sentence-count').textContent = 'Sentences: ' + sentenceCount;
        document.getElementById('paragraph-count').textContent = 'Paragraphs: ' + paragraphCount;
    });
</script>
</body>
</html>
