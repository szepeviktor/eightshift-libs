<?php
/**
 * File containing the invalid callback exception class
 *
 * @package Eightshift_Libs\Exception
 */

declare( strict_types=1 );

namespace Eightshift_Libs\Exception;

/**
 * Class Invalid_Callback.
 *
 * @since 0.1.0
 */
class Invalid_Callback extends \InvalidArgumentException implements General_Exception {

  /**
   * Create a new instance of the exception for a callback class name that is
   * not recognized.
   *
   * @param string $callback Class name of the callback that was not recognized.
   *
   * @return static
   *
   * @since 0.1.0
   */
  public static function from_callback( $callback ) {
    $message = sprintf(
      esc_html__( 'The callback %s is not recognized and cannot be registered.', 'eightshift-libs' ),
      is_object( $callback )
        ? get_class( $callback )
        : (string) $callback
    );

    return new static( $message );
  }
}
