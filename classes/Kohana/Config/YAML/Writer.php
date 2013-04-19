<?php defined('SYSPATH') or die('No direct script access.');
/**
 * YAML configuration file reader and writer.
 *
 * @package    YAML
 * @category   Configuration
 * @copyright  (c) 2010-2012 Gabriel Evans
 * @license    http://www.opensource.org/licenses/mit-license.php  MIT License
 */
class Kohana_Config_YAML_Writer extends Config_YAML_Reader implements Kohana_Config_Writer {

	/**
	 * Writes the passed configuration for `$group`.
	 *
	 * @param   string   $group   The config group
	 * @param   string   $key     The config key to write to
	 * @param   array    $config  The configuration to write
	 * @return  boolean  `FALSE` on failure
	 */
	public function write($group, $key, $config)
	{
		if ($config instanceof Config_Group)
		{
			// Convert config object to array
			$config = $config->as_array();
		}

		$file = Kohana::find_file($this->_directory, $group, 'yml');

		if ($file === FALSE)
		{
			// Create a new file at APPPATH/<directory>/<group>.yml
			$file = APPPATH.DIRECTORY_SEPARATOR.$this->_directory.DIRECTORY_SEPARATOR.$group.'.yml';

			// Initialize YAML config array
			$yaml = array();
		}
		else
		{
			// Load existing configuration
			$yaml = YAML::instance()->parse_file($file);
		}

		// Update configuration key
		$yaml[$key] = $config;

		// Save configuration and return success
		return YAML::instance()->dump_file($file, $yaml);
	}

} // End Config_YAML_Writer
