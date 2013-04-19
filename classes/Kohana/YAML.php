<?php defined('SYSPATH') or die('No direct script access.');
/**
 * YAML reader and writer.
 *
 * [!!] YAML drivers must extend this class.
 *
 * @package    YAML
 * @author     Gabriel Evans <gabriel@codeconcoction.com>
 * @copyright  (c) 2010-2012 Gabriel Evans
 * @license    http://www.opensource.org/licenses/mit-license.php  MIT License
 */
abstract class Kohana_YAML {

	/**
	 * @var  object  Instance of YAML driver
	 */
	public static $_instance;

	/**
	 * Retrieves an instance of `YAML`. If a driver isn't specified, it will
	 * use the best available driver.
	 *
	 * @param   string  $driver  Driver to use
	 * @return  object  Driver instance
	 */
	public static function instance($driver = NULL)
	{
		if ( ! YAML::$_instance)
		{
			if ($driver === NULL)
			{
				// Determine best available driver
				$driver = (extension_loaded('yaml')) ? 'PECL' : 'Symfony';
			}

			// Prefix driver name
			$driver = 'YAML_'.ucfirst($driver);

			// Store the instantiated driver
			YAML::$_instance = new $driver;
		}

		// Return stored YAML driver
		return YAML::$_instance;
	}

	/**
	 * Parses a YAML string into an array.
	 *
	 * @param   string  $string  YAML string to parse
	 * @return  array   Parsed data
	 */
	abstract public function parse($string);

	/**
	 * Parses a YAML file into an array.
	 *
	 * @param   string   $filename  File to read
	 * @param   boolean  $evaluate  Evaluate PHP tags?
	 * @return  array    Parsed data
	 */
	public function parse_file($filename, $evaluate = FALSE)
	{
		if ($evaluate)
		{
			// Capture the file output
			ob_start();

			try
			{
				include $filename;
			}
			catch (Exception $e)
			{
				// Delete the output buffer
				ob_end_clean();

				// Re-throw the exception
				throw $e;
			}

			// Get the captured output and close the buffer
			$data = ob_get_clean();
		}
		else
		{
			// Read the files contents
			$data = file_get_contents($filename);
		}

		// Return parsed file
		return $this->parse($data);
	}

	/**
	 * Serializes provided data into YAML.
	 *
	 * @param   mixed   $data  Input data
	 * @return  string  Serialized YAML
	 */
	abstract public function dump($data);

	/**
	 * Serializes and stores provided data as YAML.
	 *
	 * @param   string   $filename  File to save
	 * @param   mixed    $data      Input data
	 * @return  boolean  `FALSE` on failure
	 */
	public function dump_file($filename, $data, $inline = 0)
	{
		return (boolean) file_put_contents($filename, $this->dump($data, $inline));
	}

} // End YAML