<?php
wp_reset_query();
wp_reset_postdata();
$features_title = get_sub_field('features_title');
$features_lists = get_sub_field('features_lists');

?>

<section class="what-Steam4Schools-section">
    <div class="container">
        <?php if(!empty($features_title)) {?>
            <h2><?php echo $features_title; ?></h2>
        <?php } ?>
        <div class="row">
            <?php if(!empty($features_lists)){ ?>
            <?php foreach ($features_lists as $key => $value) { 
                $features_icon = $value['features_icon'];
                $features_heading = $value['features_heading'];
                $features_content = $value['features_content'];
                $button = $value['button'];
            ?>
            <div class="col-md-4">
                <div class="steam4schools-item">
                    <div class="content">
                        <?php if(!empty($features_icon)) {?>
                        <div class="icon">
                           <img src="<?php echo $features_icon; ?>" alt="">
                        </div>
                        <?php } ?>
                       <?php if(!empty($features_heading)) {?>
                            <h4><?php echo $features_heading; ?></h4>
                        <?php } ?>
                       <p><?php echo $features_content; ?></p>
                    </div>
                    <div class="btn-block">
                        <a class="btn-primary" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                     </div>
                </div>
            </div>
            <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>