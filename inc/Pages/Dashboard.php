<?php
/**
 * @package InfoPoint
 */
namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

class Dashboard extends BaseController
{
  public $settings;
  public $callbacks;
  public $pages     = [];
  /* public $subpages  = []; */

  public function register()
  {
    $this->settings = new SettingsApi();

    $this->callbacks = new AdminCallbacks();

    $this->setPages();

    /* $this->setSubPages(); */

    $this->setSettings();
    $this->setSections();
    $this->setFields();

    /* $this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register(); */
    $this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->register();
  }

  public function setPages()
  {
    $this->pages = [
      [
        'page_title'    => 'Info Point',
        'menu_title'    => 'InfoPoint',
        'capability'    => 'manage_options',
        'menu_slug'     => 'info_point',
        'callback'      => [ $this->callbacks, 'adminDashboard' ],
        'icon_url'      => 'dashicons-store',
        'position'      => 110
      ]
    ];
  }

  /* public function setSubPages() */
  /* { */
  /*   $this->subpages = [ */
  /*     [ */
  /*       'parent_slug'   => 'info_point', */
  /*       'page_title'    => 'Beratungsstellen', */
  /*       'menu_title'    => 'Beratung', */
  /*       'capability'    => 'manage_options', */
  /*       'menu_slug'     => 'edit.php?post_type=counseling' */
  /*     ], */
  /*     [ */
  /*       'parent_slug'   => 'info_point', */
  /*       'page_title'    => 'Qualifizierungsstellen', */
  /*       'menu_title'    => 'Qualifizierung', */
  /*       'capability'    => 'manage_options', */
  /*       'menu_slug'     => 'edit.php?post_type=qualification' */
  /*     ], */
  /*     [ */
  /*       'parent_slug'   => 'info_point', */
  /*       'page_title'    => 'Vermittlungsstellen', */
  /*       'menu_title'    => 'Vermittlung', */
  /*       'capability'    => 'manage_options', */
  /*       'menu_slug'     => 'edit.php?post_type=employment' */
  /*     ] */
  /*   ]; */
  /* } */

  public function setSettings()
  {
    $args = [
      [
        'option_group'    => 'infopoint_settings',
        'option_name'     => 'info_point',
        'callback'        => [ $this->callbacks, 'checkboxSanitize' ],
      ],
    ];

    $this->settings->setSettings( $args );
  }

  public function setSections()
  {
    $args = [
      [
        'id'              => 'info_point_admin_index',
        'title'           => 'Settings',
        'callback'        => [ $this->callbacks, 'infoPointAdminSection' ],
        'page'            => 'info_point',
      ]
    ];

    $this->settings->setSections( $args );
  }

  public function setFields()
  {
    $args = [];

    foreach ($this->features as $key => $value) {
      $args[] = [
        'id'              => $key,
        'title'           => $value,
        'callback'        => [ $this->callbacks, 'checkboxField' ],
        'page'            => 'info_point',
        'section'         => 'info_point_admin_index',
        'args'            => [
          'option_name'   => 'info_point',
          'label_for'     => $key,
          'classes'       => 'ui-toggle',
        ]
      ];
    }

    $this->settings->setFields( $args );
  }
}
