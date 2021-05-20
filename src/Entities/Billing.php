<?php

namespace Accu\Postmen\Entities;

use Accu\Postmen\Schema\JsonSchema;
use Accu\Postmen\Utility\PostmenEntity;

/**
 * @see https://docs.postmen.com/api.html#billing
 */
final class Billing extends PostmenEntity
{
    use JsonSchema;

    public const JSON_SCHEMA = '/billing';

    /** @var string */
    private $paid_by;

    public function getPaidBy(): string
    {
        return $this->paid_by;
    }

    public function setPaidBy(string $paid_by): self
    {
        $this->paid_by = $paid_by;

        return $this;
    }
}
