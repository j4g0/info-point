<?php
/**
 * @package InfoPoint
 */

namespace Inc\Base;

use Inc\Base\BaseController;

class Counselings extends BaseController
{
  public function register()
  {
    add_shortcode( 'ip_beratung', [ $this, 'shortcode' ] );
  }

  public function shortcode()
  {
    return require_once( "$this->plugin_path/templates/counselings.php" );
  }
}
