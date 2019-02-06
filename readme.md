Задание по вакансии "Junior PHP developer" компании "KeyTraff"

Вывести запросы с использованием 
   - php,
   - mysql,
   - AJAX, 
   - jQuery, 
    - Bootstrap. 
### Есть 3 таблицы (в приложенном файле): 
- offers (товары), 
- operators (операторы), 
- requests (заказы)
###Вывести такие варианты запросов:
1) Номер заказа, имя товара, цена, количество, имя оператора за которым числится заказ ,ГДЕ количество товара >2 И id оператора 10 ИЛИ 12
2) Имя товара, количество товара, и сумма (price) по каждому товару (сгруппировать)

------

###запуск
1) в файлике httpd-vhosts.conf  Apache  создать виртуальный хост

```apacheconfig
<VirtualHost *:80>
    ServerName ktraff.local
    DocumentRoot "C:/xampp/htdocs/practice/ktraff"
    SetEnv APPLICATION_ENV "development"
    <Directory "C:/xampp/htdocs/practice/ktraff">
        DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost>

```
2) прописать в `hosts` перенаправление на `127.0.0.1` `ktraff.local`

3) импортировать базу данных

4) по поти `ktraff/config/config.php` задать **СВОИ** настройки подключения к Базе Данных
```php
Config::set('db.host', 'localhost:3307');
Config::set('db.user', 'root');
Config::set('db.password', '');
Config::set('db.db_name', 'ktraff');
```

5) front-end находиться в папке `ktraff/api/frontend`