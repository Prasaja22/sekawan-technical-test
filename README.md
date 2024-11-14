<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p> <p align="center"> <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a> </p>
About Project
Deskripsi singkat mengenai project Laravel dan fitur autentikasi Breeze yang disertakan.

Prasyarat
Pastikan Anda sudah menginstal:

PHP versi 8.1 atau lebih baru
Composer
Node.js dan npm
Database MySQL atau MariaDB
Setup Project
Ikuti langkah-langkah berikut untuk menginstal dan menjalankan project ini di lingkungan lokal Anda.

2. Install Dependencies
Instal dependensi backend menggunakan Composer:

bash
Salin kode
composer install
Lalu, instal dependensi frontend menggunakan npm:

bash
Salin kode
npm install
3. Konfigurasi Environment
Buat file .env dengan menyalin .env.example dan mengatur konfigurasi sesuai dengan environment Anda:

bash
Salin kode
cp .env.example .env
Setelah itu, buat APP_KEY:

bash
Salin kode
php artisan key:generate
4. Setup Database
Edit konfigurasi database di .env:

plaintext
Salin kode
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username
DB_PASSWORD=password
Setelah itu, jalankan migrasi untuk membuat tabel-tabel di database:

bash
Salin kode
php artisan migrate
5. Instal Laravel Breeze
Instal Laravel Breeze untuk autentikasi:

bash
Salin kode
composer require laravel/breeze --dev
php artisan breeze:install
Setelah diinstal, lakukan kompilasi asset front-end:

bash
Salin kode
npm run dev
Atau untuk versi production:

bash
Salin kode
npm run build
6. Jalankan Server
Jalankan server pengembangan Laravel:

bash
Salin kode
php artisan serve
Akses aplikasi di http://localhost:8000.

7. (Opsional) Seed Data
Jika project ini memiliki seeder untuk data awal, Anda bisa menjalankannya dengan perintah berikut:

bash
Salin kode
php artisan db:seed
