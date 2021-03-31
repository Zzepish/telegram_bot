<?php

namespace App\Components\Entity;

class OrderInfo extends AbstractEntity
{
    private ?string          $name             = null;
    private ?string          $phone_number     = null;
    private ?string          $email            = null;
    private ?ShippingAddress $shipping_address = null;

    protected array $objects_to_fill = [
        'shipping_address' => ShippingAddress::class
    ];
    
    public function getName(): ?string
    {
        return $this->name;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getShippingAddress(): ?ShippingAddress
    {
        return $this->shipping_address;
    }
}