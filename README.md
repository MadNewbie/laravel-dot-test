Aplikasi ini merupakan CRUD sederhana dari data jenis buku, penulis buku dan buku dimana data buku memiliki satu jenis buku dan satu penulis.
Pengguna aplikasi ini bisa melakukan kegiatan CRUD melalui login terlebih dahulu.
Adapun akun yang bawaan di aplikasi ini adalah akun administrator dengan email "admin@this.app" dan password "password".

Cara install:
1. git clone proyek ini
2. pastikan php dan composer sudah terinstall dan jalankan perintah 'composer update'
3. duplikasi file .env.example dan ubah namanya menjadi file .env
4. ubah pada file .env variable DB_HOST, DB_DATABASE, DB_PORT, DB_USERNAME, DB_PASSWORD sesuai dengan konfigurasi pada mesin yang akan diinstall
5. jalankan perintah 'php artisan key:generate'
6. jalankan perintah 'php artisan migrate --seed'
