<?php

namespace Accu\Postmen\Entities;

use Accu\Postmen\Schema\JsonSchema;
use Accu\Postmen\Utility\PostmenEntity;

/**
 * Label.
 *
 * @see https://docs.postmen.com/api.html#a-label-object
 */
final class Label extends PostmenEntity
{
    use JsonSchema;

    public const JSON_SCHEMA = '/label#/links/0/targetSchema';

    /** @var string Unique label identifier */
    private $id;

    /** @var string */
    private $status;

    /** @var string Date shipped in YYYY-MM-DD format */
    private $ship_date;

    /** @var string[] */
    private $tracking_numbers = [];

    /** @var Files */
    private $files;

    /** @var Rate */
    private $rate;

    /** @var string A formatted date */
    private $created_at;

    /** @var string A formatted date */
    private $updated_at;

    /** @var string[] */
    private $references = [];

    /** @var ShipperAccount */
    private $shipper_account;

    /** @var string */
    private $service_type;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getShipDate(): string
    {
        return $this->ship_date;
    }

    public function setShipDate(string $ship_date): self
    {
        $this->ship_date = $ship_date;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getTrackingNumbers(): array
    {
        return $this->tracking_numbers;
    }

    public function setTrackingNumbers(array $tracking_numbers): self
    {
        $this->tracking_numbers = $tracking_numbers;

        return $this;
    }

    public function getFiles(): Files
    {
        return $this->files;
    }

    public function setFiles(Files $files): self
    {
        $this->files = $files;

        return $this;
    }

    public function getRate(): Rate
    {
        return $this->rate;
    }

    public function setRate(Rate $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function setCreatedAt(string $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(string $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getReferences(): array
    {
        return $this->references;
    }

    public function addReference(string $reference): self
    {
        $this->references[] = $reference;

        return $this;
    }

    public function getShipperAccount(): ShipperAccount
    {
        return $this->shipper_account;
    }

    public function setShipperAccount(ShipperAccount $shipper_account): self
    {
        $this->shipper_account = $shipper_account;

        return $this;
    }

    public function getServiceType(): string
    {
        return $this->service_type;
    }

    public function setServiceType(string $service_type): self
    {
        $this->service_type = $service_type;

        return $this;
    }

    public static function fromData(array $data): self
    {
        $label = (new self())
            ->setShipperAccount(ShipperAccount::fromData($data['shipper_account'] ?? []))
            ->setRate(Rate::fromData($data['rate'] ?? []));

        if ($data['files']) {
            $label->setFiles(Files::fromData($data['files']));
        }

        return self::hydrateFromMap($label, [
            'id' => 'setId',
            'status' => 'setStatus',
            'tracking_numbers' => 'setTrackingNumbers',
            'created_at' => 'setCreatedAt',
            'updated_at' => 'setUpdatedAt',
            'ship_date' => 'setShipDate',
            'service_type' => 'setServiceType',
        ], $data);
    }
}
