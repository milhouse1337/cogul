# COGUL

**CO**okie **GU**ard for **L**aravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/milhouse1337/cogul.svg?style=flat-square)](https://packagist.org/packages/milhouse1337/cogul)
[![Total Downloads](https://img.shields.io/packagist/dt/milhouse1337/cogul.svg?style=flat-square)](https://packagist.org/packages/milhouse1337/cogul)

This package can secure any route in Laravel with a simple cookie. It will prevent anyone (or anything) to access a specific route if the cookie value you defined is not present on the request.

## Installation

You can install the package via Composer:

```bash
composer require milhouse1337/cogul
```

## Configuration

To generate a random token (string) you can use `openssl` like this:

```bash
openssl rand -hex 32
```

Add the token on your `.env` file:

```
COGUL_TOKEN=random_token_here
```

You can publish the config with (optional):

```bash
php artisan vendor:publish --provider="Milhouse1337\Cogul\CogulServiceProvider"
```

Here is an example `config/cogul.php` file:

```php
return [
    'token'      => env('COGUL_TOKEN', ''),
    'url'        => env('COGUL_URL', '/auth/token/{token}'),
    'redirect'   => env('COGUL_REDIRECT', '/'),
    'cookie'     => env('COGUL_COOKIE', 'cogul'),
    'expiration' => env('COGUL_EXPIRATION', 2628000), // 5 years.
    'middleware' => env('COGUL_MIDDLEWARE', 'web'),
    'whitelist'  => [],
];
```

## Usage

You have to define the routes you want to secure with the `auth.cogul` middleware, like this:

```php
Route::get('example', 'Controller@example')->middleware('auth.cogul');
```

Now if you `GET` this `/example` you will have a `403` response from Laravel.

In order to get the expected response, you need to access the following link in your browser to set the `cogul` cookie:

`/auth/token/random_token_here`

The cookie should be stored in your browser and you will be redirected to the URL you configured.

You will now be able to access `/example` normally until the cookie gets expired or deleted.

## Credits

- [Pascal Meunier](https://github.com/milhouse1337)
- [All contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

