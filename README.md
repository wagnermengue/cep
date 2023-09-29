# ZipCode

[![Latest Version on Packagist](https://img.shields.io/packagist/v/wagnermengue/zipcode.svg?style=flat-square)](https://packagist.org/packages/wagnermengue/zipcode)
[![Total Downloads](https://img.shields.io/packagist/dt/wagnermengue/zipcode.svg?style=flat-square)](https://packagist.org/packages/wagnermengue/zipcode)

Package developed to find zip code

## Installation

You can install the package via composer:

```bash
composer require wagnermengue/zipcode
```

## Usage

```php
$zipCode = new ZipcodeClient();
$zipCode->find(93285630);
```
Expected:
```json
{
  "logradouro" : "Rua José Casemiro Castilhos",
  "complemento" : "",
  "bairro" : "Olímpica",
  "cidade" : "Esteio",
  "uf" : "RS"
}
```

### Testing

```bash
composer test
```

### Data source

ViaCEP : https://viacep.com.br/

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

### Security

If you discover any security related issues, please email dev.mengue@gmail.com instead of using the issue tracker.

## Credits

-   [Wagner Mengue](https://github.com/wagnermengue)
-   [Eduardo Gonçalves](https://github.com/eduardogoncalves00)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.