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

namespace App\Context;

use App\Entity\Seller\Seller;
use Sylius\Component\Core\Model\ShopUserInterface;
use Sylius\Component\Customer\Context\CustomerContextInterface;
use App\Entity\Seller\Seller as BaseSeller;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

final class SellerContext implements SellerContextInterface
{
    /** @var TokenStorageInterface */
    private $tokenStorage;

    /** @var AuthorizationCheckerInterface */
    private $authorizationChecker;

    public function __construct(TokenStorageInterface $tokenStorage, AuthorizationCheckerInterface $authorizationChecker)
    {
        $this->tokenStorage = $tokenStorage;
        $this->authorizationChecker = $authorizationChecker;
    }

    /**
     * {@inheritdoc}
     */
    public function getSeller(): ?BaseSeller
    {
        if (null === $token = $this->tokenStorage->getToken()) {
            return null;
        }

        if ($this->authorizationChecker->isGranted('IS_AUTHENTICATED_REMEMBERED') && $token->getUser() instanceof Seller) {
            return $token->getSeller();
        }

        return null;
    }
}
