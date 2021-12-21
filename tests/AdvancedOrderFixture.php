<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\CountryCasts\Tests;

use Illuminate\Database\Eloquent\Model;
use BrokeYourBike\CountryCasts\Alpha2Cast;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 */
class AdvancedOrderFixture extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array<mixed>
     */
    protected $casts = [
        'country_code' => 'string',
        'country_code_alpha2' => Alpha2Cast::class . ':country_code',
    ];
}
