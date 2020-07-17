<?php
/**
 * File that holds the registrable interface.
 *
 * @package EightshiftLibs\Core
 */

declare( strict_types=1 );

namespace EightshiftLibs\Core;

/**
 * Interface Registrable.
 *
 * An object that can be registered.
 *
 * @since 0.1.0
 */
interface RegistrableInterface {

  /**
   * Register the current registrable.
   *
   * A register method holds the plugin action and filter hooks.
   * Following the single responsibility principle, every class
   * holds a functionality for a certain part of the plugin.
   * This is why every class should hold its own hooks.
   *
   * @return void
   *
   * @since 0.8.0 Removing type hinting void for php 7.0.
   * @since 0.1.0
   */
  public function register();
}
