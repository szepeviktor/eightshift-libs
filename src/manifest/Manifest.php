<?php
/**
 * File containing an abstract class for holding Assets Manifest functionality.
 *
 * It is used to provide manifest.json file location used with Webpack to fetch correct file locations.
 *
 * @package EightshiftLibs\Manifest
 */

declare( strict_types=1 );

namespace EightshiftLibs\Manifest;

use EightshiftLibs\Core\ServiceInterface;
use EightshiftLibs\Exception\FinalInvalidManifest;
use EightshiftLibs\Manifest\ManifestDataInterface;
use EightshiftLibs\Core\ConfigDataInterface;

/**
 * Abstract class Manifest class.
 */
class Manifest implements ServiceInterface, ManifestDataInterface {

  /**
   * Manifest item filter name constant.
   *
   * @var string
   */
  const MANIFEST_ITEM_FILTER_NAME = 'manifest-item';

  /**
   * Instance variable of project config data.
   *
   * @var ConfigDataInterface
   */
  protected $config;

  /**
   * Full data of manifest items.
   *
   * @var array
   */
  protected $manifest = [];

  /**
   * Create a new instance that injects config data to get project specific details.
   *
   * @param ConfigDataInterface $config Inject config which holds data regarding project details.
   */
  public function __construct( ConfigDataInterface $config ) {
    $this->config = $config;
  }

  /**
   * Register all hooks. Changed filter name to manifest.
   *
   * @return void
   */
  public function register() {
    add_action( 'init', [ $this, 'set_assets_manifest_raw' ] );
    add_filter( $this->config->get_config( static::MANIFEST_ITEM_FILTER_NAME ), [ $this, 'get_assets_manifest_item' ] );
  }

  /**
   * Set the manifest data with site url prefix.
   * You should never call this method directly instead you should call $this->manifest.
   *
   * @throws FinalInvalidManifest Throws error if manifest.json file is missing.
   *
   * @return void Sets the manifest variable.
   */
  public function set_assets_manifest_raw() : void {
    $path = $this->config->get_project_path() . '/public/manifest.json';

    if ( ! file_exists( $path ) ) {
      throw FinalInvalidManifest::missing_manifest_exception( $path );
    }

    $data = json_decode( implode( ' ', (array) file( $path ) ), true );

    if ( empty( $data ) ) {
      return;
    }

    $this->manifest = array_map(
      function( $manifest_item ) {
        return "{$this->get_assets_manifest_output_prefix()}{$manifest_item}";
      },
      $data
    );
  }

  /**
   * Return full path for specific asset from manifest.json.
   *
   * @param string $key File name key you want to get from manifest.
   *
   * @throws FinalInvalidManifest Throws error if manifest key is missing. Returned data from manifest and not global variable.
   *
   * @return string Full path to asset.
   */
  public function get_assets_manifest_item( string $key ) : string {
    $manifest = $this->manifest;

    if ( ! isset( $manifest[ $key ] ) ) {
      throw FinalInvalidManifest::missing_manifest_item_exception( $key );
    }

    return $manifest[ $key ];
  }

  /**
   * Config getter
   *
   * @return ConfigDataInterface|object
   */
  public function get_config() {
    return $this->config;
  }

  /**
   * This method appends full site url to the relative manifest data item.
   *
   * @return string
   */
  protected function get_assets_manifest_output_prefix() : string {
    return site_url();
  }
}
