
****** Requirement ******

PHP 7.*
up to date composer
MySQL


****** Init project *****

composer install
composer dumpautoload


php -S localhost:8080 index.php

How to test it ? 

Simply visit http://localhost:8080

If you wish to change the route, open index.php and uncomment the solution ive proposed to you (You can add custom route by adding logic data inside your DB/Fixtures)


-------------------------------------------


// Structure explanation //

****** [File] .env.example ******

Here is the file you'll need to configure every private variable, such as database connexion, email auth..
You must rename .env.example as .env 

******  [Folder] src ****** 

__ src/Controller __

Methods used to find the plan from depart to destination

__ src/Database __

You will find here the class used to get connect to the DB 

__ src/Fixtures __

You will find here class needed to create table and seed them 

E.g: php src/Fixtures/TrainFixtures //to load it (create & insert data)

You might get difficulti make the fixtures insert the data, so you can just import the .sql i have you with the project

__ src/Model __

You will find here Models of tables, so we can map database with class if needed E.g: (PDO::CLASS, Model::class)

__ src/Repository __

You will find shorthand query such as ORM would do


