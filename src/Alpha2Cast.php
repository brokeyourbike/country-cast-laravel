<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\CountryCasts;

use League\ISO3166\ISO3166;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 */
class Alpha2Cast implements CastsAttributes
{
    /**
     * Name of the source attribute.
     *
     * @var string
     */
    protected string $sourceAttributeName;

    /**
     * Create a new cast class instance.
     *
     * @param  string  $sourceAttributeName
     * @return void
     */
    public function __construct(string $sourceAttributeName)
    {
        $this->sourceAttributeName = $sourceAttributeName;
    }

    /**
     * Transform the attribute from the underlying model values.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return string
     */
    public function get($model, string $key, $value, array $attributes)
    {
        $alpha3 = isset($attributes[$this->sourceAttributeName])
            ? $attributes[$this->sourceAttributeName]
            : null;

        if (!is_string($alpha3)) {
            throw new \InvalidArgumentException('The stored value should be sting');
        }

        $data = (new ISO3166)->alpha3($alpha3);

        if (!is_string($data['alpha2'])) {
            throw new \LogicException('Obtained alpha2 value is not a string');
        }

        return $data['alpha2'];
    }

    /**
     * Transform the attribute to its underlying model values.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        if (!is_string($value)) {
            throw new \InvalidArgumentException('The given value is not a string');
        }

        $data = (new ISO3166)->alpha2($value);
        return [$this->sourceAttributeName => $data['alpha3']];
    }
}
