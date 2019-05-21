<?php include 'functions.php' ;?>
<?php include 'warlogresults.php' ;?>
<html>
    <head>
        <title>clash royale clan war participants exposed</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>

        <h2>HALL OF TRAITORS</h2>
<?php
    $i = 1;
    $missedCollectionBattles = array();
    $missedWarBattles = array();
?>
<?php foreach ($warlogresults as $war): ?>

    <div class="warlog">
        <hr>
        <h3>WAR #<?php echo $i ?></h3>

    <?php $i++; ?>
    <?php foreach ($war->participants as $players): ?>
        <?php if ($players->collectionDayBattlesPlayed == 1): ?>
            <b><?= $players->name; ?></b> missed 2 collection battles<br />
            <?php $missedCollectionBattles = array_push_assoc($missedCollectionBattles, $players->name, '2'); ?>
        <?php endif; ?>

        <?php if ($players->collectionDayBattlesPlayed == 2): ?>
            <b><?= $players->name; ?></b> missed 1 collection battle<br />
            <?php $missedCollectionBattles = array_push_assoc($missedCollectionBattles, $players->name, '1'); ?>
        <?php endif; ?>

        <?php if ($players->battlesPlayed == 0): ?>
            <b><?= $players->name; ?> missed the WAR battle!</b><br />
            <?php $missedWarBattles = array_push_assoc($missedWarBattles, $players->name, '1'); ?>
        <?php endif; ?>
    <?php endforeach; ?>

    </div>
<?php endforeach; ?>

<?php arsort($missedCollectionBattles); ?>
<?php arsort($missedWarBattles); ?>

    <h2>TRAITORS total count</h2>
    <h2>missed collection day battles</h2>

    <?php foreach( $missedCollectionBattles as $key => $total ): ?>
        <span class="miss coll<?= $total ?>"><b><?= $key ?></b> have missed a total of <b><?= $total ?></b> collection battles </br></span>
    <?php endforeach; ?>
    <h2>missed war battles</h2>

    <?php foreach( $missedWarBattles as $key => $total ): ?>
        <span class="miss war<?= $total ?>"<b><?= $key ?></b> have missed a total of <b><?= $total ?></b> WAR battles </br></span>
    <?php endforeach; ?>

    </body>
</html>