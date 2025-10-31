<?php
require_once 'vendor/autoload.php';
require_once '../helpers.php';
use Ramsey\Uuid\Uuid;
$uuid = Uuid::uuid4();
?>

<?php setHeaders(false); ?>
<!doctype html>
<html lang="en">
<head>
    <?php renderHeadBase('UUID'); ?>
    <link rel="stylesheet" href="/uuid/uuid.css">
</head>
<body class="tool">
<div class="tool-wrapper">
    <h1><?php echo $uuid; ?></h1>
    <div style="margin: 20px 0;">
        <button class="icon-button" onclick="copyToClipboard('<?php echo $uuid; ?>')" aria-label="Copy">⎘</button>
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
