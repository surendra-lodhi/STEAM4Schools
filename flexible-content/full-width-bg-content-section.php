<?php
wp_reset_query();
wp_reset_postdata();
$background_image = get_sub_field('background_image');
$title = get_sub_field('title');
$content = get_sub_field('content');
$button = get_sub_field('button');

?>

<section class="full-width-bg-content-section" style="background-image: url(<?php echo $background_image; ?>);">
    <div class="container">
        <div class="full-content">
            <?php if(!empty($title)) {?>
                <h2><?php echo $title; ?></h2>
            <?php } ?>
            <?php if(!empty($content)) {?>
                <p><?php echo $content; ?></p>
            <?php } ?>
            <div class="btn-block">
               <a class="btn-primary" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
            </div>
        </div>
    </div>
</section>