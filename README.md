#titikterang-laravel-boilerplate

## Fitur
- Admin Area Authentication.  
- SuperAdminSeeder.  
- CRUD User.  
- Basic Role & Permission.  


## Installation
Setelah clone, silahkan copy file .env.example menjadi file .env kemudian silahkan sesuaikan konfigurasi sesuai yang dibutuhkan. Kemudian jalankan perintah dibawah:  

```
composer install  
php artisan migrate  
php artisan db:seed --class=SuperAdminSeeder  
```

## Admin
email: admin@laravel.com  
password: admin123  