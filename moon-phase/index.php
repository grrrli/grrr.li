<?php require_once '../helpers.php';  ?>

<?php setHeaders(); ?>
<!doctype html>
<html lang="en">
<head>
    <?php renderHeadBase('Moon phase'); ?>
    <link rel="stylesheet" href="/moon-phase/moon-phase.css">
</head>
<body class="tool">
    <?php
        function getMoonPhaseName(): string
        {
            $newMoonDate = '2023-04-20';
            $newMoonTimestamp = strtotime($newMoonDate);
            $diff = time() - $newMoonTimestamp;
            $days = $diff / (24 * 60 * 60);
            $cycleFraction = $days / 29.53;
            $currentDayInCycle = ($cycleFraction - floor($cycleFraction)) * 29.53;

            if ($currentDayInCycle < 1.84566) {
                return 'New Moon';
            } elseif ($currentDayInCycle < 5.53699) {
                return 'Waxing Crescent';
            } elseif ($currentDayInCycle < 9.22831) {
                return 'First Quarter';
            } elseif ($currentDayInCycle < 12.91963) {
                return 'Waxing Gibbous';
            } elseif ($currentDayInCycle < 16.61096) {
                return 'Full Moon';
            } elseif ($currentDayInCycle < 20.30228) {
                return 'Waning Gibbous';
            } elseif ($currentDayInCycle < 23.99361) {
                return 'Last Quarter';
            } elseif ($currentDayInCycle < 27.68493) {
                return 'Waning Crescent';
            } else {
                return 'Old Moon';
            }
        }

        function getMoonPhaseEmoji(): string
        {
            $phaseName = getMoonPhaseName();

            switch ($phaseName) {
                case 'New Moon':
                    return '🌑';
                case 'Waxing Crescent':
                    return '🌒';
                case 'First Quarter':
                    return '🌓';
                case 'Waxing Gibbous':
                    return '🌔';
                case 'Full Moon':
                    return '🌕';
                case 'Waning Gibbous':
                    return '🌖';
                case 'Last Quarter':
                    return '🌗';
                case 'Waning Crescent':
                    return '🌘';
                default:
                    return '🌑';
            }
        }
    ?>
    <div class="tool-wrapper">
        <h1>
            <?php echo getMoonPhaseEmoji(); ?>
        </h1>
        <h2>
            <?php echo getMoonPhaseName(); ?>
        </h2>
    </div>
</body>
</html>
