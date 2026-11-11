# Mobile NPM API

REST API untuk pengelolaan kategori dan produk menggunakan Laravel dan MySQL.

## Informasi Database

- Nama database: `mobile_npm`
- Tabel utama: `kategori`, `produk`
- Tabel pendukung Laravel: `users`, `migrations`, `personal_access_tokens`, `cache`, `cache_locks`, `jobs`, `job_batches`, `failed_jobs`, `sessions`, `password_reset_tokens`
- Relasi: `produk.kategori_id` mengacu ke `kategori.kategori_id` (foreign key, `ON DELETE CASCADE`).

## Persyaratan

- PHP sesuai versi Laravel yang digunakan
- Composer
- MySQL / MariaDB
- Postman (untuk pengujian API)

## Instalasi dan Menjalankan Project

1. Clone atau download repository ini.
2. Masuk ke folder project:

   ```bash
   cd mobile_npm_api
   ```

3. Install dependency Laravel:

   ```bash
   composer install
   ```

4. Salin file konfigurasi contoh menjadi `.env`:

   ```bash
   copy .env.example .env
   ```

   Pada Linux/macOS, gunakan `cp .env.example .env`.

5. Buat application key:

   ```bash
   php artisan key:generate
   ```

6. Buat database MySQL bernama `mobile_npm`, lalu import file `mobile_npm.sql` melalui HeidiSQL/phpMyAdmin atau MySQL CLI.

7. Sesuaikan konfigurasi database pada `.env`:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=mobile_npm
   DB_USERNAME=root
   DB_PASSWORD=
   ```

   Sesuaikan `DB_USERNAME` dan `DB_PASSWORD` dengan konfigurasi MySQL lokal.

8. Jalankan Laravel:

   ```bash
   php artisan serve
   ```

   Server development biasanya tersedia di `http://127.0.0.1:8000`.

## Struktur Tabel

### `kategori`

| Kolom | Keterangan |
|---|---|
| `kategori_id` | Primary key, auto increment |
| `nama_kategori` | Nama kategori |
| `slug` | Slug unik kategori |
| `created_at` | Waktu dibuat |
| `updated_at` | Waktu diperbarui |

### `produk`

| Kolom | Keterangan |
|---|---|
| `id_produk` | Primary key, auto increment |
| `nama_produk` | Nama produk |
| `user_id` | ID pengguna (nullable) |
| `deskripsi` | Deskripsi produk (nullable) |
| `harga` | Harga produk |
| `kategori_id` | Foreign key ke tabel `kategori` |
| `status_produk` | Status produk, default `1` |
| `created_at` | Waktu dibuat |
| `updated_at` | Waktu diperbarui |

## Data Awal SQL

File `mobile_npm.sql` berisi:
- 1 kategori: Pertanian dan Perkebunan
- 2 baris produk: Biji Kopi Robusta
- Struktur tabel database dan tabel pendukung Laravel

## Pengujian API dengan Postman

1. Jalankan server Laravel (`php artisan serve`).
2. Buka Postman.
3. Masukkan URL endpoint API sesuai route yang tersedia pada project.
4. Uji method HTTP (GET, POST, PUT/PATCH, DELETE) sesuai endpoint.
5. Simpan screenshot hasil pengujian untuk dokumentasi tugas.

> **Catatan:** Daftar endpoint belum dicantumkan karena file route/controller Laravel belum disertakan. Tambahkan endpoint yang benar dari `routes/api.php` atau dokumentasi project.

## Upload ke DigitHub

Pastikan repository berisi:
- Source code project Laravel (`mobile_npm_api`)
- `mobile_npm.sql`
- `README.md`
- Screenshot pengujian Postman
- Collection Postman (jika diminta)

Folder `vendor` tidak perlu di-upload; penguji dapat menjalankan `composer install`.

Jangan upload `.env` yang berisi password atau konfigurasi lokal. Gunakan `.env.example` dan tuliskan konfigurasi yang diperlukan di README.
