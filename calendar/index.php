<?php
require_once '../helpers.php';

date_default_timezone_set('UTC');

$year = isset($_GET['year']) ? intval($_GET['year']) : date('Y');
$userLanguage = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'en_US';
$userLanguage = substr($userLanguage, 0, 2);

$months = [];
for ($month = 1; $month <= 12; $month++) {
    $formatter = new IntlDateFormatter(
        $userLanguage,
        IntlDateFormatter::LONG,
        IntlDateFormatter::NONE,
        'UTC',
        IntlDateFormatter::GREGORIAN,
        'MMMM'
    );
    $timestamp = mktime(0, 0, 0, $month, 1, $year);
    $months[$month] = ucfirst($formatter->format($timestamp));
}

$daysOfWeek = [];
for ($day = 1; $day <= 7; $day++) {
    $formatter = new IntlDateFormatter(
        $userLanguage,
        IntlDateFormatter::LONG,
        IntlDateFormatter::NONE,
        'UTC',
        IntlDateFormatter::GREGORIAN,
        'E'
    );
    $timestamp = mktime(0, 0, 0, 1, $day, $year);
    $daysOfWeek[] = substr(ucfirst($formatter->format($timestamp)), 0, 2);
}
?>

<?php setHeaders(); ?>
<!doctype html>
<html lang="<?php echo $userLanguage; ?>">
<head>
    <?php renderHeadBase('Calendar ' . $year); ?>
    <link rel="stylesheet" href="/calendar/calendar.css">
</head>
<body>
<?php
function buildCalendar($year, $months, $daysOfWeek)
{
    $currentDate = date('Y-m-d');
    ?>
    <div class='calendar-container'><?php
    foreach ($months as $monthNum => $month) {
        ?>
        <div class='month'><?php
        $firstDayOfMonth = mktime(0, 0, 0, $monthNum, 1, $year);
        $numberDays = date('t', $firstDayOfMonth);
        $dateComponents = getdate($firstDayOfMonth);
        $dayOfWeek = $dateComponents['wday'];
        $dayOfWeek = ($dayOfWeek - 1 + 7) % 7;
        $weekNumber = date('W', $firstDayOfMonth);
        ?><h2><?php echo $month . ' ' . $year; ?></h2>
        <table>
            <tr>
                <th>Wk</th>
                <?php foreach ($daysOfWeek as $day) {
                    ?>
                    <th><?php echo $day; ?></th><?php
                }
                ?> </tr>
            <tr>
                <td class='week-number'><?php echo $weekNumber; ?></td><?php

                if ($dayOfWeek > 0) {
                    ?>
                    <td colspan='<?php echo $dayOfWeek; ?>'>&nbsp;</td><?php
                }

                $currentDay = 1;
                while ($currentDay <= $numberDays) {
                if ($dayOfWeek == 7) {
                $dayOfWeek = 0;
                ?></tr>
            <tr><?php
                $weekNumber = date('W', mktime(0, 0, 0, $monthNum, $currentDay, $year));
                ?>
                <td class='week-number'><?php echo $weekNumber; ?></td><?php
                }

                $dateString = sprintf("%04d-%02d-%02d", $year, $monthNum, $currentDay);
                $class = ($dateString === $currentDate) ? 'current-day' : '';
                ?>
                <td class="<?php echo $class; ?>"><?php echo $currentDay; ?></td><?php

                $currentDay++;
                $dayOfWeek++;
                }

                if ($dayOfWeek != 7) {
                    $remainingDays = 7 - $dayOfWeek;
                    ?>
                    <td colspan='<?php echo $remainingDays; ?>'>&nbsp;</td><?php
                }
                ?></tr>
        </table>
        </div><?php
    }
    ?></div><?php
}

buildCalendar($year, $months, $daysOfWeek);
?>
</body>
</html>
