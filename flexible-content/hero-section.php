<?php
wp_reset_query();
wp_reset_postdata();
$hero_image_bg = get_sub_field('hero_image_bg'); 
$title = get_sub_field('title'); 
$description = get_sub_field('description'); 
$button = get_sub_field('button'); 
 
?>
<section class="home-hero-section" style="background-image: url(<?php echo $hero_image_bg; ?>);">
    <div class="container">
        <div class="hero-content">
            <h1><?php echo $title; ?></h1>
            <p><?php echo $description; ?></p>
            <div class="btn-block">
               <a class="btn-primary" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
            </div>
        </div>
    </div>
</section>