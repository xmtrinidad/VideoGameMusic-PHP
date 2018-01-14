# Video Game Music

The purpose of this project is to practice PHP and MySQL to create a small collection of some of my favorite music from Video Games growing up.

This is my first real PHP project and although I don't plan on growing it any bigger than it is, I learned several things that I can apply to other larger PHP projects if I needed to.


## Documentation

Below is an outline of some of the notable things I noticed while making this application.

### Using includes and requires like components

Similar to modern frameworks like Angular and React, PHP encourage the use of reusable code to keep things DRY.  There are several instances in this application where I reuse code in various PHP files.

For example, the *boxes* that make up the music selections use the same code throughout all system PHP files (genesis.php, nes.php, etc):

```php
<?php foreach($music as $album): ?>
    <div style="background-image: url(<?php echo $album['bgimg']; ?>)" class="box">
        <div class="box__info">
            <div>
                <h4 class="box__title"><?php echo $album['title']; ?></h4>
                <!-- <p><?php echo $album['system']; ?></p> -->
            </div>
            <div>
                <a class="box__link btn" href="<?php echo $album['link']; ?>">Listen</a>
            </div>
        </div>
    </div>
<?php endforeach; ?>
```

Data such as the background-image is dynamic in this reusable code snippet.  Within the file that uses this code snippet the information is from the database and used to create the data.

### Accessing the database with PHP

#### Create a Database

Before a database can be used, it needs to be created for the project.  This can be done through phpMyAdmin (which is part of XAMPP, the software suite I am using for PHP development).

1.  From the phpMyAdmin home page click Databases:

2.  In the *Create database* input, enter the database name and click the *Create* button.

3.  Create a table and select number of columns then click go

4.  Enter the names of the columns and select their data types then click save.

    *  Note that if making an *id* column, check the **A_I** box to Auto Increment new entries added to the database.  When click this box, a modal will pop up to confirm if this field should be the PRIMARY key.  Click Go to confirm.

#### Insert Data from phpMyAdmin

1.  Inside the database created, click the *Insert* tab and enter data.

    * If the database table has an **id** column and Auto Increment is selected, do not enter a value.  The entry will automatically increment for each new entry added to the table.

#### Use PHP with MySQL Improved to Access the Database

Before the database can be accessed within the PHP application, access needs to be set-up.  This PHP application uses the MySQL Improved extension to manipulate the database.

1.  Set up a config file (*config.php*) with the following information:
```php
<?php
    define('ROOT_URL', 'http://localhost/your-website/');
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'YourDatabasePassword');
    define('DB_NAME', 'DatabaseName');
?>
```
    *  Note that these are essentially *constant* variables that will be available globally within the PHP application.

2.  Create a new php file and name is *db.php*.  This file will hold the database connection data that uses the config data created from step one.
```php
<?php

    // Create Connection
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if (mysqli_connect_error()) {
        // Connection failed
        echo 'failed to connect to MySQL' . mysqli_connect_errno();
    }

?>
```
    * The code above sets up a connection to the database using mysqli.  If there is an error, it will display an error message in the browser.

3.  Once the initial set up is made, any PHP files using/manipulating the database need to *require* the db and config files:
```php
<?php
    require('./config/config.php');
    require('./config/db.php');
?>
```

####  Query the Database

The code below is a query to the database that gets music information:

```php
<?php
    require('./config/config.php');
    require('./config/db.php');

    $query = 'SELECT * FROM music';
    $result = mysqli_query($conn, $query);

    // Fetch data
    $music = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // Free Result
    mysqli_free_result($result);
    // Close Connection
    mysqli_close($conn);

?>
```

As mentioned, the first two requires import database information created earlier.
```$query = 'SELECT * FROM music';``` is a MySQL query that gets all entries from the *music* table of the database; this is only a definition of the query and doesn't

Using mysqli, ```$result = mysqli_query($conn, $query);``` establishes a connection (the ```$conn``` variable is located within the db.php file) to the database and makes the query using the $query variable.

```$music = mysqli_fetch_all($result, MYSQLI_ASSOC);``` puts on $result data into an associative array that can be used within the HTML of the application.

The final two parts, ```mysqli_free_result($result);``` and ```mysqli_close($conn);``` are used to free the result from memory then close the connection to the database.


