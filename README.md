# country-casts-laravel

[![Latest Stable Version](https://img.shields.io/github/v/release/brokeyourbike/country-casts-laravel)](https://github.com/brokeyourbike/country-casts-laravel/releases)
[![Total Downloads](https://poser.pugx.org/brokeyourbike/country-casts-laravel/downloads)](https://packagist.org/packages/brokeyourbike/country-casts-laravel)
[![Maintainability](https://api.codeclimate.com/v1/badges/468c99a01827c36b271c/maintainability)](https://codeclimate.com/github/brokeyourbike/country-casts-laravel/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/468c99a01827c36b271c/test_coverage)](https://codeclimate.com/github/brokeyourbike/country-casts-laravel/test_coverage)

Cast country code attributes from ISO3 to ISO2

## Installation

```bash
composer require brokeyourbike/country-casts-laravel
```

## Usage

```php
use Illuminate\Database\Eloquent\Model;
use BrokeYourBike\CountryCasts\Alpha2Cast;

class Order extends Model
{
    protected $casts = [
        'country_code' => 'string',
        'country_code_alpha2' => Alpha2Cast::class . ':country_code',
    ];
}
```

## Authors
- [Ivan Stasiuk](https://github.com/brokeyourbike) | [Twitter](https://twitter.com/brokeyourbike) | [LinkedIn](https://www.linkedin.com/in/brokeyourbike) | [stasi.uk](https://stasi.uk)

## License
[Mozilla Public License v2.0](https://github.com/brokeyourbike/country-casts-laravel/blob/main/LICENSE)
