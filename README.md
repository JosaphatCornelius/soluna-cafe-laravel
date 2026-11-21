# Soluna Cafe Laravel

[![Build Status](https://github.com/JosaphatCornelius/soluna-cafe-laravel/actions/workflows/production.yml/badge.svg)](https://github.com/JosaphatCornelius/soluna-cafe-laravel/actions/workflows/production.yml)

A full-stack cafe web application built with Laravel and MySQL. It was my final project for Object-Oriented Programming in my second semester at university.

![Soluna Cafe screenshot](https://github.com/user-attachments/assets/739e762e-6aa9-486b-b818-e94611fb00a4)

## Tech Stack

* **Core:** Laravel (PHP)
* **Database:** MySQL, with Laravel migrations
* **Infrastructure:** Self-hosted VPS
* **Code style:** Laravel best practices

## Quick Start

Instructions to get the development environment running locally.

```bash
# Clone the repository
git clone https://github.com/yourusername/soluna-cafe-laravel.git
cd soluna-cafe-laravel

# Install dependencies
composer install

# Set up environment
cp .env.example .env
php artisan key:generate

# Run migrations and start the server
php artisan migrate
php artisan serve
```

*Note: Ensure you have PHP, Composer, and MySQL installed. Set your database credentials in the `.env` file before running migrations.*

## Usage

Clone the repository and run it locally using the steps above. Then open the local URL printed by `php artisan serve` to browse the cafe site.

To run the tests:

```bash
composer test
```

## Contributing & License

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Currently unlicensed. All rights reserved.
