<?php

/**
 * Project Config data interface.
 *
 * Used to define the way Config item is retrieved from the Config file.
 *
 * @package EightshiftLibs\Config
 */

declare(strict_types=1);

namespace EightshiftLibs\Config;

/**
 * Interface ConfigDataInterface
 */
interface ConfigDataInterface
{

	/**
	 * Method that returns project name.
	 *
	 * Generally used for naming assets handlers, languages, etc.
	 */
	public static function getProjectName(): string;

	/**
	 * Method that returns project version.
	 *
	 * Generally used for versioning asset handlers while enqueueing them.
	 */
	public static function getProjectVersion(): string;

	/**
	 * Method that returns project prefix.
	 *
	 * The WordPress filters live in a global namespace, so we need to prefix them to avoid naming collisions.
	 *
	 * @return string Full path to asset.
	 */
	public static function getProjectPrefix(): string;

	/**
	 * Return project absolute path.
	 *
	 * If used in a theme use get_template_directory() and in case it's used in a plugin use __DIR__.
	 *
	 * @param string $path Additional path to add to project path.
	 *
	 * @return string
	 */
	public static function getProjectPath(string $path = ''): string;

	/**
	 * Method that returns every string prefixed with project prefix based on project type.
	 * It converts all spaces and "_" with "-", also it converts all characters to lowercase.
	 *
	 * @param string $key String key to append prefix on.
	 *
	 * @return string Returns key prefixed with project prefix.
	 */
	public static function getConfig(string $key): string;
}