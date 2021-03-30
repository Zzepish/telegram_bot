<?php

namespace App\Components\Entity;

class ShippingAddress extends AbstractEntity
{
    private string $country_code;
    private string $state;
    private string $city;
    private string $street_line1;
    private string $street_line2;
    private string $post_code;

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