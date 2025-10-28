# Website Pengaduan Masyarakat

Website aplikasi pengaduan masyarakat yang dibangun dengan Laravel dan Livewire untuk memudahkan masyarakat menyampaikan aspirasi dan keluhan.

## Framework & Teknologi

Project ini dibangun menggunakan:

- **Laravel 12** - PHP Framework
- **Livewire 3.6** - Full-stack framework untuk Laravel
- **Tailwind CSS 4** - Utility-first CSS framework
- **Vite 7** - Frontend build tool
- **PHP 8.2+** - Bahasa pemrograman

## Requirements

Sebelum memulai instalasi, pastikan sistem Anda memiliki:

- PHP >= 8.2
- Composer
- Node.js >= 18.x
- NPM atau Yarn
- MySQL/PostgreSQL/SQLite (database)

## Cara Instalasi

### 1. Clone Repository
```bash
git clone <repository-url>
cd <project-folder>
```

### 2. Install Dependencies PHP
```bash
composer install
```

### 3. Install Dependencies JavaScript
```bash
npm install
```

### 4. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```

Generate application key:
```bash
php artisan key:generate
```

### 5. Konfigurasi Database

Edit file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username_database
DB_PASSWORD=password_database
```

Atau gunakan SQLite (default):
```env
DB_CONNECTION=sqlite
```

### 6. Jalankan Migration
```bash
php artisan migrate
```

### 7. (Opsional) Jalankan Seeder

Jika tersedia seeder untuk data awal:
```bash
php artisan db:seed
```

### 8. Jalankan Development Server

Opsi 1 - Jalankan semua service sekaligus (recommended):
```bash
composer dev
```

Perintah ini akan menjalankan:
- Laravel development server (port 8000)
- Queue listener
- Vite dev server

Opsi 2 - Jalankan manual di terminal terpisah:

Terminal 1 - Laravel Server:
```bash
php artisan serve
```

Terminal 2 - Vite (untuk asset):
```bash
npm run dev
```

Terminal 3 - Queue (jika diperlukan):
```bash
php artisan queue:listen
```

### 9. Akses Aplikasi

Buka browser dan akses:
```
http://localhost:8000
```

## Build untuk Production

### 1. Build assets:
```bash
npm run build
```

### 2. Optimize Laravel:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Testing

Jalankan test dengan perintah:
```bash
composer test
```

atau langsung:
```bash
php artisan test
```

## Troubleshooting

### Permission Error

Jika mengalami masalah permission:
```bash
chmod -R 775 storage bootstrap/cache
```

### Clear Cache

Jika aplikasi tidak berfungsi dengan baik, coba clear cache:
```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

## License

Project ini menggunakan lisensi [MIT](https://opensource.org/licenses/MIT).
