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

  public function infoPointOptionsGroup( $input )
  {
    return $input;
  }

  public function infoPointAdminSection()
  {
    echo 'Admin section under development';
  }

  public function infoPointTextExample()
  {
    $value = esc_attr( get_option( 'text_example' ) );
    echo '
      <input type="text" class="regular-text" name="text_example" value="' . $value .'" placeholder="Write something here!">
    ';
  }

  public function infoPointFirstName()
  {
    $value = esc_attr( get_option( 'first_name' ) );
    echo '
      <input type="text" class="regular-text" name="first_name" value="' . $value .'" placeholder="Write your first name">
    '; 
  } 
}
