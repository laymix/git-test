<?php

declare(strict_types=1);

namespace App\Entity\Product;

use Doctrine\ORM\Mapping\MappedSuperclass;
use Doctrine\ORM\Mapping\Table;
use Sylius\Component\Product\Model\ProductAttributeValue as BaseProductAttributeValue;

/**
 * @MappedSuperclass
 * @Table(name="sylius_product_attribute_value")
 */
class ProductAttributeValue extends BaseProductAttributeValue
{
}
