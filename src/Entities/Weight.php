<?php

namespace Accu\Postmen\Entities;

use Accu\Postmen\Schema\JsonSchema;
use Accu\Postmen\Utility\PostmenEntity;

/**
 * Weight.
 *
 * weight object specifying the parcel physical properties
 *
 * @see https://docs.postmen.com/api.html#weight
 */
final class Weight extends PostmenEntity
{
    use JsonSchema;

    public const JSON_SCHEMA = '/weight';

    /** @var string Unit of measure */
    private $unit;

    /** @var float */
    private $value;

    public function getUnit(): ?string
    {
        return $this->unit;
    }

    public function setUnit(?string $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function setValue(float $value): self
    {
        $this->value = $value;

        return $this;
    }

    public static function fromData(array $data): self
    {
        return self::hydrateFromMap(new self, [
            'value' => 'setValue',
            'unit' => 'setUnit',
        ], $data);
    }
}
