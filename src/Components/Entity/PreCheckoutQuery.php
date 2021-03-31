<?php

namespace App\Components\Entity;

class PreCheckoutQuery extends AbstractEntity
{
    private string     $id;
    private User       $from;
    private string     $currency;
    private int        $total_amount;
    private string     $invoice_payload;
    private ?string    $shipping_option_id = null;
    private ?OrderInfo $order_info         = null;

    protected array $objects_to_fill = [
        'from'       => User::class,
        'order_info' => OrderInfo::class
    ];

    public function getId(): string
    {
        return $this->id;
    }

    public function getFrom(): User
    {
        return $this->from;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getTotalAmount(): int
    {
        return $this->total_amount;
    }

    public function getInvoicePayload(): string
    {
        return $this->invoice_payload;
    }

    public function getShippingOptionId(): ?string
    {
        return $this->shipping_option_id;
    }

    public function getOrderInfo(): ?OrderInfo
    {
        return $this->order_info;
    }
}