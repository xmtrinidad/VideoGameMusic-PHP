<?php
    require('./config/config.php');
    require('./config/db.php');
    require('./config/queries.php');
?>

<?php include('./Inc/header.php'); ?>
    <h2 class="display-4 text-center">All</h2>
    <div class="boxes">
        <?php include('./Inc/box.php'); ?>
    </div>

<?php include ('./Inc/footer.php'); ?>