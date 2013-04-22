<?php defined('SYSPATH') or die('No direct script access.');
/**
 * YAML driver using native extension from PECL for parsing and dumping.
 *
 * [!!] You must install and enable the [yaml](pecl.php.net/package/yaml) extension to use this driver.
 *
 * @package    YAML
 * @category   Drivers
 * @author     Gabriel Evans <gabriel@codeconcoction.com>
 * @copyright  (c) 2010-2012 Gabriel Evans
 * @license    http://www.opensource.org/licenses/mit-license.php  MIT License
 */
class Kohana_YAML_PECL extends YAML {

	public function parse($string)
	{
		return yaml_parse($string);
	}

	public function dump($data)
	{
		return yaml_emit($data, (Kohana::$charset == 'utf-8') ? YAML_UTF8_ENCODING : YAML_ANY_ENCODING);
	}

	public function dump_file($filename, $data, $inline = 0)
	{
		return yaml_emit_file($filename, $data, (Kohana::$charset == 'utf-8') ? YAML_UTF8_ENCODING : YAML_ANY_ENCODING);
	}

} // End YAML_PECL