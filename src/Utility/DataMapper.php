<?php

namespace Accu\Postmen\Utility;

class DataMapper
{
    public static function hydrateEntityFromMap(PostmenEntity $enitity, array $map, array $data = []): PostmenEntity
    {
        foreach ($map as $property => $setter) {
            if ($data[$property]) {
                $enitity->{$setter}($data[$property]);
            }
        }

        return $enitity;
    }
}
