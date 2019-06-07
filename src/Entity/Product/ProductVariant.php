<?php

declare(strict_types=1);

namespace App\Entity\Product;

use Doctrine\ORM\Mapping\MappedSuperclass;
use Doctrine\ORM\Mapping\Table;
//use Sylius\Component\Core\Model\ProductVariant as BaseProductVariant;
use Sylius\Component\Product\Model\ProductVariantTranslationInterface;
use Brille24\SyliusTierPricePlugin\Entity\ProductVariant as BaseProductVariant;

/**
 * @MappedSuperclass
 * @Table(name="sylius_product_variant")
 */
class ProductVariant extends BaseProductVariant
{

    protected function createTranslation(): ProductVariantTranslationInterface
    {
        return new ProductVariantTranslation();
    }
}
