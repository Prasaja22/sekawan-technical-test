<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Berikut adalah langkah-langkah untuk melakukan setup project Laravel yang diambil dari repository GitHub:

Langkah 1: Clone Repository dari GitHub
Buka terminal atau Command Prompt.

Clone repository Laravel ke direktori lokal Anda:

bash
Salin kode
git clone <URL-repository-GitHub>
Gantilah <URL-repository-GitHub> dengan URL dari repository GitHub proyek Laravel yang ingin Anda clone.

Pindah ke direktori project:

bash
Salin kode
cd nama-folder-project
Langkah 2: Install Dependensi Composer
Pastikan Anda berada di dalam direktori proyek Laravel.

Jalankan perintah berikut untuk menginstal semua dependensi yang diperlukan:

bash
Salin kode
composer install
Catatan: Jika composer belum diinstal, silakan unduh dan instal dari getcomposer.org.

Langkah 3: Buat File Environment .env
Buat file .env dengan menduplikasi file .env.example:
bash
Salin kode
cp .env.example .env
Buka file .env dan sesuaikan konfigurasi, terutama bagian DB_DATABASE, DB_USERNAME, dan DB_PASSWORD untuk konfigurasi database.
Langkah 4: Generate Application Key
Generate application key yang dibutuhkan oleh Laravel:
bash
Salin kode
php artisan key:generate
Ini akan menghasilkan kunci aplikasi baru di file .env.
Langkah 5: Migrasi Database
Pastikan database yang sudah disesuaikan di .env sudah dibuat di MySQL atau database lain yang Anda gunakan.

Jalankan migrasi untuk membuat tabel-tabel yang diperlukan:

bash
Salin kode
php artisan migrate
Catatan: Jika ada data awal (seeder), Anda bisa menjalankan seeder dengan perintah berikut:

bash
Salin kode
php artisan db:seed
Langkah 6: Install Dependensi Frontend (Optional)
Jika project Laravel menggunakan frontend seperti Vue.js, React, atau menggunakan Laravel Mix, Anda perlu menginstal dependensi JavaScript:

Pastikan Anda berada di dalam direktori project.

Jalankan perintah berikut untuk menginstal dependensi Node.js:

bash
Salin kode
npm install
Setelah itu, compile asset frontend dengan menjalankan:

bash
Salin kode
npm run dev
atau untuk mode produksi:

bash
Salin kode
npm run prod
Catatan: Jika npm belum diinstal, instal terlebih dahulu Node.js yang sudah menyertakan npm di dalamnya dari nodejs.org.

Langkah 7: Jalankan Server Laravel
Jalankan server development Laravel dengan perintah berikut:
bash
Salin kode
php artisan serve
Buka browser dan akses aplikasi Anda di http://localhost:8000.

