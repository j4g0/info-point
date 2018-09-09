<?php
/**
 * @package InfoPoint
 */

namespace Inc\Base;

class Enqueue extends BaseController
{
  public function register()
  {
    add_action( 'admin_enqueue_scripts', [ $this, 'enqueue' ] );
  }

  public function enqueue()
  {
    wp_enqueue_style( 'info_point_css', $this->plugin_url . 'assets/info-point.css' );
    wp_enqueue_script( 'info_point_js', $this->plugin_url . 'assets/info-point.js' );
  }
}
