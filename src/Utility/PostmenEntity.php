<?php

namespace Accu\Postmen\Utility;

use JsonSerializable;

abstract class PostmenEntity implements JsonSerializable
{
    public static function fromData(array $data): self
    {
        return new static;
    }

    public static function hydrateFromMap(self $enitity, array $map, array $data = []): self
    {
        foreach ($map as $property => $setter) {
            if (isset($data[$property]) && $data[$property]) {
                $enitity->{$setter}($data[$property]);
            }
        }

        return $enitity;
    }
}
