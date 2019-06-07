<?php


namespace App\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    /**
     * @param MenuBuilderEvent $event
     */
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $newSubmenu = $menu
            ->addChild('new')
            ->setLabel('Vendeurs')
        ;

        $newSubmenu
            ->addChild('new-vendeur',['route' => 'app_admin_seller_index'])
            ->setLabel('Suivi des Vendeurs')
            ->setLabelAttribute('icon', 'users')

        ;


    }
}
