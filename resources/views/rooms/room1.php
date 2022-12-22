<?php

$start = new DateTime();
$start->setTime(8, 0, 0);

$end = clone $start;
$end->setTime(18, 0, 0);

$interval = new DateInterval('PT30M');

$dateRange = new DatePeriod($start, $interval, $end);

?>

<?php include VIEW_PARTIALS_PATH . '/_header.php'; ?>

<form action="/rooms/room1" method="post" class="mx-auto w-3/12">
    <div class="room-card grid bg-amber-100">
        <label>Name:</label>
        <input name="name" required/>

        <label>Email:</label>
        <input name="email" required/>

        <label>Phone:</label>
        <input name="phone" required/>

        <select name="time" id="time">
        <?php foreach($dateRange as $date): ?>
            <option value="<?= $date->format('H:i'); ?>">
                <?= $date->format('H:i'); ?>
            </option>
        <?php endforeach; ?>    
        </select>

        <input type="submit" value="Submit" class="bg-emerald-400">
    </div>
</form>

<?php include VIEW_PARTIALS_PATH . '/_footer.php'; ?>