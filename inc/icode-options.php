<?php
/**
 * iCode theme options administration panel.
 *
 * @package iCode
 */

?>

<div class="wrap">
	<div id="option-page-heading">
		<h1><img src="<?php echo get_template_directory_uri(); ?>/assets/img/main_logo_white.png" alt="iCode Theme" />Theme Options</h1>
	</div>
	<div><?php settings_errors(); ?></div>
	<form id="submitForm" method="post" action="options.php" class="icode-options-form">
		<div class="option-group-panel">
			<?php do_settings_sections('icode_general_options' ); ?>
		</div>
		<div class="option-group-panel">
			<?php do_settings_sections('icode_post_options' ); ?>
		</div>
		<div class="option-group-panel">
			<?php do_settings_sections('icode_social_options' ); ?>
		</div>
		<?php
			settings_fields('icode-settings-group');
			submit_button('Save Changes', 'primary', 'btnSubmit');
		?>
	</form>
</div>