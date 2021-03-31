<?php

namespace App\Components\Entity;

class Location extends AbstractImmutableEntity
{
    protected float  $longitude;
    protected float  $latitude;
    protected ?float $horizontal_accuracy    = null;
    protected ?int   $live_period            = null;
    protected ?int   $heading                = null;
    protected ?int   $proximity_alert_radius = null;

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getHorizontalAccuracy(): ?float
    {
        return $this->horizontal_accuracy;
    }

    public function getLivePeriod(): ?int
    {
        return $this->live_period;
    }

    public function getHeading(): ?int
    {
        return $this->heading;
    }

    public function getProximityAlertRadius(): ?int
    {
        return $this->proximity_alert_radius;
    }
}