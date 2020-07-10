<p align="center">
    <h1 align="left">Пример организации api</h1>
     для получения курсов валют с сайта cbr
</p>

<h2>Начало работы:</h2>

Клонируем репозиторий в указанную папку
```
git clone https://github.com/Evdakov/cbr-parser.git your_project_folder
```
<p>
    Устанавливаем composer, если его нет (инструкцию по установке можно посмотреть по ссылке)<br>
    https://getcomposer.org/download/
</p>

Загружаем зависимости
```
composer update
```
Инициализируем yii2 framework
```
init
```
<p>
    Создаем базу данных. По-умолчанию yii2advanced. Можно поменять название базы данных, доступы к ней в файле <br>
    \common\config\main-local.php
</p>

Выполняем миграции
```
yii migtare
```

Проверку работы можно произвести выполнив, например, команды
```
curl -H "X-Api-Key:123321" http://tt2.ttt/exchange
curl -H "X-Api-Key:123321" http://tt2.ttt/exchange/USD
```
