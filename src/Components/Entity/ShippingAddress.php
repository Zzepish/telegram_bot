<?php

namespace Zzepish\Components\Entity;

class ShippingAddress extends AbstractImmutableEntity
{
    protected string $country_code;
    protected string $state;
    protected string $city;
    protected string $street_line1;
    protected string $street_line2;
    protected string $post_code;

    public function getCountryCode(): string
    {
        return $this->country_code;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getStreetLine1(): string
    {
        return $this->street_line1;
    }

    public function getStreetLine2(): string
    {
        return $this->street_line2;
    }

    public function getPostCode(): string
    {
        return $this->post_code;
    }
}