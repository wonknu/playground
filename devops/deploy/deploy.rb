set :stages, %w(ic livedemo preprodmetro)
set :default_stage, "ic"
require 'capistrano/ext/multistage'

set :application, "clubmetro"
#set :user, "www-data"
#set :group, "www-data"

#set :scm,         :subversion
#set :repository,  "http://94.23.211.86/svnprojects/METAGAME/trunk"
set :deploy_via, :export

set :shared_assets, %w{data data/DoctrineORMModule data/cache data/captcha data/fonts data/mail data/DoctrineORMModule/Proxy}

namespace :assets  do
  namespace :symlinks do
    desc "Setup application symlinks for shared assets"
    task :setup, :roles => [:app, :web] do
      shared_assets.each { |link| run "mkdir -p #{shared_path}/#{link}" }
    end

    desc "Link assets for current deploy to the shared location"
    task :update, :roles => [:app, :web] do
      run "rm -rf #{release_path}/public/media && ln -nfs #{shared_path}/media #{release_path}/public"
      run "rm -rf #{release_path}/data && ln -nfs #{shared_path}/data #{release_path}/"
    end
  end
end

before "deploy:setup" do
  assets.symlinks.setup
end

before "deploy:updaterights" do
  assets.symlinks.update
end

after "deploy:restart", "deploy:linkmedia", "deploy:updaterights", "deploy:cleanup"
