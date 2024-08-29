install composer: https://getcomposer.org/Composer-Setup.exe (version > 8 of php)
insatll cli symfony:
                    -  run in powershell :
                                        -  Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser
                                        -  Invoke-RestMethod -Uri https://get.scoop.sh | Invoke-Expression
                                        -  scoop install symfony-cli
run: 
    -  composer install
    -  import database in phpmyadmin dans une base de donnee mariadb avec le port 3307 sans pass
    -  symfony local:server:start
