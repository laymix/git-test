<?php


namespace App\Menu;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;


final class SellerMenuListener
{
    /**
     * @param MenuBuilderEvent $event
     */
    public function addSellerMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $menu
            ->addChild('new', ['route' => 'sylius_shop_account_dashboard'])
            ->setLabel('Custom Account Menu Item')
            ->setLabelAttribute('icon', 'star')
        ;
    }
}
