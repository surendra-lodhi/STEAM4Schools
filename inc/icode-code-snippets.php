<?php
/**
 * iCode theme options code snippets sub panel.
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
			<?php do_settings_sections('icode_snippets_header' ); ?>
		</div>
		<div class="option-group-panel">
			<?php do_settings_sections('icode_snippets_body' ); ?>
		</div>
		<div class="option-group-panel">
			<?php do_settings_sections('icode_snippets_footer' ); ?>
		</div>
		<div class="option-group-panel">
			<?php do_settings_sections('icode_snippets_conversion' ); ?>
		</div>
		<?php
			settings_fields('icode-snippets-group');
			submit_button('Save Changes', 'primary', 'btnSubmit');
		?>
	</form>
</div>