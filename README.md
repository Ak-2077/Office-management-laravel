<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

 # Office Management System (Laravel Project)

## Project Overview

This is a simple Office Management System built using Laravel.
It demonstrates building a CRUD web application with:

Company management (CRUD) <br>
Employee management (CRUD) <br>
Employee assignment to companies <br>
Optional manager assignment to employees<br>
Manual input of country, state, city <br>
Employee listing with DataTables integration (search, sort, pagination)<br>
Responsive UI with Tailwind CSS<br>
Setup Instructions<br>

## Prerequisites:

PHP >= 8.x <br>
Composer<br>
MySQL (or other database)<br>
Node.js and npm (for Laravel Mix if needed)<br>

## Installation:

1️⃣ Install dependencies:
composer install<br>
npm install<br>

2️⃣ Configure environment variables:
cp .env.example .env<br>
php artisan key:generate<br>
Edit .env and set your database credentials:<br>
DB_DATABASE=your_database_name<br>
DB_USERNAME=your_db_username<br>
DB_PASSWORD=your_db_password<br>

3️⃣ Run database migrations:
php artisan migrate

4️⃣ Run the application:
php artisan serve
The application will be available at:
http://127.0.0.1:8000

## Features

Company CRUD (create, read, update, delete companies)<br>
Employee CRUD<br>
Manager assignment (optional)<br>
Country/State/City — static/manual input<br>
DataTables integration for employee listing (search, sort, paginate)<br>
Responsive frontend with Tailwind CSS<br>
GitHub Repository

👉 https://github.com/Ak-2077/Office-management-laravel

## Notes

The external API for State/City was intentionally skipped as per assignment instruction.
The project is ready to run locally.


License

MIT License.

