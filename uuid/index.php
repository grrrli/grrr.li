<?php
require_once 'vendor/autoload.php';
require_once '../helpers.php';
use Ramsey\Uuid\Uuid;
$uuid = Uuid::uuid4();
?>

<?php setHeaders(); ?>
<!doctype html>
<html lang="en">
<head>
    <?php renderHeadBase('UUID'); ?>
    <link rel="stylesheet" href="/uuid/uuid.css">
</head>
<body>
<div id="uuid-wrapper">
    <h1 onclick="navigator.clipboard.writeText('<?php echo $uuid; ?>');">
        <?php echo $uuid; ?>
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
