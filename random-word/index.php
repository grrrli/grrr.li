<?php require_once '../helpers.php';  ?>

<?php setHeaders(); ?>
<!doctype html>
<html lang="en">
<head>
    <?php renderHeadBase('Random word'); ?>
    <link rel="stylesheet" href="/random-word/random-word.css">
</head>
<body>
    <?php
        // thanks https://github.com/openedx/edx-notes-api/blob/master/notesapi/v1/management/commands/data/basic_words.txt
        $words = json_decode(file_get_contents('words.json'));
        $randomWord = $words[array_rand($words)];
    ?>
    <div id="random-word-wrapper">
        <h1 onclick="navigator.clipboard.writeText('<?php echo $randomWord; ?>');">
            <?php echo $randomWord; ?>
        </h1>
    </div>
    <script>
        document.body.onkeyup = function(e) {
            if (
                e.key === ' '
                ||
                e.code === 'Space'
                ||
                e.keyCode === 32
            ) {
                location.reload();
            }
        }
    </script>
</body>
</html>
