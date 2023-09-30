<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Ticket system
This is a ticket system, authenticate user can create tickets.

## Features
Create ticket includes (Title, description, assign user)
View ticket
Change Status
Notify change status using mail notification to assigned user 

## Take clone this repo
cd ticket-sytem
## Copy env file
copy .env.example .env
## Create database on your system
database name : ticket_system
## Run database schema
php artisan migrate
## Create dummy records
for User
php artisan tinker
\App\Models\User::factory()->count(10)->create()

for Ticket
php artisan tinker
\App\Models\Ticket::factory()->count(10)->create()
## To start project
php artisan serve
