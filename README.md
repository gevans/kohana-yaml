# Kohana 3.x YAML Module

YAML stands for YAML Ain't a Markup Language. Enjoy easy to understand syntax
even your boss will be able to read and write! This module will let you write
your Kohana config and i18n files in YAML.

## Installation

Clone the repository (or add it as a submodule) to your modules directory:

    $ git clone git://github.com/gevans/kohana-yaml.git modules/yaml

Update & initiate submodules (to get the latest Symfony YAML libraries):

    $ cd modules/yaml
    $ git submodule update --init

Enable the module in your `bootstrap.php`:

```php
<?php
Kohana::modules(array(
    'yaml' => MODPATH.'yaml', // YAML config & i18n reader
    // ...
));
```

**Optionally**, you can compile php-yaml.

## General Usage

### Configuration

You can write your config files in YAML like so:

```yaml
# This is a comment
some_key: some_value
group:
  # Don't forget the PHP_EOL or PHP will mess you *and* the line breaks up:
  dynamic_key: <?= 'PHP!'.PHP_EOL ?>
  another_key: another_value
```

Save the files as `config/<filename>.yml` and Kohana will be able to read them as
usual.

### I18n

I18n is just as easy as the last part was. Just save your `.yml` files in the
`i18n/` while the module does that rest. For example:

```yaml
# i18n/es.yml
"Hola, :name!": "Hello, :name!"
Yo no hablo Español.: I don't speak Spanish.
Wait. What?: Espere. ¿Qué?
```

After that, using `__('Yo no hablo Español.')` returns `I don't speak Spanish.`
Having fun yet?

You can read [The Official YAML Web Site](http://www.yaml.org/) for more
advanced syntax.

## Optionally, install YAML extension (*nix only)

You can enjoy better performance and faster YAML parsing by installing the
native [YAML](http://pecl.php.net/package/yaml) extension.

### Ubuntu

On Ubuntu, install some packages to build the extension:

    $ sudo apt-get install build-essential php5-dev libyaml-dev

Then, use PECL to install the extension:

    $ sudo pecl install channel://pecl.php.net/yaml-1.0.1

You'll need to enable the newly installed extension. On Ubuntu, you can do so by
creating a new file called `/etc/php5/conf.d/yaml.ini` or adding to
your `php.ini`:

```ini
; configuration for YAML extension
extension=yaml.so
```

Save the file, restart your web server, and you should be good to go!

### Mac OSX

Using Homebrew, you can install the YAML extension from
_[@josegonzalez](https://github.com/josegonzalez)_'s
[homebrew-php](https://github.com/josegonzalez/homebrew-php) repository:

    $ brew install https://raw.github.com/josegonzalez/homebrew-php/master/Formula/yaml-php.rb
    ######################################################################## 100.0%
    ==> Downloading http://pecl.php.net/get/yaml-1.0.1.tgz
    ==> phpize
    ==> ./configure --prefix=/usr/local/Cellar/yaml-php/1.0.1
    ==> make
    ==> Caveats
    To finish installing yaml-php:
      * Add the following line to /usr/local/etc/php.ini:
        extension="/usr/local/Cellar/yaml-php/1.0.1/yaml.so"
      * Restart your webserver.
      * Write a PHP page that calls "phpinfo();"
      * Load it in a browser and look for the info on the yaml module.
      * If you see it, you have been successful!
    ==> Summary
    /usr/local/Cellar/yaml-php/1.0.1: 4 files, 76K, built in 4 seconds
