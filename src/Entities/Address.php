<?php

namespace Accu\Postmen\Entities;

use Accu\Postmen\Schema\JsonSchema;
use Accu\Postmen\Utility\PostmenEntity;

/**
 * Address.
 *
 * represents address, it is used as ship from and ship to address
 *
 * @see https://docs.postmen.com/api.html#ship-from-address
 */
final class Address extends PostmenEntity
{
    use JsonSchema;

    public const JSON_SCHEMA = '/address';

    /** @var string Contact name of the address */
    private $contact_name;

    /** @var string */
    private $company_name;

    /** @var string */
    private $street1;

    /** @var string */
    private $street2;

    /** @var string */
    private $street3;

    /** @var string */
    private $city;

    /** @var string */
    private $state;

    /** @var string */
    private $postal_code;

    /** @var string Country in ISO 3166-1 alpha 3 code */
    private $country;

    /** @var string Contact phone of address */
    private $phone;

    /** @var string Fax number of address */
    private $fax;

    /** @var string */
    private $email;

    /** @var string Type of address */
    private $type;

    /** @var string */
    private $tax_id;

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getContactName(): ?string
    {
        return $this->contact_name;
    }

    public function setContactName(?string $contact_name): self
    {
        $this->contact_name = $contact_name;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->company_name;
    }

    public function setCompanyName(?string $company_name): self
    {
        $this->company_name = $company_name;

        return $this;
    }

    public function getStreet1(): ?string
    {
        return $this->street1;
    }

    public function setStreet1(?string $street1): self
    {
        $this->street1 = $street1;

        return $this;
    }

    public function getStreet2(): ?string
    {
        return $this->street2;
    }

    public function setStreet2(?string $street2): self
    {
        $this->street2 = $street2 ?: null;

        return $this;
    }

    public function getStreet3(): ?string
    {
        return $this->street3;
    }

    public function setStreet3(?string $street3): self
    {
        $this->street3 = $street3 ?: null;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postal_code;
    }

    public function setPostalCode(?string $postal_code): self
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getType(): string
    {
        return $this->type ?? 'business';
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTaxId(): ?string
    {
        return $this->tax_id;
    }

    public function setTaxId(?string $tax_id): self
    {
        $this->tax_id = $tax_id;

        return $this;
    }

    public static function fromData(array $data): self
    {
        return self::hydrateFromMap(new self, [
            'country' => 'setCountry',
            'contact_name' => 'setContactName',
            'phone' => 'setPhone',
            'fax' => 'setFax',
            'email' => 'setEmail',
            'company_name' => 'setCompanyName',
            'street1' => 'setStreet1',
            'street2' => 'setStreet2',
            'street3' => 'setStreet3',
            'city' => 'setCity',
            'state' => 'setState',
            'postal_code' => 'setPostalCode',
            'type' => 'setType',
            'tax_id' => 'setTaxId',
        ], $data);
    }
}
