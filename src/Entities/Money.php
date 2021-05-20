<?php

namespace Accu\Postmen\Entities;

use Accu\Postmen\Schema\JsonSchema;
use Accu\Postmen\Utility\PostmenEntity;
use InvalidArgumentException;

/**
 * Money.
 *
 * Money object specifying the item / product value
 *
 * @see https://docs.postmen.com/api.html#money
 */
final class Money extends PostmenEntity
{
    use JsonSchema;

    public const JSON_SCHEMA = '/money';

    /** @var float */
    private $amount;

    /** @var string ISO 4217 currency code */
    private $currency;

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        if ($amount < 0) {
            throw new InvalidArgumentException('Must specify a positive monetary value');
        }

        $this->amount = $amount;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(?string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public static function fromData(array $data): self
    {
        return self::hydrateFromMap(new self, [
            'amount' => 'setAmount',
            'currency' => 'setCurrency',
        ], $data);
    }
}
