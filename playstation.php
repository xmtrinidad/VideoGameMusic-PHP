<?php
    require('./config/config.php');
    require('./config/db.php');

    $query = "SELECT * FROM music WHERE system = 'playstation'";
    $result = mysqli_query($conn, $query);
    // Fetch data
    $music = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // Free Result
    mysqli_free_result($result);
    // Close Connection
    mysqli_close($conn);

?>

<?php include('./Inc/header.php'); ?>
    <h2 class="display-4 text-center">Playstation</h2>
    <div class="boxes">
        <?php include('./Inc/box.php'); ?>
    </div>

<?php include ('./Inc/footer.php'); ?>