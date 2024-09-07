<?php
wp_reset_query();
wp_reset_postdata();
$image = get_sub_field('image');
$title = get_sub_field('title');
$content = get_sub_field('content');

?>

<section class="half-image-content-section">
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-sm-6">
            <?php if(!empty($image)) {?>
            <div class="image">
               <img src="<?php echo $image; ?>" alt="">
            </div>
            <?php } ?>
         </div>
         <div class="col-md-6 col-sm-6">
            <div class="content">
               <?php if(!empty($title)) {?>
                    <h3><?php echo $title; ?></h3>
                <?php } ?>
                <?php if(!empty($content)) {?>
                    <p><?php echo $content; ?></p>
               <?php } ?>
            </div>
         </div>
      </div>
   </div>
</section>