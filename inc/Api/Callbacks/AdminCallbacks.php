<?php
/**
 * @package InfoPoint
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
  public function adminDashboard()
  {
    return require_once( "$this->plugin_path/templates/admin.php" );
  }

  public function checkboxSanitize( $input )
  {
    $output = [];
    foreach ($this->features as $key => $value) {
      $output[$key] = ( isset( $input[$key] ) ? true : false );
    }

    return $output;
  }

  public function infoPointAdminSection()
  {
    echo 'Plugin Features verwalten';
  }

  public function checkboxField( $args )
  {
    $name         = $args['label_for'];
    $classes      = $args['classes'];
    $option_name  = $args['option_name'];
    $checkbox     = get_option( $option_name );

    $checked      = isset( $checkbox[$name] ) ? ($checkbox[$name] ? true : false) : false;
    echo '
      <input type="checkbox" name="' . $option_name . '[' . $name . ']" value="1" class="' . $classes . '" ' . ( $checked ? 'checked' : '' ) . '>
    ';
  }
}
