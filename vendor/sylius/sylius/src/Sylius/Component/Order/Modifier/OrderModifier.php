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

namespace Sylius\Component\Order\Modifier;

use Sylius\Component\Order\Model\OrderInterface;
use Sylius\Component\Order\Model\OrderItemInterface;
use Sylius\Component\Order\Processor\OrderProcessorInterface;

final class OrderModifier implements OrderModifierInterface
{
    /** @var OrderProcessorInterface */
    private $orderProcessor;

    /** @var OrderItemQuantityModifierInterface */
    private $orderItemQuantityModifier;

    public function __construct(
        OrderProcessorInterface $orderProcessor,
        OrderItemQuantityModifierInterface $orderItemQuantityModifier
    ) {
        $this->orderProcessor = $orderProcessor;
        $this->orderItemQuantityModifier = $orderItemQuantityModifier;
    }

    /**
     * {@inheritdoc}
     */
    public function addToOrder(OrderInterface $order, OrderItemInterface $item): void
    {
        //$item->setUnitPrice(2875);

        $this->resolveOrderItem($order, $item);

        $this->orderProcessor->process($order);
    }

    /**
     * {@inheritdoc}
     */
    public function removeFromOrder(OrderInterface $order, OrderItemInterface $item): void
    {
        $order->removeItem($item);
        $this->orderProcessor->process($order);
    }

    private function resolveOrderItem(OrderInterface $order, OrderItemInterface $item): void
    {
        foreach ($order->getItems() as $existingItem) {
            if ($item->equals($existingItem)) {
               //    $item->setUnitPrice(2875);

                $this->orderItemQuantityModifier->modify(
                    $existingItem,
                    $existingItem->getQuantity() + $item->getQuantity()
                );

                return;
            }
        }
       // $item->setUnitPrice(2875);

        $order->addItem($item);
    }
}
