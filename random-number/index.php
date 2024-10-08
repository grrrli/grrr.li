<?php require_once '../helpers.php';  ?>

<?php setHeaders(false); ?>
<!doctype html>
<html lang="en">
<head>
    <?php renderHeadBase('Random number'); ?>
    <link rel="stylesheet" href="/random-number/random-number.css">
</head>
<body>
    <?php
        const DEFAULT_MIN = 1;
        const DEFAULT_MAX = 1000;
        const ABSOLUTE_MIN = -1000000000;
        const ABSOLUTE_MAX = 1000000000;
        if (!empty($_GET['min']) && !empty($_GET['max'])) {
            $min = intval($_GET['min']);
            $max = intval($_GET['max']);
            if ($min >= $max) {
                $min = DEFAULT_MIN;
                $max = DEFAULT_MAX;
            }
            if ($min < ABSOLUTE_MIN) {
                $min = ABSOLUTE_MIN;
            }
            if ($max > ABSOLUTE_MAX) {
                $max = ABSOLUTE_MAX;
            }
        }
        if (empty($min) || empty($max)) {
            $min = DEFAULT_MIN;
            $max = DEFAULT_MAX;
        }
        function generateRandomNumber(int $min, int $max): int {
            return rand($min, $max);
        }
        $randomNumber = generateRandomNumber($min, $max);
    ?>
    <div id="random-number-wrapper">
        <h1 onclick="navigator.clipboard.writeText('<?php echo $randomNumber; ?>');">
            <?php echo $randomNumber; ?>
        </h1>
        <div class="form-container">
            <form method="get">
                <input
                    type="number"
                    id="min"
                    class="input"
                    name="min"
                    value="<?php echo $min; ?>"
                    min="<?php echo ABSOLUTE_MIN; ?>"
                    max="<?php echo ABSOLUTE_MAX; ?>"
                    required
                >
                <input
                    type="number"
                    id="max"
                    class="input"
                    name="max"
                    value="<?php echo $max; ?>"
                    min="<?php echo ABSOLUTE_MIN; ?>"
                    max="<?php echo ABSOLUTE_MAX; ?>"
                    required
                >
                <input type="submit" class="button" value="Submit">
            </form>
        </div>
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
