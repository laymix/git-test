<?php
/**
 * This file is part of the Brille24 tierprice plugin.
 *
 * (c) Brille24 GmbH
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Brille24\SyliusTierPricePlugin\Services;

use Brille24\SyliusTierPricePlugin\Traits\TierPriceableInterface;
use Odiseo\SyliusGeoPlugin\Context\Geo\GeoContextInterface;
use Sylius\Component\Core\Calculator\ProductVariantPriceCalculatorInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

final class ProductVariantPriceCalculator implements ProductVariantPriceCalculatorInterface
{
    /**
     * @var ProductVariantPriceCalculatorInterface
     */
    private $basePriceCalculator;
    /**
     * @var GeoContextInterface
     */
    private $geoContext;
    /**
     * @var RepositoryInterface
     */
    private $countryRepository;

    /** @var TierPriceFinderInterface */
    private $tierPriceFinder;

    public function __construct(
        ProductVariantPriceCalculatorInterface $basePriceCalculator,
        TierPriceFinderInterface $tierPriceFinder, GeoContextInterface $geoContext,
    RepositoryInterface $countryRepository
    ) {
        $this->basePriceCalculator = $basePriceCalculator;
        $this->tierPriceFinder     = $tierPriceFinder;
        $this->geoContext = $geoContext;
        $this->countryRepository = $countryRepository;




    }

    /**
     * Calculates the unit price of a product variant based on the context
     *
     * @param ProductVariantInterface $productVariant
     * @param array                   $context
     * The context has to have the following keys:
     * <ul>
     * <li>channel</li>
     * <li>quantity</li>
     * </ul>
     *
     * @return int
     */
    public function calculate(ProductVariantInterface $productVariant, array $context): int
    {
        $country="";

        // Return the base price if the quantity is not provided
        if (!array_key_exists('quantity', $context)) {
            return $this->basePriceCalculator->calculate($productVariant, $context);
        }

        // Find a tier price and return it
        if ($productVariant instanceof TierPriceableInterface) {
            $tierPrice = $this->tierPriceFinder->find($productVariant, $context['channel'], $context['quantity']);
            if ($tierPrice !== null) {
                if($context['shippingaddress'] !== null){
                $country= $context['shippingaddress']->getCountryCode();

                if($country == "SN"){
                  $tier=$tierPrice->getPrice();}
                 else{
                     $tier=$tierPrice->getPriceuro();

                    }  }
                else{
                        $countryCode = $this->geoContext->getCountryCode();
                        $country = $this->countryRepository->findOneByCode($countryCode);
                    if($country == "SN"){
                        $tier=$tierPrice->getPrice();}
                    else{

                        $tier=$tierPrice->getPriceuro();

                    }
                }


                return $tier;
            }
        }

        // Return the base price if there are no tier prices
        return $this->basePriceCalculator->calculate($productVariant, $context);
    }
}
