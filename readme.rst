STUB, a simple project bootstrap
=============================

A simple starter project using Silex, Twig and Codeception.
Includes Vagrant environment for quick startup.

Silex works with PHP 5.3.3 or later.

Requirements
------------

Install virtualbox
Install vagrant

Installation
------------

.. code-block:: bash

    git clone https://github.com/grumpysi/stub-starter.git newProjectName

Alternatively, you can download the `https://github.com/grumpysi/stub-starter/archive/master.zip` file and extract it.


Add `192.168.10.11 stub.dev` to your hosts file

.. code-block:: bash

    sudo nano /private/etc/hosts


.. code-block:: bash

    cd newProjectName
    vagrant up


Finally open `http://stub.dev` in your browser.

Tests
-----

To run the test suite, you need `Composer`_:

.. code-block:: bash

    $ php composer.phar install --dev
    $ vendor/bin/codecept run


License
-------

Silex is licensed under the MIT license.

.. _Symfony2 components: http://symfony.com
.. _Composer:            http://getcomposer.org
.. _silex.zip:           http://silex.sensiolabs.org/download
.. _documentation:       http://silex.sensiolabs.org/documentation
