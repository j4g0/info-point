<div class="wrap">
  <h1>InfoPoint Dashboard</h1>
  <?php settings_errors(); ?>

  <ul class="nav nav-tabs">
    <li class="active">
      <a href="#tab-1">Manage Settings</a>
    </li>
    <li>
      <a href="#tab-2">About</a>
    </li>
  </ul>

  <div class="tab-content">

    <div id="tab-1" class="tab-pane active">
      <form action="options.php" method="POST">
        <?php 
          settings_fields( 'infopoint_settings' );
          do_settings_sections( 'info_point' );
          submit_button();
        ?>
      </form>
    </div>

    <div id="tab-2" class="tab-pane">
      <h3>About</h3>
      <p>InfoPoint Plugin by Roman Handke</p>
    </div>

  </div>

</div>
