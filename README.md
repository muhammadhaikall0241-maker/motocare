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
