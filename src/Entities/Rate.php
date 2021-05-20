<?php

namespace Accu\Postmen\Entities;

use Accu\Postmen\Schema\JsonSchema;
use Accu\Postmen\Utility\PostmenEntity;

/**
 * Rate.
 *
 * Quotes for delivery services
 *
 * @see https://docs.postmen.com/api.html#rate-type
 */
final class Rate extends PostmenEntity
{
    use JsonSchema;

    public const JSON_SCHEMA = '/rate_type';

    /** @var Weight Charge weight */
    private $charge_weight;

    /** @var Money Charge for this rate */
    private $total_charge;

    /** @var SimpleShipperAccount Simplified shipper info */
    private $shipper_account;

    /** @var string Service type */
    private $service_type;

    /** @var string Service name */
    private $service_name;

    /** @var string Pickup deadline */
    private $pickup_deadline;

    /** @var string */
    private $booking_cut_off;

    /** @var string */
    private $delivery_date;

    /** @var int Number of days in transit */
    private $transit_time;

    /** @var DetailedCharge[] */
    private $detailed_charges = [];

    /** @var string */
    private $error_message;

    /** @var string */
    private $info_message;

    public function getChargeWeight(): ?Weight
    {
        return $this->charge_weight;
    }

    public function setChargeWeight(?Weight $charge_weight): self
    {
        $this->charge_weight = $charge_weight;

        return $this;
    }

    public function getTotalCharge(): ?Money
    {
        return $this->total_charge;
    }

    public function setTotalCharge(?Money $total_charge): self
    {
        $this->total_charge = $total_charge;

        return $this;
    }

    public function getSimpleShipperAccount(): ?SimpleShipperAccount
    {
        return $this->shipper_account;
    }

    public function setSimpleShipperAccount(?SimpleShipperAccount $simple_shipper_account): self
    {
        $this->shipper_account = $simple_shipper_account;

        return $this;
    }

    public function getServiceType(): ?string
    {
        return $this->service_type;
    }

    public function setServiceType(?string $service_type): self
    {
        $this->service_type = $service_type;

        return $this;
    }

    public function getServiceName(): ?string
    {
        return $this->service_name;
    }

    public function setServiceName(?string $service_name): self
    {
        $this->service_name = $service_name;

        return $this;
    }

    public function getPickupDeadline(): ?string
    {
        return $this->pickup_deadline;
    }

    public function setPickupDeadline(?string $pickup_deadline): self
    {
        $this->pickup_deadline = $pickup_deadline;

        return $this;
    }

    public function getBookingCutOff(): ?string
    {
        return $this->booking_cut_off;
    }

    public function setBookingCutOff(?string $booking_cut_off): self
    {
        $this->booking_cut_off = $booking_cut_off;

        return $this;
    }

    public function getDeliveryDate(): ?string
    {
        return $this->delivery_date;
    }

    public function setDeliveryDate(?string $delivery_date): self
    {
        $this->delivery_date = $delivery_date;

        return $this;
    }

    public function getTransitTime(): ?int
    {
        return $this->transit_time;
    }

    public function setTransitTime(?int $transit_time): self
    {
        $this->transit_time = $transit_time;

        return $this;
    }

    /**
     * @return DetailedCharge[]
     */
    public function getDetailedCharges(): array
    {
        return $this->detailed_charges;
    }

    public function addDetailedCharge(?DetailedCharge $detailed_charge): self
    {
        $this->detailed_charges[] = $detailed_charge;

        return $this;
    }

    public function getErrorMessage(): ?string
    {
        return $this->error_message;
    }

    public function setErrorMessage(?string $error_message): self
    {
        $this->error_message = $error_message;

        return $this;
    }

    public function getInfoMessage(): ?string
    {
        return $this->info_message;
    }

    public function setInfoMessage(?string $info_message): self
    {
        $this->info_message = $info_message;

        return $this;
    }

    public static function fromData(array $data): self
    {
        $rate = (new self)
            ->setSimpleShipperAccount(
                SimpleShipperAccount::fromData($data['shipper_account'] ?? [])
            );

        if ($data['charge_weight'] ?? false) {
            $rate->setChargeWeight(Weight::fromData($data['charge_weight']));
        }

        if ($data['total_charge'] ?? false) {
            $rate->setTotalCharge(Money::fromData($data['total_charge']));
        }

        foreach ($data['detailed_charges'] ?? [] as $detailed_charge) {
            $rate->addDetailedCharge(DetailedCharge::fromData($detailed_charge));
        }

        return self::hydrateFromMap($rate, [
            'service_type' => 'setServiceType',
            'service_name' => 'setServiceName',
            'pickup_deadline' => 'setPickupDeadline',
            'booking_cut_off' => 'setBookingCutoff',
            'delivery_date' => 'setDeliveryDate',
            'transit_time' => 'setTransitTime',
            'error_message' => 'setErrorMessage',
            'info_message' => 'setInfoMessage',
        ], $data);
    }
}
