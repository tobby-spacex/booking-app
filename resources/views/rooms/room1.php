<?php

$start = new DateTime();
$start->setTime(8, 0, 0);

$end = clone $start;
$end->setTime(18, 0, 0);

$interval = new DateInterval('PT30M');

$dateRange = new DatePeriod($start, $interval, $end);

if (isset($_SESSION['error'])) {
    // foreach ($_SESSION['error'] as $errors) {
        foreach ($_SESSION['error'] as $key => $value) {
            $$key = $_SESSION['error'][$key];
        }
    // }
}

?>

<?php include VIEW_PARTIALS_PATH . '/_header.php'; ?>

<?php 
    if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
    }

    if (isset($_SESSION['booked_person'])) {
        $bookedName = $_SESSION['booked_person']['name'];
        $bookedEmail = $_SESSION['booked_person']['email'];

        echo 'This time already booked by ' . ucfirst($bookedName) . '. His/Her contact email is ' . $bookedEmail;
    }
?>

<form action="/rooms/room1" method="post" class="mx-auto w-3/12">
    <div class="room-card grid bg-amber-100">

        <input type="hidden" name="url" value="<?=$_SERVER['REQUEST_URI']?>" />

        <label>Name:</label>
        <input name="name" placeholder="name"/>
        <div class="error" style="color: red;">
         <?php if(isset($name)) { echo $name[0]; }?>
        </div>
        
        <label>Email:</label>
        <input name="email" placeholder="email"/>
        <div class="error" style="color: red;">
        <?php if(isset($email)) { echo $email[0]; }?>
        </div>

        <label>Phone:</label>
        <input name="phone" placeholder="phone"/>
        <div class="error" style="color: red;">
        <?php if(isset($phone)) { echo $phone[0]; }?>
        </div>

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

<?php
    session_unset();
?>
<?php include VIEW_PARTIALS_PATH . '/_footer.php'; ?>