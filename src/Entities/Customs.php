<?php

namespace Accu\Postmen\Entities;

use Accu\Postmen\Entities\Customs\CustomsType;
use Accu\Postmen\Schema\JsonSchema;
use Accu\Postmen\Utility\PostmenEntity;

/**
 * Customs object which stores information related to shipping to another country.
 *
 * @see https://docs.postmen.com/api.html#customs
 */
final class Customs extends PostmenEntity
{
    use JsonSchema;

    public const JSON_SCHEMA = '/customs';

    /** @var Billing */
    private $billing;

    /** @var string */
    private $terms_of_trade;

    /** @var string */
    private $purpose;

    /** @var CustomsType Electronic Export Information */
    private $eei;

    /** @var Address */
    private $importer_address;

    /** @var Passport */
    private $passport;

    public function getPurpose(): string
    {
        return $this->purpose;
    }

    public function setPurpose(string $purpose): self
    {
        $this->purpose = $purpose;

        return $this;
    }

    public function getTermsOfTrade(): string
    {
        return $this->terms_of_trade;
    }

    public function setTermsOfTrade(string $terms_of_trade): self
    {
        $this->terms_of_trade = $terms_of_trade;

        return $this;
    }

    public function getEei(): ?CustomsType
    {
        return $this->eei;
    }

    public function setEei(CustomsType $customsType): self
    {
        $this->eei = $customsType;

        return $this;
    }

    public function getBilling(): Billing
    {
        return $this->billing;
    }

    public function setBilling(Billing $billing): self
    {
        $this->billing = $billing;

        return $this;
    }

    public function getImporterAddress(): Address
    {
        return $this->importer_address;
    }

    public function setImporterAddress(Address $importer_address): self
    {
        $this->importer_address = $importer_address;

        return $this;
    }

    public function getPassport(): ?Passport
    {
        return $this->passport;
    }

    public function setPassport(Passport $passport): self
    {
        $this->passport = $passport;

        return $this;
    }
}
