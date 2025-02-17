Laravel Blog-App

## Description

This is a Laravel-based blog application that allows users to create posts, comment on posts and reply to comments. Apart from that, it supports two languages, English and Indonesian for features. The application also includes features such as authentication, email verification, user profile management, and pagination.

## Features

- User Authentication (Login, Register, Logout)

- Email Verification (Mailtrip)

- Create, Edit, and Delete Posts

- Upload Images for Posts

- Comment on Posts

- Reply to Comments (One Level Depth)

- Sort Posts by Newest and Oldest

- Search Posts by Title, Content, and Date

- Pagination 

## Installation

Prerequisites

- PHP 8+

- Composer

- Laravel 11+

- MySQL or any database supported by Laravel

- DaisyUI

- Node.js & NPM (For front-end dependencies if needed)

## Setup

Clone the repository:

git clone https://github.com/rizkitaufiq/blog-app.git
cd blog-app

Install dependencies:

composer install
npm install

Create environment file:

cp .env.example .env

Configure .env file:

Set up your database connection (DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD)

Generate application key:

php artisan key:generate

Run migrations and seed database:

php artisan migrate --seed

Run the application:

php artisan serve

The application will be available at http://127.0.0.1:8000

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
