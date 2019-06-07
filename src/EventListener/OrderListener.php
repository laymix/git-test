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

namespace App\EventListener;

use Doctrine\Common\Persistence\ObjectManager;
use Sylius\Bundle\UserBundle\Security\UserLoginInterface;
use Sylius\Bundle\UserBundle\UserEvents;
use Sylius\Component\Channel\Context\ChannelContextInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Model\CustomerInterface;
use Sylius\Component\Core\Model\ShopUserInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Sylius\Component\User\Security\Generator\GeneratorInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Webmozart\Assert\Assert;

final class OrderListener
{
    /** @var ObjectManager */
    private $userManager;
    /** @var RepositoryInterface */
    private $channelRepository;

    /** @var RepositoryInterface */
    private $currencyRepository;


    public function __construct(ObjectManager $userManager,RepositoryInterface $channelRepository,RepositoryInterface $currencyRepository) {
        $this->userManager = $userManager;
        $this->channelRepository=$channelRepository;
        $this->currencyRepository=$currencyRepository;
    }

    public function setChannelOrder(GenericEvent $event)
    {
        $order = $event->getSubject();
        $channel=$this->channelRepository->findOneBy(array('code'=>'WEB_EU'));
        $currency=$this->channelRepository->findOneBy(array('code'=>'XOF'));

        $order->setChannel($currency);



        $this->userManager->persist($order);
        $this->userManager->flush();
    }

}
