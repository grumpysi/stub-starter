STUB, a simple project bootstrap
================================
[![Build Status](https://travis-ci.org/grumpysi/stub-starter.png)](https://travis-ci.org/grumpysi/stub-starter)

A simple starter project using Silex, Twig and Codeception.
Includes Vagrant environment for quick startup.  Silex works with PHP 5.3.3 or later.

## Setup using Vagrant (optional)

 * Download and install Vagrant by following the instructions [here](http://downloads.vagrantup.com/)
 * Download VirtualBox [here](https://www.virtualbox.org/wiki/Downloads) and run the installer
 * If you are using Windows you need to run VirtualBox as an Administrator
 * Set up Git by following the instructions [here](https://help.github.com/articles/set-up-git).
 * Download and install Composer by following the instructions [here](http://getcomposer.org/download/).
 * Run `git clone https://github.com/grumpysi/stub-starter.git newProjectName` and git will create the project for you.
 * Change directory to new project `cd newProjectName`
 * Run `vagrant up` to set up your development environment.
 * You're done!, Navigate to `http://localhost:31415` to see your application.
 * You can also use `http://stub.dev` by adding `192.168.10.11 stub.dev` to your hosts file via `sudo nano /private/etc/hosts`


For more information on Composer and Vagrant:

* [Composer documentation](http://getcomposer.org/doc/)
* [Vagrant documentation](http://docs.vagrantup.com/v2/)

## Tests

To run the test suite, you need [Composer](http://getcomposer.org/doc/)

Note: Acceptance tests only work for Starter-KIT 001

```php
php composer.phar install --dev
vendor/bin/codecept run
```

## Starter KITs

Starter KITS are like packaged app themes.  They give you a quick starting point for your project.

You can switch Starter-KITS by the following commands

```php
php stub kit:switch --kit=002
```

There are currently 2 Starter-KITS
* 001 - Flat theme ( Simple responsive bootstrap 3 site )
* 002 - Single page theme ( One page responsive bootstrap 3 site )

License
-------

Silex is licensed under the MIT license.

Symfony2 components: http://symfony.com
Composer:            http://getcomposer.org
Silex:               http://silex.sensiolabs.org/download
documentation:       http://silex.sensiolabs.org/documentation
