<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project

Membuat aplikasi web untuk manajemen reservasi dan monitoring kendaraan yang memungkinkan perusahaan mengelola pemakaian kendaraan dengan efisien, melacak aktivitas kendaraan, dan mendapatkan data performa operasional kendaraan secara keseluruhan.

Admin 
- Email : admin@gmail.com
- Password : password123

Driver
- Email : budiono@gmail.com
- Password : password123

Staff
- Email : joko@gmail.com
- Password : password123

---

## Prasyarat

Pastikan Anda sudah menginstal:
- [PHP](https://www.php.net/downloads.php) versi 8.1 atau lebih baru
- [Composer](https://getcomposer.org/download/)
- [Node.js dan npm](https://nodejs.org/en/download/)
- Database MySQL atau MariaDB

## Setup Project

Ikuti langkah-langkah berikut untuk menginstal dan menjalankan project ini di lingkungan lokal Anda.

### 1. Install Dependencies 

install:

```bash
composer install
```

### 3. Salin File Konfigurasi
Salin file .env.example dan ubah namanya menjadi .env:

```bash
cp .env.example .env 
```

### 4. Generate Application Key
Jalankan perintah berikut untuk menghasilkan APP_KEY:

```bash
php artisan key:generate
```

### 5. Konfigurasi Database
Buka file .env dan perbarui konfigurasi database Anda: 

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username_database
DB_PASSWORD=password_database
```

### 6. Jalankan Migrasi dan Seeder
Jalankan migrasi database untuk membuat tabel-tabel yang diperlukan:

```bash
php artisan migrate
```
```bash
php artisan db:seed
```

### 7. Install Laravel Breeze
Jalankan perintah berikut:
```bash
composer require laravel/breeze --dev
php artisan breeze:install
```

### 9. Menjalankan Server Lokal
Untuk menjalankan aplikasi, jalankan perintah berikut:
```bash
php artisan serve
```

