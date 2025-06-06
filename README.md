<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

 # Office Management System (Laravel Project)

## Project Overview

This is a simple Office Management System built using Laravel.
It demonstrates building a CRUD web application with:

Company management (CRUD)
Employee management (CRUD)
Employee assignment to companies
Optional manager assignment to employees
Manual input of country, state, city
Employee listing with DataTables integration (search, sort, pagination)
Responsive UI with Tailwind CSS
Setup Instructions

## Prerequisites:

PHP >= 8.x
Composer
MySQL (or other database)
Node.js and npm (for Laravel Mix if needed)

## Installation:

1️⃣ Install dependencies:
composer install
npm install

2️⃣ Configure environment variables:
cp .env.example .env
php artisan key:generate
Edit .env and set your database credentials:
DB_DATABASE=your_database_name
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password

3️⃣ Run database migrations:
php artisan migrate

4️⃣ Run the application:
php artisan serve
The application will be available at:
http://127.0.0.1:8000

## Features

Company CRUD (create, read, update, delete companies)
Employee CRUD
Manager assignment (optional)
Country/State/City — static/manual input
DataTables integration for employee listing (search, sort, paginate)
Responsive frontend with Tailwind CSS
GitHub Repository

👉 https://github.com/Ak-2077/Office-management-laravel

## Notes

The external API for State/City was intentionally skipped as per assignment instruction.
The project is ready to run locally.


License

MIT License.

