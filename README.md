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