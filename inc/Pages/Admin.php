<?php
/**
 * @package InfoPoint
 */
namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;

class Admin extends BaseController
{
  public $settings;
  public $pages = [];
  public $subpages = [];

  public function register()
  {
    $this->settings = new SettingsApi();

    $this->setPages();

    $this->setSubPages();

    $this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();
  }

  public function setPages()
  {
    $this->pages = [
      [
        'page_title'    => 'Info Point',
        'menu_title'    => 'InfoPoint',
        'capability'    => 'manage_options',
        'menu_slug'     => 'info_point',
        'callback'      => function() {
          return require_once( "$this->plugin_path/templates/admin.php" );
        },
        'icon_url'      => 'dashicons-store',
        'position'      => 110
      ]
    ];
  }

  public function setSubPages()
  {
    $this->subpages = [
      [
        'parent_slug'   => 'info_point',
        'page_title'    => 'Beratungsstellen',
        'menu_title'    => 'Beratung',
        'capability'    => 'manage_options',
        'menu_slug'     => 'edit.php?post_type=counseling'
      ],
      [
        'parent_slug'   => 'info_point',
        'page_title'    => 'Qualifizierungsstellen',
        'menu_title'    => 'Qualifizierung',
        'capability'    => 'manage_options',
        'menu_slug'     => 'edit.php?post_type=qualification'
      ],
      [
        'parent_slug'   => 'info_point',
        'page_title'    => 'Vermittlungsstellen',
        'menu_title'    => 'Vermittlung',
        'capability'    => 'manage_options',
        'menu_slug'     => 'edit.php?post_type=employment'
      ]
    ];
  }
}
