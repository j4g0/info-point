<?php
/**
 * @package InfoPoint
 */

namespace Inc;

final class Init
{
  /**
   * Store all classes inside an array
   * @return  Full list of classes
   */
  private static function get_services()
  {
    return [
      Pages\Admin::class,
      Base\CounselingsController::class,
      Base\EmploymentsController::class,
      Base\QualificationsController::class,
      Api\AdvancedCustomFields::class,
    ];
  }

  /*
   * Loop through classes, initialize them,
   * and call the register() method if existant
   * @return
   */
  public static function register_services()
  {
    foreach ( self::get_services() as $class ) {
      $service = self::instantiate( $class );
      if ( method_exists( $service, 'register' ) ) {
        $service->register();
      }
    }
  }

  /**
   * Initialize the class
   * @params  class $class    class from the services array
   * @return  class instance  new instance of the class
   */
  private static function instantiate( $class )
  {
    return new $class();
  }
}
