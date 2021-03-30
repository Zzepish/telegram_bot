<?php

namespace App\Components\Entity;

class ShippingQuery extends AbstractEntity
{
    private string          $id;
    private User            $from;
    private string          $invoice_payload;
    private ShippingAddress $shipping_address;

    protected array $objects_to_fill = [
        'from'             => User::class,
        'shipping_address' => ShippingAddress::class
    ];

    public function getId(): string
    {
        return $this->id;
    }

    public function getFrom(): User
    {
        return $this->from;
    }

    public function getInvoicePayload(): string
    {
        return $this->invoice_payload;
    }

    public function getShippingAddress(): ShippingAddress
    {
        return $this->shipping_address;
    }
}