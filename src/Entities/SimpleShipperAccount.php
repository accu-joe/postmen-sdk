<?php

namespace Accu\Postmen\Entities;

use Accu\Postmen\Schema\JsonSchema;
use Accu\Postmen\Utility\PostmenEntity;

/**
 * SimpleShipperAccount.
 *
 * Shipper details returned with rates
 */
final class SimpleShipperAccount extends PostmenEntity
{
    use JsonSchema;

    public const JSON_SCHEMA = '/shipper_account_info';

    /** @var string Shipper ID */
    private $id;

    /** @var string Slug / shipper name */
    private $slug;

    /** @var string Shipper account description */
    private $description;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

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

    public static function fromData(array $data): self
    {
        return self::hydrateFromMap(new self, [
            'id' => 'setId',
            'slug' => 'setSlug',
            'description' => 'setDescription',
        ], $data);
    }
}
