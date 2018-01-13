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