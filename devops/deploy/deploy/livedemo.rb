set :deploy_to,   "/home/www/#{application}"
server 'livedemo.fr', :app, :web, :primary => true

set :scm,         :subversion
set :repository,  "http://94.23.211.86/svnprojects/METAGAME/trunk"


#db param
before "deploy:create_symlink", "deploy:install", "deploy:updaterights", "deploy:updatedb", "deploy:cleanproject"

namespace :deploy do
   desc "Update des composant Composer et env Re7 adapt"
    task :install do
        run "cd #{release_path}/devops/config && mv Re7clubmetro.env #{release_path}/config/autoload/local.php"
        run "cd #{release_path}/devops/config && mv .htaccesslivedemoclubmetro #{release_path}/public/.htaccess"
        run "cd #{release_path}/devops/config && mv adfabcore.livedemo.env #{release_path}/config/autoload/adfabcore.local.php"
        run "cd #{release_path}/devops/config && mv social.config.livedemo.env #{release_path}/config/autoload/social.config.php"
        run "cd #{release_path}/devops && cp fonts/* #{shared_path}/data/fonts"
        run "cd #{release_path} && composer update"
    end
   desc " Mise a jour des droits apache"
    task :updaterights do
        run "sudo chown -R www-data:www-data #{release_path} && sudo chown -R www-data:www-data #{shared_path}/* && sudo chmod -R 775 #{shared_path}/*"
    end
   desc " Mise a jour de la base de donnees"
    task :updatedb do
        run "cd #{release_path}/vendor/doctrine/doctrine-module/bin && php doctrine-module.php orm:schema-tool:update --force"
    end
   desc "Clean Project"
    task :cleanproject do
        run "rm -rf #{release_path}/devops/ "
        run "rm -rf #{release_path}/build/ "
    end
end
