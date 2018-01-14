<?php 
    $pageName = basename($_SERVER['PHP_SELF']);
    switch ($pageName) {
        case strpos($pageName, 'nes'):
            $query = "SELECT * FROM music WHERE system = 'nes'";
            break;
        case strpos($pageName, 'genesis');
            $query = "SELECT * FROM music WHERE system = 'genesis'";
            break;
        case strpos($pageName, 'playstation'):
            $query = "SELECT * FROM music WHERE system = 'playstation'";
            break;
        default:
            $query = 'SELECT * FROM music';
            break;
    }
    
    $result = mysqli_query($conn, $query);

    // Fetch data
    $music = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // Free Result
    mysqli_free_result($result);
    // Close Connection
    mysqli_close($conn);
?>