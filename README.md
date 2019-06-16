# COGUL

**CO**okie **GU**ard for **L**aravel

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

You can now add the token on your `.env` file:

```
COGUL_TOKEN=random_token_here
```

You can publish the config with (optionnal):

```bash
php artisan vendor:publish --provider=Milhouse1337\Cogul\CogulServiceProvider --tag="config"
```

Here is an example `config/cogul.php` file:

```php
return [
    'token' => env('COGUL_TOKEN', ''),
    'url' => env('COGUL_URL', '/auth/token/{token}'),
    'redirect' => env('COGUL_REDIRECT', '/'),
    'cookie' => env('COGUL_COOKIE', 'cogul'),
    'expiration' => env('COGUL_EXPIRATION', 2628000), // 5 years.
    'middleware' => env('COGUL_MIDDLEWARE', 'web'),
    'whitelist' => [],
];
```

## Usage

You have to define the routes you want to secure with the `auth.cogul` middleware, lile this:

```php
Route::get('example', 'Controller@example')->middleware('auth.cogul');
```

Now if you access this URL you will get a `403` response from the server. In order to get the expected response you need to access the following URL first to set the `cogul` cookie in your browser:

`/auth/token/random_token_here`

You will now be able to access the secure page.

## Credits

- [Pascal Meunier](https://github.com/milhouse1337)
- [All contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

