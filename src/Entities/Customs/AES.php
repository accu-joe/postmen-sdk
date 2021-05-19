<?php

namespace Accu\Postmen\Entities\Customs;

/**
 * Automated Export System.
 * @see https://docs.postmen.com/api.html#aes
 */
final class AES extends CustomsType
{
    public const JSON_SCHEMA = '/eei_aes';

    /** @var string */
    private $type = 'aes';

    /** @var string */
    private $itn_number;

    public function getItnNumber(): string
    {
        return $this->itn_number;
    }

    public function setItnNumber(string $itn_number): self
    {
        $this->itn_number = $itn_number;

        return $this;
    }
}
