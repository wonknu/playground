echo OFF
set ENV=prod
if "%1" NEQ "" (
    set ENV=%1
)


git clone https://github.com/gregorybesson/playground-demo.git "data\playground-demo"

xcopy "data\playground-demo\media\*" "public\media\." /s /i

php vendor/doctrine/doctrine-module/bin/doctrine-module.php orm:schema-tool:drop --force || goto :error
php vendor/doctrine/doctrine-module/bin/doctrine-module.php dba:import "data\playground-demo\sql\demo.sql" || goto :error
php vendor/doctrine/doctrine-module/bin/doctrine-module.php orm:schema-tool:update --force || goto :error
php public/index.php assetic setup || goto :error
php public/index.php assetic build || goto :error

rmdir "data\playground-demo" /s /q

:error
echo Failed with error #%ERRORLEVEL%.
pause

