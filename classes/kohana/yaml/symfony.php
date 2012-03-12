<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Symfony YAML driver. Parses and dumps YAML in native PHP (no extensions needed).
 *
 * @package    YAML
 * @category   Drivers
 * @author     Gabriel Evans <gabriel@codeconcoction.com>
 * @copyright  (c) 2010-2012 Gabriel Evans
 * @license    http://www.opensource.org/licenses/mit-license.php  MIT License
 */
class Kohana_YAML_Symfony extends YAML {

	/**
	 * @var  sfYamlParser
	 */
	protected $_parser;

	/**
	 * @var  sfYamlDumper
	 */
	protected $_dumper;

	/**
	 * Loads required Symfony YAML libraries.
	 */
	public function __construct()
	{
		include_once Kohana::find_file('vendor', 'symfony-yaml/lib/sfYamlParser');
		include_once Kohana::find_file('vendor', 'symfony-yaml/lib/sfYamlDumper');

		// Instantiate and store parser
		$this->_parser = new sfYamlParser;

		// Instantiate and store dumper
		$this->_dumper = new sfYamlDumper;
	}

	public function parse($string)
	{
		return $this->_parser->parse($string);
	}

	public function dump($data)
	{
		return $this->_dumper->dump($data);
	}

}
