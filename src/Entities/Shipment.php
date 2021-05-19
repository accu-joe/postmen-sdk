<?php

namespace Accu\Postmen\Entities;

use Accu\Postmen\Schema\JsonSchema;
use Accu\Postmen\Utility\PostmenEntity;

/**
 * @see https://docs.postmen.com/api.html#shipment
 */
final class Shipment extends PostmenEntity
{
    use JsonSchema;

    public const JSON_SCHEMA = '/shipment';

    /** @var Parcel[] */
    private $parcels = [];

    /** @var Address */
    private $ship_from;

    /** @var Address */
    private $ship_to;

    /** @var Address */
    private $return_to;

    /** @var string Delivery instruction for carrier */
    private $delivery_instructions;

    /**
     * @return Parcel[]
     */
    public function getParcels(): array
    {
        return $this->parcels;
    }

    public function addParcel(Parcel $parcel): self
    {
        $this->parcels[] = $parcel;

        return $this;
    }

    public function getShipFrom(): Address
    {
        return $this->ship_from;
    }

    public function setShipFrom(Address $ship_from): self
    {
        $this->ship_from = $ship_from;

        return $this;
    }

    public function getShipTo(): Address
    {
        return $this->ship_to;
    }

    public function setShipTo(Address $ship_to): self
    {
        $this->ship_to = $ship_to;

        return $this;
    }

    public function getReturnTo(): Address
    {
        return $this->return_to;
    }

    public function setReturnTo(Address $return_to): self
    {
        $this->return_to = $return_to;

        return $this;
    }

    public function getDeliveryInstructions(): ?string
    {
        return $this->delivery_instructions;
    }

    public function setDeliveryInstructions(string $delivery_instructions): self
    {
        $this->delivery_instructions = $delivery_instructions ?: null;

        return $this;
    }
}
