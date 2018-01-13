<?php
    require('./config/config.php');
    require('./config/db.php');

    // Check for Submit
    if (isset($_POST['submit'])) {
        // Get form data
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $system = mysqli_real_escape_string($conn, $_POST['system']);
        $image = mysqli_real_escape_string($conn, $_POST['image']);
        $link = mysqli_real_escape_string($conn, $_POST['link']);

        $query = "INSERT INTO music(title, link, bgimg, system) VALUES('$title', '$link', '$image', '$system')";

        if (mysqli_query($conn, $query)) {
            header('Location: ' .ROOT_URL. '');
        } else {
            echo 'ERROR: ' . mysqli_error($conn);
        }
    }
?>

<?php include('./Inc/header.php'); ?>
    
<div class="container">
    <h1 class="text-center">Add Music</h1>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label for="user_title">Title</label>
            <input type="text" name="title" id="user_title" class="form-control">
        </div>
        <div class="form-group">
            <label for="user_system">System</label>
            <select id="user_system" class="form-control" name="system">
                <option value="nes">NES</option>
                <option value="genesis">Genesis</option>
            </select>
        </div>
        <div class="form-group">
            <label for="user_img">Image</label>
            <input type="text" name="image" id="user_img" class="form-control">
        </div>
        <div class="form-group">
            <label for="user_link">Link</label>
            <input type="text" name="link" id="user_link" class="form-control">
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    </form>
</div>

<?php include ('./Inc/footer.php'); ?>