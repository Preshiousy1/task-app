# ![Laravel Example App](logo.png)

> ### Laravel Task App API.

Example Laravel API Task App

---

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/11.x/installation)

Clone the repository

    git clone https://github.com/Preshiousy1/task-app.git

Switch to the repo folder

    cd task-app

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

**Set the database connection in .env before migrating**

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel-task-app
    DB_USERNAME=root
    DB_PASSWORD=

Run the database migrations

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/Preshiousy1/task-app.git
    cd task-app
    composer install
    cp .env.example .env
    php artisan key:generate

**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

**Populate the database with seed data with relationships which includes users, articles, comments, tags, favorites and follows. This can help you to quickly start testing the api or couple a frontend and start using it with ready content.**

Open the TaskSeeder and set the property values as per your requirement

    database/seeds/TaskSeeder.php

Run the database seeder and you're done

    php artisan db:seed

**_Note_** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh

# Testing API

Run the laravel development server

    php artisan serve

The api can now be accessed at

    http://localhost:8000/api

Request headers

| **Required** | **Key**          | **Value**        |
| ------------ | ---------------- | ---------------- |
| Yes          | Content-Type     | application/json |
| Yes          | X-Requested-With | XMLHttpRequest   |
| Optional     | Authorization    | Token {JWT}      |

Refer the [api specification](#api-specification) for more info.

---
