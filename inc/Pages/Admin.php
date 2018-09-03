<?php
/**
 * @package InfoPoint
 */
namespace Inc\Pages;

use \Inc\Api\SettingsApi;

class Admin
{
  public $settings;
  public $pages = [];
  public $subpages = [];

  public function __construct()
  {
    $this->settings = new SettingsApi();

    $this->pages = [
      [
        'page_title'    => 'Info Point',
        'menu_title'    => 'InfoPoint',
        'capability'    => 'manage_options',
        'menu_slug'     => 'info_point',
        'callback'      => function() { echo '<h1>Info Point Admin</h1>'; },
        'icon_url'      => 'dashicons-store',
        'position'      => 110
      ]
    ];

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

  public function register()
  {
    $this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();
  }
}
