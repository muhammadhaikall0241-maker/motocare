<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
# MOTOCARE — Sistem Manajemen Servis Sepeda Motor

**Aplikasi Manajemen Bengkel Berbasis Web dan REST API**

MotoCare merupakan aplikasi manajemen bengkel sepeda motor berbasis web yang dikembangkan menggunakan Laravel dan MySQL. Aplikasi ini dirancang untuk membantu proses administrasi dan pengelolaan operasional bengkel secara terstruktur, mulai dari pendataan pelanggan, kendaraan, pendaftaran servis, detail pengerjaan servis, hingga pembayaran.

MotoCare mengintegrasikan antarmuka web dengan REST API sehingga pengelolaan data dapat dilakukan melalui aplikasi maupun pertukaran data dalam format JSON.

Project ini dikembangkan sebagai bagian dari pembelajaran dan praktikum di Program Studi Teknologi Rekayasa Komputer dan Jaringan, Jurusan Teknologi Informasi dan Komputer, Politeknik Negeri Lhokseumawe.

**MotoCare — Smarter Service. Better Ride.**

---

## ✨ Fitur Utama

- **Manajemen Pelanggan** — Menambah, melihat, mengubah, dan menghapus data pelanggan, termasuk nama, nomor telepon, alamat, dan pekerjaan.
- **Manajemen Kendaraan** — Mengelola data kendaraan berdasarkan nomor polisi, jenis kendaraan, nomor STNK, tahun pembuatan, pemilik, dan warna.
- **Pendaftaran Servis** — Mencatat pendaftaran servis dengan menghubungkan data pelanggan dan kendaraan.
- **Detail Servis** — Mencatat keluhan, estimasi biaya, nama mekanik, dan suku cadang yang diganti.
- **Manajemen Pembayaran** — Mencatat nominal pembayaran, metode pembayaran, dan keterangan transaksi.
- **Validasi Data** — Memastikan data yang dimasukkan sesuai dengan ketentuan dan hubungan antardata.
- **Dashboard** — Menyediakan tampilan ringkasan dan akses ke fitur pengelolaan bengkel.
- **REST API** — Mendukung pengelolaan dan pertukaran data menggunakan format JSON.

## 🛠️ Teknologi yang Digunakan

| Teknologi | Kegunaan |
|---|---|
| PHP 8.2+ | Bahasa pemrograman backend |
| Laravel 12 | Framework aplikasi |
| MySQL | Sistem manajemen basis data |
| HTML | Struktur halaman web |
| CSS | Desain dan tampilan antarmuka |
| JavaScript | Interaksi antarmuka |
| Blade | Template engine Laravel |
| Postman | Pengujian REST API |
| Composer | Manajemen dependensi PHP |
| Git & GitHub | Version control dan penyimpanan repository |

## 📋 Persyaratan Instalasi

Pastikan perangkat telah memiliki:

- PHP versi 8.2 atau lebih baru
- Composer
- MySQL atau XAMPP
- Git
- Postman (untuk pengujian API)

## 🚀 Cara Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/muhammadhaikall0241-maker/motocare.git
```

Masuk ke direktori project:

```bash
cd motocare
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Konfigurasi Environment

Salin file konfigurasi:

**Windows PowerShell:**
```powershell
copy .env.example .env
```

Atur konfigurasi database pada file `.env`:

```env
APP_NAME=MotoCare
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=motocare
DB_USERNAME=root
DB_PASSWORD=
```

Buat database bernama `motocare` melalui phpMyAdmin atau MySQL.

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Jalankan Migration

```bash
php artisan migrate
```

### 6. Jalankan Aplikasi

```bash
php artisan serve
```

Buka aplikasi melalui browser:

```text
http://127.0.0.1:8000
```

## 🔌 REST API Endpoints

Base URL:

```text
http://127.0.0.1:8000/api
```

MotoCare menyediakan resource API untuk lima modul utama.

| Method | Endpoint | Fungsi |
|---|---|---|
| GET | `/customers` | Menampilkan seluruh pelanggan |
| POST | `/customers` | Menambahkan pelanggan |
| GET | `/customers/{id}` | Menampilkan detail pelanggan |
| PUT | `/customers/{id}` | Mengubah data pelanggan |
| DELETE | `/customers/{id}` | Menghapus pelanggan |
| GET | `/vehicles` | Menampilkan seluruh kendaraan |
| POST | `/vehicles` | Menambahkan kendaraan |
| GET | `/vehicles/{id}` | Menampilkan detail kendaraan |
| PUT | `/vehicles/{id}` | Mengubah data kendaraan |
| DELETE | `/vehicles/{id}` | Menghapus kendaraan |
| GET | `/service-registrations` | Menampilkan pendaftaran servis |
| POST | `/service-registrations` | Menambahkan pendaftaran servis |
| GET | `/service-registrations/{id}` | Menampilkan detail pendaftaran |
| PUT | `/service-registrations/{id}` | Mengubah pendaftaran servis |
| DELETE | `/service-registrations/{id}` | Menghapus pendaftaran servis |
| GET | `/service-details` | Menampilkan detail servis |
| POST | `/service-details` | Menambahkan detail servis |
| GET | `/service-details/{id}` | Menampilkan detail berdasarkan ID |
| PUT | `/service-details/{id}` | Mengubah detail servis |
| DELETE | `/service-details/{id}` | Menghapus detail servis |
| GET | `/service-payments` | Menampilkan data pembayaran |
| POST | `/service-payments` | Menambahkan pembayaran |
| GET | `/service-payments/{id}` | Menampilkan detail pembayaran |
| PUT | `/service-payments/{id}` | Mengubah data pembayaran |
| DELETE | `/service-payments/{id}` | Menghapus data pembayaran |

## 🧪 Pengujian API dengan Postman

Pengujian REST API dilakukan menggunakan Postman.

Konfigurasi Headers:

```text
Accept: application/json
Content-Type: application/json
```

Untuk metode POST dan PUT, data dikirim menggunakan format JSON melalui menu:

```text
Body → raw → JSON
```

Pengujian dilakukan untuk memeriksa respons API, proses pengelolaan data, serta validasi input.

**Catatan:** Dokumentasi pengujian dan hasil setiap endpoint dapat dilengkapi sesuai hasil pengujian aktual.

## 🗄️ Struktur Database

MotoCare menggunakan beberapa tabel utama yang saling berhubungan:

- `customers` — Menyimpan data pelanggan.
- `vehicles` — Menyimpan data kendaraan dan relasi pelanggan.
- `service_registrations` — Menyimpan pendaftaran servis.
- `service_details` — Menyimpan informasi pengerjaan servis.
- `service_payments` — Menyimpan transaksi pembayaran.

## 📁 Struktur Project

```text
motocare/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   └── Models/
├── database/
│   └── migrations/
├── public/
│   ├── images/
│   └── videos/
├── resources/
│   └── views/
├── routes/
│   ├── api.php
│   └── web.php
├── tests/
├── .env.example
├── artisan
├── composer.json
├── package.json
└── README.md
```

## 👨‍💻 Repository

**GitHub Repository:**

https://github.com/muhammadhaikall0241-maker/motocare

Project ini dikembangkan untuk keperluan pembelajaran dan praktikum pengembangan aplikasi berbasis web, pengelolaan basis data, integrasi sistem, serta implementasi REST API.

---

**MOTOCARE — Smarter Service. Better Ride.**
