<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\CountryCasts\Tests;

use PHPUnit\Framework\TestCase;
use League\ISO3166\Exception\DomainException;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 */
class Alpha2CastTest extends TestCase
{
    /** @test */
    public function it_can_return_alpha2_from_alpha3(): void
    {
        $order = new AdvancedOrderFixture();
        $order->country_code = 'USA';

        $this->assertIsString($order->country_code_alpha2);
        $this->assertSame('US', $order->country_code_alpha2);
    }

    /** @test */
    public function it_can_set_alpha3_from_alpha2()
    {
        $order = new AdvancedOrderFixture();
        $this->assertNull($order->country_code);

        $order->country_code_alpha2 = 'US';
        $this->assertSame('USA', $order->country_code);
    }

    /** @test */
    public function it_will_throw_if_stored_value_is_not_string()
    {
        $order = new AdvancedOrderFixture();
        $order->country_code = 123;

        $this->expectExceptionMessage('The stored value should be sting');
        $this->expectException(\InvalidArgumentException::class);

        $order->country_code_alpha2;
    }

    /** @test */
    public function it_will_throw_if_stored_value_is_empty_string()
    {
        $order = new AdvancedOrderFixture();
        $order->country_code = '';

        $this->expectExceptionMessage('Not a valid alpha3 key');
        $this->expectException(DomainException::class);

        $order->country_code_alpha2;
    }

    /** @test */
    public function it_will_throw_if_stored_value_is_not_a_valid_country_alpha3_code()
    {
        $order = new AdvancedOrderFixture();
        $order->country_code = 'NOT-A-COUNTRY-CODE';

        $this->expectExceptionMessage('Not a valid alpha3 key');
        $this->expectException(DomainException::class);

        $order->country_code_alpha2;
    }

    /** @test */
    public function it_will_throw_if_given_value_is_not_a_valid_country_alpha2_code()
    {
        $order = new AdvancedOrderFixture();

        $this->expectExceptionMessage('Not a valid alpha2 key');
        $this->expectException(DomainException::class);

        $order->country_code_alpha2 = 'NOT-A-COUNTRY-CODE';
    }
}
