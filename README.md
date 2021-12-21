# country-casts-laravel

[![Latest Stable Version](https://img.shields.io/github/v/release/brokeyourbike/country-casts-laravel)](https://github.com/brokeyourbike/country-casts-laravel/releases)
[![Total Downloads](https://poser.pugx.org/brokeyourbike/country-casts-laravel/downloads)](https://packagist.org/packages/brokeyourbike/country-casts-laravel)
[![License: MPL-2.0](https://img.shields.io/badge/license-MPL--2.0-purple.svg)](https://github.com/brokeyourbike/country-casts-laravel/blob/main/LICENSE)

[![tests](https://github.com/brokeyourbike/country-casts-laravel/actions/workflows/tests.yml/badge.svg)](https://github.com/brokeyourbike/country-casts-laravel/actions/workflows/tests.yml)

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

## License
[Mozilla Public License v2.0](https://github.com/brokeyourbike/country-casts-laravel/blob/main/LICENSE)
