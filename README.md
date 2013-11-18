Playground [![Develop Branch Build Status](https://secure.travis-ci.org/gregorybesson/playground.png?branch=develop)](http://travis-ci.org/gregorybesson/playground)
==========

Welcome to Playground an Open Source Game Platform tool.

This document contains information on how to download, install, and start using Playground.

Important Note: this application is not production ready and is intended for evaluation and development only!

Requirements
Playground requires Zend Framework 2, Doctrine 2 and PHP 5.3.3 or above.

##Installation

### Install the codebase

    git clone https://github.com/gregorybesson/playground
 
Go to the playground/config/autoload directory and create local.php using local.php.dist as example. 
Update database name and credentials (don't forget to create the database before going further). 

Alternatively local.xml can be created automatically on the next step when run composer install command, you will be able to customize all the values interactively.

### Install Composer
#### Windows
 
install Composer using the installer found here : https://getcomposer.org/Composer-Setup.exe
Once Composer installed, in playground directory :

    composer install

#### Linux
    
    curl -s https://getcomposer.org/installer | php
 
    php composer.phar install
    
### Initialize datas
Initialize application with install script (for Linux and Mac OS install.sh, for Windows install.bat)
Initialize application with demo data with install script (for Linux and Mac OS install_demo.sh, for Windows install_demo.bat (git and php must be in your PATH))

You'll have to give executable rights on update.sh and install.sh batchs. (chmod 755 *.sh)
and read and write rights for directory and subdirectories of data and design (chmod 777 -R data design)

After installation you can login as application administrator using user email "admin@test.com" and password "playground".

### Configure your webserver
#### Apache

You can create a virtual host 

    <VirtualHost *:80>
        ServerName playground.local
        DocumentRoot c:\Users\gbesson\playground\public
        SetEnv APPLICATION_ENV "development"
        <Directory c:\Users\gbesson\playground\public>
            DirectoryIndex index.php
		    Options Indexes FollowSymLinks Includes ExecCGI
            AllowOverride All
            Order allow,deny
            Allow from all
        </Directory>
    </VirtualHost>
    
Notice that your web site root is under "public" directory

Once done, don't forget to update your hosts file (Windows file : \Windows\System32\direvers\etc\hosts)

    127.0.0.1	playground.local


