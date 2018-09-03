<?php
/**
 * @package InfoPoint
 */

namespace Inc\Base;

class EmploymentAgency
{
  /**
   * @var string
   *
   * Set post type params
   */
  private $type           = 'employment';
  private $slug           = 'employments';
  private $name           = 'Vermittlungsstellen';
  private $singular_name  = 'Vermittlungsstelle';

  public function register()
  {
    add_action( 'init', [ $this, 'register_post_type' ] );
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
      'show_in_menu'          => 'edit.php?post_type=employment',
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
}
