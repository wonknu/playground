playground
==========

Welcome to Playground an Open Source Game Platform tool.

This document contains information on how to download, install, and start using Playground.

Important Note: this application is not production ready and is intended for evaluation and development only!

Requirements
Playground requires Zend Framework 2, Doctrine 2 and PHP 5.3.3 or above.

Installation


    git clone https://github.com/gegorybesson/playground.git
 
    cd playground/config/autoload and create local.php using local.php.dist as example. Update database name and credentials (don't forget to create the database before going further). Alternatively local.xml can be created automatically on the next step when run composer install command, you will be able to customize all the values interactively.
 
    cd ../..
 
    curl -s https://getcomposer.org/installer | php
 
    php composer.phar install
 
Initialize application with install script (for Linux and Mac OS install.sh, for Windows install.bat)
After installation you can login as application administrator using user email "admin@test.com" and password "admin".