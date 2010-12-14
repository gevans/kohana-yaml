<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Symfony YAML driver. Parses and dumps YAML in native PHP (no extensions needed).
 *
 * @package    Kohana/YAML
 * @category   Drivers
 * @author     Gabriel Evans <gabriel@codeconcoction.com>
 * @copyright  (c) 2010 Gabriel Evans
 * @license    http://www.opensource.org/licenses/mit-license.php  MIT License
 */
class Kohana_YAML_Symfony extends YAML {

	// Symfony YAML parser instance
	protected $_parser;

	// Symfony YAML dumper instance
	protected $_dumper;

	// instantiates needed libraries
	protected function __construct()
	{
		include_once Kohana::find_file();

		$this->_parser = new sfYamlParser;
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
