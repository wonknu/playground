set :deploy_to,   "/home/ovh/www/#{application}"
server 'ic.adfab.fr', :app, :web, :primary => true

set :scm,         :subversion
set :repository,  "http://94.23.211.86/svnprojects/METAGAME/trunk"

#db param
before "deploy:create_symlink", "deploy:install", "deploy:updaterights", "deploy:updatedb", "deploy:cleanproject"

namespace :deploy do
   desc "Update ic environment parameters & update Composer components"
    task :install do
        run "cd #{release_path}/devops/config && mv icclubmetrolocal.env #{release_path}/config/autoload/local.php"
        run "cd #{release_path}/devops/config && mv .htaccessclubmetro #{release_path}/public/.htaccess"
        run "cd #{release_path}/devops/config && mv adfabcore.ic.env #{release_path}/config/autoload/adfabcore.local.php"
        run "cd #{release_path}/devops/config && mv social.config.ic.env #{release_path}/config/autoload/social.config.php"
        run "cd #{release_path}/devops && cp fonts/* #{shared_path}/data/fonts"
        run "cd #{release_path} && php5 /usr/local/bin/composer update"
    end
   desc "Apache rights update"
    task :updaterights do
        run "sudo chown -R www-data:www-data #{release_path} && sudo chown -R www-data:www-data #{shared_path}/* && sudo chmod -R 775 #{shared_path}/*"
    end
   desc "Database update"
    task :updatedb do
        run "cd #{release_path}/vendor/doctrine/doctrine-module/bin && php5 doctrine-module.php orm:schema-tool:update --force"
    end
   desc "Clean Project"
    task :cleanproject do
        run "rm -rf #{release_path}/devops/ "
        run "rm -rf #{release_path}/build/ "
    end
end
