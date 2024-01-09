## YHA Computer Training Center

### Getting Started

1. Clone the repository
```shell
git clone https://github.com/YHA-Center/yha-admin.git
```

2. Redirect to your clone repo and type the follow command
```shell
cd yha-admin
code .
```

3. Create new database on MySQL workbench
```shell
create database DB_NAME;
```

4. Copy the .env from .env.example
```shell
cp .env.example .env
```

5. Setup .env for database connection
```env
DB_DATABASE=DB_NAME
```

6. Install dependencies
```shell
composer install
```

8. If need, install laravel **JetStream** (Optional)
```shell
composer require laravel/jetstream
php artisan jetstream:install livewire
```
9. Migrate the database tables
```shell
php artisan migrate:fresh --seed
```

10. Serve the project on local server
```shell
php artisan serve
```

**NOTE: To login admin panel page**   
email: admin@gmail.com   
password: admin123 