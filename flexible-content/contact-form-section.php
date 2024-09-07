<?php
wp_reset_query();
wp_reset_postdata();
$contact_title = get_sub_field('contact_title');
$shortcode = get_sub_field('shortcode');

?>

<section class="contact-form-section">
    <div class="container">
        <div class="contact-form-wrap">
            <?php if(!empty($contact_title)) {?>
                <h2><?php echo $contact_title; ?></h2>
            <?php } ?>
            <div class="contact-form">
                <?php echo do_shortcode($shortcode); ?>
            </div>
        </div>
    </div>
</section>