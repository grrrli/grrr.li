<?php require_once '../helpers.php';  ?>

<?php setHeaders(false); ?>
<!doctype html>
<html lang="en">
<head>
    <?php renderHeadBase('Random word'); ?>
    <link rel="stylesheet" href="/random-word/random-word.css">
</head>
<body class="tool">
    <?php
        // thanks https://github.com/openedx/edx-notes-api/blob/master/notesapi/v1/management/commands/data/basic_words.txt
        $words = json_decode(file_get_contents('words.json'));
        $randomWord = $words[array_rand($words)];
    ?>
    <div class="tool-wrapper">
        <h1 onclick="copyToClipboard('<?php echo $randomWord; ?>')" style="cursor: pointer;"><?php echo $randomWord; ?></h1>
        <div style="margin: 20px 0;">
            <button class="icon-button" onclick="copyToClipboard('<?php echo $randomWord; ?>')" aria-label="Copy">⎘</button>
            <button class="icon-button" onclick="refreshPage()" aria-label="Refresh">↻</button>
        </div>
    </div>
    <script src="/assets/utils.js"></script>
    <script>
        document.body.onkeyup = function(e) {
            if (e.key === ' ' || e.code === 'Space' || e.keyCode === 32) {
                location.reload();
            }
        }
    </script>
</body>
</html>
