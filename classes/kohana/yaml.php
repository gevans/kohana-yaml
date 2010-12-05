<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Abstract YAML reader. YAML drivers must extend this class.
 */
abstract class Kohana_YAML {

	/**
	 * @var  object  instance of YAML reader
	 */
	public static $instance;

	/**
	 * @var  string  driver name of currently used reader
	 */
	public static $driver;

	/**
	 * YAML reader singleton. If a driver isn't specified, will use YAML extension
	 * (if loaded) or default to Symfony.
	 * @param   string  driver to be used
	 * @return  object  driver instance
	 */
	public static function instance($driver = NULL)
	{
		if ( ! YAML::$instance)
		{
			if ( ! $driver)
			{
				self::$driver =  (extension_loaded('yaml')) ? 'pecl' : 'symfony';
			}
			else
			{
				self::$driver = $driver;
			}
			YAML::$instance = new YAML_.self::$driver;
		}

		return YAML::$instance;
	}

	/**
	 * Parse a YAML string to an array.
	 * @param   string  YAML string to be parsed
	 * @return  array   parsed data
	 */
	abstract public function parse($data);

	/**
	 * Parse a YAML file to an array.
	 * @param   string  file to be read
	 * @return  array   parsed data
	 */
	abstract public function parse_file($filename);

	/**
	 * Convert an array of data into YAML.
	 * @param   array   data to be converted to YAML
	 * @return  string  converted YAML
	 */
	abstract public function dump(array $data);

	/**
	 * Dump an array of data to a YAML file.
	 * @return
	 */
	abstract public function dump_file(array $data, $filename);

}
