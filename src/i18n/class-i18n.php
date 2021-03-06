<?php
/**
 * The Language specific functionality.
 *
 * @since   1.0.0
 * @package Eightshift_Libs\I18n
 */

declare( strict_types=1 );

namespace Eightshift_Libs\I18n;

use Eightshift_Libs\Core\Service;
use Eightshift_Libs\Core\Config_Data;

/**
 * Class i18n
 *
 * This class handles theme or admin languages.
 *
 * @since 1.0.0
 */
class I18n implements Service {

  /**
   * Instance variable of project config data.
   *
   * @var object
   *
   * @since 2.0.0
   */
  protected $config;

  /**
   * Create a new instance.
   *
   * @param Config_Data $config Inject config which holds data regarding project details.
   *
   * @since 2.0.0
   */
  public function __construct( Config_Data $config ) {
    $this->config = $config;
  }

  /**
   * Register all the hooks
   *
   * @return void
   *
   * @since 1.0.0
   */
  public function register() {
    add_action( 'after_setup_theme', [ $this, 'load_theme_textdomain' ] );
  }

  /**
   * Load the plugin text domain for translation.
   *
   * @return void
   *
   * @since 1.0.0
   */
  public function load_theme_textdomain() {
    \load_theme_textdomain(
      $this->config->get_project_name(),
      $this->config->get_project_path( '/src/i18n' )
    );
  }
}
