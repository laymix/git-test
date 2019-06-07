<?php

declare(strict_types=1);

namespace App\Entity\Shipping;

use App\Entity\Customer\Customer;
use Doctrine\ORM\Mapping\MappedSuperclass;
use Doctrine\ORM\Mapping\Table;
use Sylius\Component\Core\Model\Shipment as BaseShipment;
use Doctrine\ORM\Mapping as ORM;

/**
 * @MappedSuperclass
 * @Table(name="sylius_shipment")
 */
class Shipment extends BaseShipment
{
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Customer\Customer", inversedBy="shipments")
     */
    private $customer;

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }
}
