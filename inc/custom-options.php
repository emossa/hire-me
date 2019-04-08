<h1>Custom theme options</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
  <?php settings_fields( 'hireme-settings-group' ); ?>
  <?php do_settings_sections('hireme-custom'); ?>
  <?php submit_button(); ?>
</form>
