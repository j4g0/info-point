<?php
/**
 * @package InfoPoint
 */

namespace Inc\Base;

class BaseController
{
  public $plugin_path;
  public $plugin_url;
  public $plugin;
  public $features = [];

  public function __construct()
  {
    $this->plugin_path  = plugin_dir_path( dirname( __FILE__, 2 ) );
    $this->plugin_url   = plugin_dir_url( dirname( __FILE__, 2 ) );
    $this->plugin  = plugin_basename( dirname( __FILE__, 3 ) ) . '/info-point.php';

    $this->features = [
      'counseling'    => 'Beratungsstellen aktivieren',
      'qualification' => 'Qualifizierungsstellen aktivieren',
      'employment'    => 'Vermittlungsstellen aktivieren',
    ];
  }
}

