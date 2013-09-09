playground
==========

installation

    git clone https://github.com/playground/platform.git
 
    curl -s https://getcomposer.org/installer | php
 
    php composer.phar install
 

Se positionner via shell dans le répertoire vendor/doctrine/doctrine-module/bin.

La commande php doctrine-module.php orm:schema-tool:create permet d'installer les tables de ce module dans la base de données

La commande php doctrine-module.php data-fixture:import --append permet d'installer les rôles 'user' et 'admin' ainsi que l'utilisateur 'admin@test.com' (mot de passe 'admin') avec les droits d'administration.
