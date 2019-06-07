<?php

declare(strict_types=1);

namespace App\Entity\Customer;

use App\Entity\Shipping\Shipment;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\MappedSuperclass;
use Doctrine\ORM\Mapping\Table;
use Sylius\Component\Core\Model\Customer as BaseCustomer;
use Doctrine\ORM\Mapping as ORM;

/**
 * @MappedSuperclass
 * @Table(name="sylius_customer")
 */
class Customer extends BaseCustomer
{
    /** @var bool */
    private $vendor = false;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Shipping\Shipment", mappedBy="customer")
     */
    private $shipments;

    public function __construct()
    {
        parent::__construct();
        $this->shipments = new ArrayCollection();
    }




    public function isVendor(): bool
    {
        return $this->vendor;
    }

    public function setVendor(bool $vendor): void
    {
        $this->vendor = $vendor;
    }

    /**
     * @return Collection|Shipment[]
     */
    public function getShipments(): Collection
    {
        return $this->shipments;
    }

    public function addShipment(Shipment $shipment): self
    {
        if (!$this->shipments->contains($shipment)) {
            $this->shipments[] = $shipment;
            $shipment->setCustomer($this);
        }

        return $this;
    }

    public function removeShipment(Shipment $shipment): self
    {
        if ($this->shipments->contains($shipment)) {
            $this->shipments->removeElement($shipment);
            // set the owning side to null (unless already changed)
            if ($shipment->getCustomer() === $this) {
                $shipment->setCustomer(null);
            }
        }

        return $this;
    }




}
