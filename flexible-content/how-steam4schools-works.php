<?php
wp_reset_query();
wp_reset_postdata();
$work_section_bg = get_sub_field('work_section_bg');
$work_title = get_sub_field('work_title');
$works_lists = get_sub_field('works_lists');

?>

<section class="how-steam4Schools-works-section" style="background-image:url(<?php echo $work_section_bg; ?>);">
    <div class="container">
        <?php if(!empty($work_title)) {?>
            <h2><?php echo $work_title; ?></h2>
        <?php } ?>
        <div class="row">
            <?php if(!empty($works_lists)){ ?>
            <?php foreach ($works_lists as $key => $value) { 
                $work_image = $value['work_image'];
                $work_heading = $value['work_heading'];
                $work_content = $value['work_content'];
            ?>
            <div class="col-md-4">
                <div class="steam4schools-item">
                    <?php if(!empty($work_image)) {?>
                    <div class="work-image">
                        <img src="<?php echo $work_image; ?>" alt="">
                    </div>
                    <?php } ?>
                    <div class="work-content">
                        <?php if(!empty($work_heading)) {?>
                            <h4><?php echo $work_heading; ?></h4>
                        <?php } ?>
                        <?php if(!empty($work_content)) {?>
                            <p><?php echo $work_content; ?></p>
                       <?php } ?>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>