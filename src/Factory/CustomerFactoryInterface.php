<?php


namespace App\Factory;
use Sylius\Component\Resource\Factory\FactoryInterface;

interface CustomerFactoryInterface extends FactoryInterface
{

    /**
     *
     * @throws \InvalidArgumentException
     */
    public function createSeller();

}
