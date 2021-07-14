<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Switch Account 

By cloning this repo you'll have access to a multi auth Laravel Breeze project with the ability to switch between different accounts.


## How It Works

This project builds in Laravel Breeze which has two guards (User & Admin), for a multi auth system it has different tables in the database, different routes, and pages for login, register, and dashboard.
On switching from the User to Admin or the opposite, all data will move to the considered table.

## Installation

- Clone this repository to your local machine or just download the zip from the above green button.
```bash
  git clone 
```

- Make sure you have the [Composer](https://getcomposer.org/download) installed, then run this command in your command-line (you should be inside your project directory).
```bash
  composer install 
```

- Rename .env.example to .env and add your database.

- Generate application key.
```bash
    php artisan key:generate
```

- Create tables.
```bash
    php artisan migrate
```

- Start the development server.
```bash
    php artisan serve
```

Concongratulations your project is up and running now.