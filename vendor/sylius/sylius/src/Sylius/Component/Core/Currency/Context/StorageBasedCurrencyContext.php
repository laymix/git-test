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

namespace Sylius\Component\Core\Currency\Context;

use Odiseo\SyliusGeoPlugin\Context\Geo\GeoContextInterface;
use Sylius\Component\Channel\Context\ChannelContextInterface;
use Sylius\Component\Core\Currency\CurrencyStorageInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Currency\Context\CurrencyContextInterface;
use Sylius\Component\Currency\Context\CurrencyNotFoundException;
use Sylius\Component\Resource\Repository\RepositoryInterface;

final class StorageBasedCurrencyContext implements CurrencyContextInterface
{
    /** @var ChannelContextInterface */
    private $channelContext;

    /** @var CurrencyStorageInterface */
    private $currencyStorage;
    /**
     * @var GeoContextInterface
     */
    private $geoContext;
    /**
     * @var RepositoryInterface
     */
    private $countryRepository;

    public function __construct(ChannelContextInterface $channelContext, CurrencyStorageInterface $currencyStorage)
    {
        $this->channelContext = $channelContext;
        $this->currencyStorage = $currencyStorage;
        
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrencyCode(): string
    {
        /** @var ChannelInterface $channel */
        $channel = $this->channelContext->getChannel();
       // $code='';

        $currencyCode = $this->currencyStorage->get($channel);
       // $countryCode = $this->geoContext->getCountryCode();
        //$country = $this->countryRepository->findOneByCode($countryCode);
       
        if (null === $currencyCode) {
            throw new CurrencyNotFoundException();
        }

        return $currencyCode;
    }
}
