# Kohana 3.x YAML Config Driver

## Requirements & Installation

1. Install YAML PECL extension: http://pecl.php.net/package/yaml
2. Download or clone this repository to your Kohana modules directory
3. Enable the module in your `bootstrap.php` file
4. Attach the YAML reader:

	Kohana::$config->attach(Config_YAML);

## Example YAML file

`application/config/example.yaml`

	some_key: some_value
	another_key:
	  bars: [ bar1, bar2, bar3 ]
	  text: |
		My text is line
		wrapped!
	items:
	 - id: 1
	   name: item 1
 	 - id: 2
	   name: item 2

## Example Usage

	Kohana::config('example.another_key.bars.1');		// => "bar2"
	Kohana::config('example')->another_key['bars'][1];	// => "bar2"

