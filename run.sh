#!/bin/sh

cd /app  
php artisan migrate:fresh --seed
php artisan serve --host=0.0.0.0 --port=$APP_PORT





CREATE TABLE device (
    id int NOT NULL AUTO_INCREMENT,
    model varchar(255) NOT NULL,
    serial varchar(255) NOT NULL,
    PRIMARY KEY (id)
); 

CREATE TABLE model (
    id int NOT NULL  AUTO_INCREMENT,
    validator varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    PRIMARY KEY (id)
);          

