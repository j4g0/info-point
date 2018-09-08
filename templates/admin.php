<div class="wrap">
  <h1>InfoPoint Dashboard</h1>
  <?php settings_errors(); ?>

  <form action="options.php" method="POST">
    <?php 
      settings_fields( 'info_point_options_group' );
      do_settings_sections( 'info_point' );
      submit_button();
    ?>
  </form>
</div>
