# M-Puss
## Install
Clone Repo 
```bash
git clone https://github.com/macha06/app-08-ukk
```

Move Directory to
```bash
cd app-08-ukk
```
open php ini find 
ctrl f : gd delete ; in extension:gd 
and find zip and delete ';'

install depedency
```bash
composer update
npm install
```

salin file .env.example
```bash
cp .env.example .env
```

```bash
DB_DATABASE=db-08-ukk
```
Running Server
```bash
php artisan key:generate
php artisan migrate
php artisan db:seed --class=UserSeeder
php artisan serve
# start di terminal lain
npm run dev
```

Login 
```bash
#Admin
Email : lJ1eA@example.com
Password : Admin
#Petugas
Email : petugas@gmail.com
Password : Petugas
#Peminjam
Email : peminjam@gmail.com
Password :peminjam
```
