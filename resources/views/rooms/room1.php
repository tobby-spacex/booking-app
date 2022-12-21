<?php

$start = new DateTime();
$start->setTime(8, 0, 0);

$end = clone $start;
$end->setTime(18, 0, 0);

$interval = new DateInterval('PT30M');

$dateRange = new DatePeriod($start, $interval, $end);

?>


<select name="time" id="time">
    <?php foreach($dateRange as $date): ?>
        <option value="<?= $date->format('H:i'); ?>">
            <?= $date->format('H:i'); ?>
        </option>
    <?php endforeach; ?>    
</select>

