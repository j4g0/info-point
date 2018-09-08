<?php
/**
 * @package InfoPoint
 */
namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
  public $settings;
  public $callbacks;
  public $pages     = [];
  public $subpages  = [];

  public function register()
  {
    $this->settings = new SettingsApi();

    $this->callbacks = new AdminCallbacks();

    $this->setPages();

    $this->setSubPages();

    $this->setSettings();
    $this->setSections();
    $this->setFields();

    $this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();

    add_filter( 'admin_head', [ $this, 'menuHighlight' ]);
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

  public function setSettings()
  {
    $args = [
      [
        'option_group'    => 'info_point_options_group',
        'option_name'     => 'text_example',
        'callback'        => [ $this->callbacks, 'infoPointOptionsGroup' ],
      ],
      [
        'option_group'    => 'info_point_options_group',
        'option_name'     => 'first_name',
      ]
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
    $args = [
      [
        'id'              => 'text_example',
        'title'           => 'Text Example',
        'callback'        => [ $this->callbacks, 'infoPointTextExample' ],
        'page'            => 'info_point',
        'section'         => 'info_point_admin_index',
        'args'            => [
          'label_for'     => 'text_example',
          'class'         => 'example-class',
        ]
      ],
      [
        'id'              => 'first_name',
        'title'           => 'First Name',
        'callback'        => [ $this->callbacks, 'infoPointFirstName' ],
        'page'            => 'info_point',
        'section'         => 'info_point_admin_index',
        'args'            => [
          'label_for'     => 'first_name',
          'class'         => 'example-class',
        ]
      ]
    ];

    $this->settings->setFields( $args );
  }

  public function menuHighlight()
  {
    global $parent_file, $submenu_file, $post_type;

    if ('counseling' == '$post_type') {
      $parent_file = 'info_point';
      $submenu_file = 'wc-settings';
    }
  }
}
