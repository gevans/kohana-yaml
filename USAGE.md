## Usage

### Configuration

Place configuration files in your application's `config/` directory, using a `.yml` extension.

    # APPPATH/config/inflector.yml
    uncountable:
     - access
     - advice
     - art
     # ...

    irregular:
     child: children
     clothes: clothing
     man: men
     # ...

Using the above example, you can access `children` using `Kohana::config('inflector.irregular.child')`.

### I18n

Place langauge files in your application's `i18n/` directory, using a `.yml` extension:

    # APPPATH/i18n/es.yml
    Spanish: Español
    Hello, world!: ¡Hola, mundo!

### General

If you're using YAML for something other than I18n and configuration, you can use the YAML through `YAML::instance()` which
will return an instantiated driver class of either Symfony or php-yaml, depending on whether php-yaml is available.

### Parsing

`YAML::instance()->parse($data)` will parse YAML from a string and return it as an array.

`YAML::instance()->parse_file($filename)` will parse YAML from a specified file and return it as an array.

### Dumping

`YAML::instance()->dump($data)` will convert a string into YAML.

`YAML::instance()->dump_file($filename, $data)` will convert a string into YAML and save it to a specified file.

## Further Reading

 * [The Official YAML Web Site](http://www.yaml.org/)
 * [YAML Syntax](http://en.wikipedia.org/wiki/YAML#Syntax) on Wikipedia
 * [php-yaml documentation](http://php.net/manual/en/book.yaml.php)
 * [Symfony YAML](http://components.symfony-project.org/yaml/)
