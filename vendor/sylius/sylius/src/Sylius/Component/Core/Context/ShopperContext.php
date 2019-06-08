<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\Component\Core\Context;

use Odiseo\SyliusGeoPlugin\Context\Geo\GeoContextInterface;
use Sylius\Component\Channel\Context\ChannelContextInterface;
use Sylius\Component\Channel\Model\ChannelInterface;
use Sylius\Component\Currency\Context\CurrencyContextInterface;
use Sylius\Component\Customer\Context\CustomerContextInterface;
use Sylius\Component\Customer\Model\CustomerInterface;
use Sylius\Component\Locale\Context\LocaleContextInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Odiseo\SyliusGeoPlugin\Helper\IpGeolocalizationHelper;

/**
 * Should not be extended, final removed to make this class lazy.
 */
/* final */ class ShopperContext implements ShopperContextInterface
{
    /** @var ChannelContextInterface */
    private $channelContext;

    /** @var CurrencyContextInterface */
    private $currencyContext;

    /** @var LocaleContextInterface */
    private $localeContext;

    /** @var CustomerContextInterface */
    private $customerContext;
   
    /** @var IpGeolocalizationHelper $ipGeolocalizationHelper */
    protected $ipGeolocalizationHelper;
 
    /**
     * @var RepositoryInterface
     */
    private $countryRepository;

    public function __construct(
        ChannelContextInterface $channelContext,
        CurrencyContextInterface $currencyContext,
        LocaleContextInterface $localeContext,
        CustomerContextInterface $customerContext,IpGeolocalizationHelper $ipGeolocalizationHelper,
        RepositoryInterface $countryRepository
    ) {
        $this->channelContext = $channelContext;
        $this->currencyContext = $currencyContext;
        $this->localeContext = $localeContext;
        $this->customerContext = $customerContext;
        $this->ipGeolocalizationHelper = $ipGeolocalizationHelper;
        $this->countryRepository = $countryRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function getChannel(): ChannelInterface
    {
        return $this->channelContext->getChannel();
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrencyCode(): string
    {
        $code='';

        $countryCode =  $this->ipGeolocalizationHelper->getCountryCode();
        $country = $this->countryRepository->findOneByCode($countryCode);
        if($country == "sn"){
            $code="XOF";}
        else{

            $code="EUR";
        }
        return $code;
        //return $this->currencyContext->getCurrencyCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getLocaleCode(): string
    {
        return $this->localeContext->getLocaleCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomer(): ?CustomerInterface
    {
        return $this->customerContext->getCustomer();
    }
}
