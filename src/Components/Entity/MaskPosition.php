<?php

namespace Zzepish\Components\Entity;

class MaskPosition extends AbstractImmutableEntity
{
    protected string $point;
    protected float $x_shift;
    protected float $y_shift;
    protected float $scale;

    public function getPoint(): string
    {
        return $this->point;
    }

    public function getXShift(): float
    {
        return $this->x_shift;
    }

    public function getYShift(): float
    {
        return $this->y_shift;
    }

    public function getScale(): float
    {
        return $this->scale;
    }
}