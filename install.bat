echo OFF
set ENV=prod
if "%1" NEQ "" (
    set ENV=%1
)
php vendor/doctrine/doctrine-module/bin/doctrine-module.php orm:schema-tool:drop --force || goto :error
php vendor/doctrine/doctrine-module/bin/doctrine-module.php orm:schema-tool:create || goto :error
php vendor/doctrine/doctrine-module/bin/doctrine-module.php data-fixture:import --append || goto :error
php vendor/doctrine/doctrine-module/bin/doctrine-module.php orm:schema-tool:update --force || goto :error
php public/index.php assetic setup || goto :error
php public/index.php assetic build || goto :error
goto :EOF

:error
echo Failed with error #%ERRORLEVEL%.
exit /b %ERRORLEVEL%