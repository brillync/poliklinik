Cara Instalasi dan Penggunaan Aplikasi Poliklinik
1. Persyaratan Sistem
Pastikan perangkat Anda memenuhi persyaratan berikut:
- PHP versi 7.4 atau lebih tinggi
- MySQL/MariaDB
- Web server seperti Apache atau Nginx
- Composer (untuk manajemen dependensi PHP)
- Browser modern (Google Chrome, Mozilla Firefox, dll.)
2. Instalasi
- Clone Repository
Clone repository ini ke komputer lokal Anda dengan perintah berikut:
git clone https://github.com/username/repository-poliklinik.git  
cd repository-poliklinik  

- Konfigurasi Database
Buat database baru di MySQL dengan nama, misalnya: poliklinik.
Import file database yang ada di folder db/ menggunakan phpMyAdmin atau melalui terminal:
mysql -u username -p poliklinik < db/poli.sql

-Konfigurasi Aplikasi
1. Instal Dependensi (Opsional)
2. Jika menggunakan Composer, jalankan:
composer install
3. Jalankan Server Lokal
Jalankan aplikasi dengan server lokal menggunakan perintah berikut:
php -S localhost:8000  
Atau, letakkan aplikasi di direktori server lokal (contoh: htdocs untuk XAMPP).

4. Cara Menggunakan Aplikasi
- Akses Aplikasi
-Buka browser dan akses: http://localhost:8000 atau sesuai konfigurasi server Anda.
- Login ke Sistem
-Masukkan akun sesuai role:
Admin:
Username: admin1
Password: 123
Dokter:
Username: dokter1
Password: 123
Pasien:
Daftar melalui form pendaftaran pasien.

Fitur Utama
1. Admin: Mengelola data dokter, pasien, poli, obat, dan jadwal pemeriksaan.
2. Dokter: Melihat jadwal, memeriksa pasien, dan menambah detail pemeriksaan.
3. Pasien: Melihat status pemeriksaan dan riwayat medis.
