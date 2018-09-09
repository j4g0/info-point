<?php
/**
 * @package InfoPoint
 */

namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

class CounselingsController extends BaseController
{
  public $settings;
  public $callbacks;
  public $subpages        = [];

  /**
   * @var string
   *
   * Set post type params
   */
  private $type           = 'counseling';
  private $slug           = 'counselings';
  private $name           = 'Beratungsstellen';
  private $singular_name  = 'Beratungsstelle';

  public function register()
  {
    $option     = get_option( 'info_point' );
    $activated  = isset( $option['counseling'] ) ? ($option['counseling'] ? true : false) : false;

    if (!$activated) {
      return;
    }

    $this->settings = new SettingsApi();

    $this->callbacks = new AdminCallbacks();

    $this->setSubPages();

    add_action( 'init', [ $this, 'register_post_type' ] );
    add_shortcode( 'ip_beratung', [ $this, 'shortcode' ] );

    $this->settings->addSubPages( $this->subpages )->register();
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
    ];
  }


  /**
   * Register custom post type
   */
  public function register_post_type()
  {
    $labels = [
      'name'                  => $this->name,
      'singular_name'         => $this->singular_name,
      'add_new'               => 'Add New',
      'add_new_item'          => 'Add New '   . $this->singular_name,
      'edit_item'             => 'Edit '      . $this->singular_name,
      'new_item'              => 'New '       . $this->singular_name,
      'all_items'             => 'All '       . $this->name,
      'view_item'             => 'View '      . $this->name,
      'search_items'          => 'Search '    . $this->name,
      'not_found'             => 'No '        . strtolower($this->name) . ' found',
      'not_found_in_trash'    => 'No '        . strtolower($this->name) . ' found in Trash',
      'parent_item_colon'     => '',
      'menu_name'             => $this->name
    ];

    $args = [
      'labels'                => $labels,
      'public'                => true,
      'publicly_queryable'    => false,
      'show_ui'               => true,
      'show_in_menu'          => 'edit.php?post_type=counseling',
      'query_var'             => true,
      'rewrite'               => array( 'slug' => $this->slug ),
      'capability_type'       => 'post',
      'has_archive'           => true,
      'hierarchical'          => true,
      'menu_position'         => 8,
      'supports'              => array('title'),
      'yarpp_support'         => true
    ];

    register_post_type( $this->type, $args );
  }

  public function shortcode()
  {
    return require_once( "$this->plugin_path/templates/counselings.php" );
  }
}
