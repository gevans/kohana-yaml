# Kohana 3 YAML Module

This module provides an interface for working with YAML files, along with drivers for I18n and configuration support. You
also have the option between using [Symfony YAML](http://components.symfony-project.org/yaml/) or
[php-yaml](http://pecl.php.net/package/yaml) for parsing files.

## Installation

Clone the repository (or add it as the submodule) to your modules directory:

    $ git clone git://github.com/gevans/kohana-yaml.git modules/yaml

Update & initiate submodules (to pull the latest Symfony YAML libraries):

    $ cd modules/yaml
    $ git submodule update --init

Enable the module in your `bootstrap.php` and **optionally**, setup php-yaml.

### php-yaml

On Ubuntu 10.10, install needed packages to build the extension:

    $ aptitude install build-essential php5-dev libyaml-dev

Then, use PECL to install the extension:

    $ pecl install channel://pecl.php.net/yaml-0.6.3

Next, you'll want to enable the extension by creating a file, `/etc/php5/conf.d/yaml.ini`:

    ; configuration for php YAML module
    extension=yaml.so

Save the file, restart your web server, and you should be good to go!
