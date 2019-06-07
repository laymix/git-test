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
use Sylius\Component\User\Security\Generator\GeneratorInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Webmozart\Assert\Assert;

final class UserRegistraListener
{
    /** @var ObjectManager */
    private $userManager;




    public function __construct(ObjectManager $userManager) {
        $this->userManager = $userManager;
    }

    public function setUserRole(GenericEvent $event)
    {
        $customer = $event->getSubject();
        $user = $customer->getUser();
        if ($customer->IsVendor()){
            $user->addRole('ROLE_SELLER');
            $user->removeRole('ROLE_USER');



        }else{

            $user->setEnabled(true);

        }


        $this->userManager->persist($user);
        $this->userManager->flush();
    }

}
