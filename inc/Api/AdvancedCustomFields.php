<?php
/**
 * @package InfoPoint
 */
namespace Inc\Api;

use Inc\Base\BaseController;

class AdvancedCustomFields extends BaseController
{
  public function register()
  {
    // Include acf plugin
    include_once( "$this->plugin_path/lib/advanced-custom-fields/acf.php" );

    // Add the filters required by acf
    add_filter( 'acf/settings/path', [ $this, 'ip_acf_settings_path' ] );
    add_filter( 'acf/settings/dir', [ $this, 'ip_acf_settings_dir' ] );

    // Hide acf plugin menu
    if ( !defined( 'ACF_LITE' ) ) define( 'ACF_LITE', true );

    $this->registerFieldGroups();
  }

  public function ip_acf_settings_path( $path )
  {
    $path = get_stylesheet_directory() . '/acf/';

    return $path;
  }

  public function ip_acf_settings_dir( $dir )
  {
    $dir = get_stylesheet_directory_uri() . '/acf/';

    return $path;
  }

  protected function registerFieldGroups()
  {
    $this->registerCounselingsFieldGroup();
    $this->registerQualificationFieldGroup();
    $this->registerEmploymentFieldGroup();
  }

	protected function registerCounselingsFieldGroup()
  {
    if(function_exists("register_field_group")) {
      register_field_group(array (
        'id' => 'acf_beratungsstellen',
        'title' => 'Beratungsstellen',
        'fields' => array (
          array (
            'key' => 'field_5b8a1df9a9099',
            'label' => 'Schwerpunkt',
            'name' => 'schwerpunkt',
            'type' => 'text',
            'required' => 1,
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_5b8a1e3fa909a',
            'label' => 'Organisation',
            'name' => 'organisation',
            'type' => 'text',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_5b8a1e86a909b',
            'label' => 'Telefon Nummer',
            'name' => 'telefon',
            'type' => 'text',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_5b8a1e99a909c',
            'label' => 'Email',
            'name' => 'email',
            'type' => 'text',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
        ),
        'location' => array (
          array (
            array (
              'param' => 'post_type',
              'operator' => '==',
              'value' => 'counseling',
              'order_no' => 0,
              'group_no' => 0,
            ),
          ),
        ),
        'options' => array (
          'position' => 'normal',
          'layout' => 'no_box',
          'hide_on_screen' => array (
          ),
        ),
        'menu_order' => 0,
      ));
    }
  }

  protected function registerQualificationFieldGroup()
  {
    if(function_exists("register_field_group")) {
			register_field_group(array (
				'id' => 'acf_qualifizierungsstellen',
				'title' => 'Qualifizierungsstellen',
				'fields' => array (
					array (
						'key' => 'field_5b9385065b9b7',
						'label' => 'Schwerpunkt',
						'name' => 'schwerpunkt',
						'type' => 'text',
						'required' => 1,
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5b9385175b9b8',
						'label' => 'Organisation',
						'name' => 'organisation',
						'type' => 'text',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5b93851e5b9b9',
						'label' => 'Telefon',
						'name' => 'telefon',
						'type' => 'text',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5b9385265b9ba',
						'label' => 'Email',
						'name' => 'email',
						'type' => 'email',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
					),
				),
				'location' => array (
					array (
						array (
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'qualification',
							'order_no' => 0,
							'group_no' => 0,
						),
					),
				),
				'options' => array (
					'position' => 'normal',
					'layout' => 'no_box',
					'hide_on_screen' => array (
					),
				),
				'menu_order' => 0,
			));
		}
  }

  protected function registerEmploymentFieldGroup()
  {
    if(function_exists("register_field_group")) {
      register_field_group(array (
        'id' => 'acf_vermittlungsstellen',
        'title' => 'Vermittlungsstellen',
        'fields' => array (
          array (
            'key' => 'field_5b93854f61116',
            'label' => 'Schwerpunkt',
            'name' => 'schwerpunkt',
            'type' => 'text',
            'required' => 1,
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_5b93855a61117',
            'label' => 'Organisation',
            'name' => 'organisation',
            'type' => 'text',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_5b93856161118',
            'label' => 'Telefon',
            'name' => 'telefon',
            'type' => 'text',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_5b93856e61119',
            'label' => 'Email',
            'name' => 'email',
            'type' => 'email',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
          ),
        ),
        'location' => array (
          array (
            array (
              'param' => 'post_type',
              'operator' => '==',
              'value' => 'employment',
              'order_no' => 0,
              'group_no' => 0,
            ),
          ),
        ),
        'options' => array (
          'position' => 'normal',
          'layout' => 'no_box',
          'hide_on_screen' => array (
          ),
        ),
        'menu_order' => 0,
      ));
    }
  }
}
