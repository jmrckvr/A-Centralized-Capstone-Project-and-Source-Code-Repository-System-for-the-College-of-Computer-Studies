# A-Centralized-Capstone-Project-and-Source-Code-Repository-System-for-the-College-of-Computer-Studies

This repository contains the source code for the centralized capstone project and source code repository system for the College of Computer Studies.

## Technology

- Laravel
- PHP
- Vite

## Local setup

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run build
php artisan serve
```
