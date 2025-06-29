## Mini Spare-Part Management System Backend

This is the backend for the Mini Spare-Part Management System, a web application for managing vehicle repairs, services, and spare parts in an auto repair shop. Built with Laravel 11 and MySQL, it uses JWT (JSON Web Tokens) for authentication and follows a clean architecture with controllers, services, and form requests. The backend supports three user roles (Manager, Receptionist, Mechanic) and provides RESTful API endpoints for managing users, vehicles, services, and parts. It integrates with a Vue.js frontend (not included in this repository).

## Features

Authentication: JWT-based login/logout with role-based access control.

## User Roles:

* Manager: View dashboard, manage parts inventory.

* Receptionist: Register vehicles, manage service lists.

* Mechanic: View and update service queue.

* Data Management: CRUD operations for vehicles, services, and spareparts.

* Validation: Form requests for input validation and authorization.

* SOLID Principles: Single Responsibility enforced through controllers (HTTP handling), services (business logic), and form requests (validation).

Prerequisites

## To run this backend locally, ensure you have the following installed:

``PHP >= 8.1``

## Composer (for PHP dependency management)

``MySQL >= 5.7``

A MySQL client (e.g., phpMyAdmin, MySQL Workbench) for database setup

Installation

Follow these steps to set up the backend on your local computer.

##  Clone the Repository

``git clone https://github.com/heritier24/minispareparts-api.git``

`` cd minispareparts-api ``

## Install Dependencies

Install PHP dependencies using Composer:

``composer install``

## Configure Environment

Copy the .env.example file to .env:

`` cp .env.example .env ``



Update .env with your MySQL database credentials:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mini_spareparts
DB_USERNAME=root
DB_PASSWORD=

## Replace your_username and your_password with your MySQL credentials.

Set Up MySQL Database

## Run migrations to create tables:

`` php artisan migrate``

## Seed the database with initial data (users, vehicles, services, parts):

`` php artisan db:seed``

## Configure JWT Authentication

Install the JWT-Auth package:

`` composer require tymon/jwt-auth ``

## Publish the JWT configuration:

``php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider" ``

## Generate a JWT secret:

`` php artisan jwt:secret ``

This adds a JWT_SECRET key to your .env file.

## Run the Application

## Start development server:

`` php artisan serve ``

