<?php

declare(strict_types=1);

namespace App\Entity\Channel;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\MappedSuperclass;
use Doctrine\ORM\Mapping\Table;
use Sylius\Component\Core\Model\Channel as BaseChannel;
use Sylius\Component\Currency\Model\CurrencyInterface;

/**
 * @MappedSuperclass
 * @Table(name="sylius_channel")
 */
class Channel extends BaseChannel
{

}
