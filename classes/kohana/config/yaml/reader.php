<?php defined('SYSPATH') or die('No direct script access.');
/**
 * YAML configuration file reader.
 *
 * @package    YAML
 * @category   Configuration
 * @copyright  (c) 2010-2012 Gabriel Evans
 * @license    http://www.opensource.org/licenses/mit-license.php  MIT License
 */
class Kohana_Config_YAML_Reader implements Kohana_Config_Reader {

	/**
	 * @var  string  The directory where config files are located
	 */
	protected $_directory;

	/**
	 * Creates a new YAML file reader using the given directory as a config source.
	 *
	 * @param  string  $directory  Configuration directory to search
	 */
	public function __construct($directory = 'config')
	{
		// Set the configuration directory name
		$this->_directory = trim($directory, '/');
	}

	/**
	 * Load and merge all of the configuration files in this group.
	 *
	 * @param   string  $group  Configuration group name
	 * @return  array   Loaded configuration
	 */
	public function load($group)
	{
		// Initialize the config array
		$config = array();

		if ($files = Kohana::find_file($this->_directory, $group, 'yml', TRUE))
		{
			foreach ($files as $file)
			{
				$config = Arr::merge($config, YAML::instance()->parse_file($file, TRUE));
			}
		}

		return $config;
	}

} // End Config_YAML_Reader
