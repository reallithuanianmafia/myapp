# CMS Software

Simple CMS is a software for dealing with companies and employees. Written in PHP's Laravel Framework.

## Installation

First clone this repository, install the dependencies, and setup your .env file.
To install dependencies:

```php
composer install
```
Also change email settings in env file (When new company will be created, it will send email notifications)
```php
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls
```

Type the command below to start database migrations.
```php
php artisan migrate
```

Then type the command below in order to get chunked company and employees data. 

Admin user will be created (email: admin@admin.com / password: password )
```php
php artisan db:seed
```

In order to create symlink to storage (Logos will be stored)
```php
php artisan storage:link
```

Start application and boom! You are ready to use CMS.
```php
php artisan serve
```
## Usage
Routes: 
```php
Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/account', [HomeController::class, 'account'])->name('account');
    Route::resource('company', CompaniesController::class);
    Route::resource('employee', EmployeesController::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
});
```

Some photos from application: 

![alt text](https://i.ibb.co/gwvBDck/1.png)
![alt text](https://i.ibb.co/qx0hCZ0/2.png)
![alt text](https://i.ibb.co/SrSv4NQ/3.png)
![alt text](https://i.ibb.co/gSq9037/4.png)
