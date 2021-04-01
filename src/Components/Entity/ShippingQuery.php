<?php

namespace Zzepish\Components\Entity;

class ShippingQuery extends AbstractImmutableEntity
{
    protected string          $id;
    protected User            $from;
    protected string          $invoice_payload;
    protected ShippingAddress $shipping_address;

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