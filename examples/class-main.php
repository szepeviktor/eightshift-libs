<?php
/**
 * The file that defines the main start class
 *
 * A class definition that includes attributes and functions used across both the
 * theme-facing side of the site and the admin area.
 *
 * @since   1.0.0
 * @package Custom_Namespace\Core
 */

namespace Custom_Namespace\Core;

use Eightshift_Libs\Core\Main as LibMain;

use Custom_Namespace\Admin;
use Custom_Namespace\Blocks;

/**
 * The main start class.
 *
 * This is used to define admin-specific hooks, and
 * theme-facing site hooks.
 *
 * Also maintains the unique identifier of this theme as well as the current
 * version of the theme.
 */
class Main extends LibMain {

  /**
   * Get the list of services to register.
   *
   * A list of classes which contain hooks.
   *
   * @return array<string> Array of fully qualified class names.
   */
  public function get_service_classes() : array {
    return [
      Admin\Faq_Post_Type::class,
      Admin\Faq_Taxonomy::class,
      Blocks\Faq_Taxonomy::class,
    ];
  }
}
