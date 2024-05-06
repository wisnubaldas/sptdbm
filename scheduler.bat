:loop

cd C:\laragon\www\tps-online-dbm\
php artisan schedule:run >> my_log.txt

timeout /t 60
goto loop