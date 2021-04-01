<?php

namespace Zzepish\Components\Entity;

class OrderInfo extends AbstractImmutableEntity
{
    protected ?string          $name             = null;
    protected ?string          $phone_number     = null;
    protected ?string          $email            = null;
    protected ?ShippingAddress $shipping_address = null;

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