Создать файл .env для laravel environment при помощи файла .env.example в папке src
Используйте команду docker-compose build в директории проекта
Используйте команду docker-compose up -d в директории проекта
Используйте команду docker exec -it php /bin/sh в вашем терминале
Используйте команду composer install в контейнере php
Используйте команду chmod -R 777 storage в контейнере php
Если требуется ключ, то создайте его в контейнере php командой php artisan key:generate
Накатить миграции можно внутри контейнера php