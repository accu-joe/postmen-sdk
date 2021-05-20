<?php

namespace Accu\Postmen\Entities;

use Accu\Postmen\Schema\JsonSchema;
use Accu\Postmen\Utility\PostmenEntity;

/**
 * ShipperAccount.
 *
 * Shipper details returned with rates
 */
final class ShipperAccount extends PostmenEntity
{
    use JsonSchema;

    public const JSON_SCHEMA = '/shipper_account';

    /** @var string Shipper ID */
    private $id;

    /** @var Address The address of the shipper */
    private $address;

    /** @var string Slug / shipper name */
    private $slug;

    /** @var string */
    private $status;

    /** @var string */
    private $description;

    /** @var string */
    private $type;

    /** @var string */
    private $timezone;

    /** @var string */
    private $created_at;

    /** @var string */
    private $updated_at;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    public function setTimezone(?string $timezone): self
    {
        $this->timezone = $timezone;

        return $this;
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function setCreatedAt(?string $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?string $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public static function fromData(array $data): self
    {
        $data['address'] = Address::fromData($data['address'] ?? []);

        return self::hydrateFromMap(new self, [
            'id' => 'setId',
            'address' => 'setAddress',
            'slug' => 'setSlug',
            'status' => 'setStatus',
            'description' => 'setDescription',
            'type' => 'setType',
            'timezone' => 'setTimezone',
            'created_at' => 'setCreatedAt',
            'updated_at' => 'setUpdatedAt',
        ], $data);
    }
}
