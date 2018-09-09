<?php
/**
 * @package InfoPoint
 */

namespace Inc\Base;

class Activate
{
  public static function activate()
  {
    flush_rewrite_rules();

    if (get_option( 'info_point' )) {
      return;
    }

    $default = [];
    update_option( 'info_point', $default );
  }
}
