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

namespace App\Controller;

use FOS\RestBundle\View\View;
use Sylius\Bundle\CoreBundle\Controller\OrderController as BaseOrderController;
use Sylius\Bundle\ResourceBundle\Event\ResourceControllerEvent;
use Sylius\Component\Order\SyliusCartEvents;
use Sylius\Component\Resource\Exception\UpdateHandlingException;
use Sylius\Component\Resource\ResourceActions;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Validator\Constraints\EqualTo;
use Webmozart\Assert\Assert;

class OrderController extends BaseOrderController
{
    public function updateAction(Request $request): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);

        $this->isGrantedOr403($configuration, ResourceActions::UPDATE);
        $resource = $this->findOr404($configuration);

        $form = $this->resourceFormFactory->create($configuration, $resource);

        if (in_array($request->getMethod(), ['POST', 'PUT', 'PATCH'], true) && $form->handleRequest($request)->isValid()) {
            $resource = $form->getData();
            if($resource->getShippingAddress()){
                $country=$resource->getShippingAddress()->getCountryCode();
            if($country == "SN"){

                foreach($resource->getItems() as $item ){ 
                    $channel=$this->container->get('sylius.context.channel');
                   // $context= [];
                   // $context['channel']= $resource->getChannel();
                   // $context['quantity']=1;
                    $variant = $this->container->get('sylius.repository.product_variant')->findOneBy(['id'=>$item->getVariant()->getId()]);
                    $orderItem = $this->container->get('sylius.factory.order_item')->createNew();
                    $orderItem->setVariant($variant);

                    $this->container->get('sylius.order_item_quantity_modifier')->modify($orderItem, $item->getQuantity());
                    $resource->addItem($orderItem);
                    $this->container->get('sylius.order_processing.order_processor')->process($resource);


            //$newitem=$this->container->get('brille24_tier_price.tier_price_finder');       
            // $newitem=$this->container->get('sylius.repository.product_variant')->find([$item->getVariant()->getId,$channel,$item->getQuantity()]);
                     
                       
                      $resource->removeItem($item);
                     // $item->setUnitPrice(58656);
                      //$resource->addItem($item);
                }
                $resource->setCurrencyCode('XOF');

            }
            else{

                foreach($resource->getItems() as $item ){ 
                    $channel=$this->container->get('sylius.context.channel');
                   // $context= [];
                   // $context['channel']= $resource->getChannel();
                   // $context['quantity']=1;
                    $variant = $this->container->get('sylius.repository.product_variant')->findOneBy(['id'=>$item->getVariant()->getId()]);
                    $orderItem = $this->container->get('sylius.factory.order_item')->createNew();
                    $orderItem->setVariant($variant);

                    $this->container->get('sylius.order_item_quantity_modifier')->modify($orderItem, $item->getQuantity());
                    $resource->addItem($orderItem);
                    $this->container->get('sylius.order_processing.order_processor')->process($resource);


            //$newitem=$this->container->get('brille24_tier_price.tier_price_finder');       
            // $newitem=$this->container->get('sylius.repository.product_variant')->find([$item->getVariant()->getId,$channel,$item->getQuantity()]);
                     
                       
                      $resource->removeItem($item);
                     // $item->setUnitPrice(58656);
                      //$resource->addItem($item);
                }

                $resource->setCurrencyCode('EUR');

            }

            }

            /** @var ResourceControllerEvent $event */
            $event = $this->eventDispatcher->dispatchPreEvent(ResourceActions::UPDATE, $configuration, $resource);

            if ($event->isStopped() && !$configuration->isHtmlRequest()) {
                throw new HttpException($event->getErrorCode(), $event->getMessage());
            }
            if ($event->isStopped()) {
                $this->flashHelper->addFlashFromEvent($configuration, $event);

                if ($event->hasResponse()) {
                    return $event->getResponse();
                }

                return $this->redirectHandler->redirectToResource($configuration, $resource);
            }

            try {
                $this->resourceUpdateHandler->handle($resource, $configuration, $this->manager);
            } catch (UpdateHandlingException $exception) {
                if (!$configuration->isHtmlRequest()) {
                    return $this->viewHandler->handle(
                        $configuration,
                        View::create($form, $exception->getApiResponseCode())
                    );
                }

                $this->flashHelper->addErrorFlash($configuration, $exception->getFlash());

                return $this->redirectHandler->redirectToReferer($configuration);
            }

            $postEvent = $this->eventDispatcher->dispatchPostEvent(ResourceActions::UPDATE, $configuration, $resource);

            if (!$configuration->isHtmlRequest()) {
                $view = $configuration->getParameters()->get('return_content', false) ? View::create($resource, Response::HTTP_OK) : View::create(null, Response::HTTP_NO_CONTENT);

                return $this->viewHandler->handle($configuration, $view);
            }

            $this->flashHelper->addSuccessFlash($configuration, ResourceActions::UPDATE, $resource);

            if ($postEvent->hasResponse()) {
                return $postEvent->getResponse();
            }

            return $this->redirectHandler->redirectToResource($configuration, $resource);
        }

        if (!$configuration->isHtmlRequest()) {
            return $this->viewHandler->handle($configuration, View::create($form, Response::HTTP_BAD_REQUEST));
        }

        $initializeEvent = $this->eventDispatcher->dispatchInitializeEvent(ResourceActions::UPDATE, $configuration, $resource);
        if ($initializeEvent->hasResponse()) {
            return $initializeEvent->getResponse();
        }

        $view = View::create()
            ->setData([
                'configuration' => $configuration,
                'metadata' => $this->metadata,
                'resource' => $resource,
                $this->metadata->getName() => $resource,
                'form' => $form->createView(),
            ])
            ->setTemplate($configuration->getTemplate(ResourceActions::UPDATE . '.html'))
        ;

        return $this->viewHandler->handle($configuration, $view);
    }
    public function saveAction(Request $request): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);

        $this->isGrantedOr403($configuration, ResourceActions::UPDATE);
        $resource = $this->getCurrentCart();

        $form = $this->resourceFormFactory->create($configuration, $resource);

        if (in_array($request->getMethod(), ['POST', 'PUT', 'PATCH'], true) && $form->handleRequest($request)->isValid()) {
            $resource = $form->getData();

            if($resource->getChannel()->getCode()){
              //  foreach($resource->getItems() as $item){
                //    $resource->removeItem($item);
                
              //  }

            foreach($resource->getItems() as $item ){ 
                $channel=$this->container->get('sylius.context.channel');
               // $context= [];
               // $context['channel']= $resource->getChannel();
               // $context['quantity']=1;
                $variant = $this->container->get('sylius.repository.product_variant')->findOneBy(['id'=>$item->getVariant()->getId()]);
                $orderItem = $this->container->get('sylius.factory.order_item')->createNew();
                $orderItem->setVariant($variant);

                $this->container->get('sylius.order_item_quantity_modifier')->modify($orderItem, $item->getQuantity());
                $resource->addItem($orderItem);
                $this->container->get('sylius.order_processing.order_processor')->process($resource);

        //$newitem=$this->container->get('brille24_tier_price.tier_price_finder');       
        // $newitem=$this->container->get('sylius.repository.product_variant')->find([$item->getVariant()->getId,$channel,$item->getQuantity()]);
                 
                   
                  $resource->removeItem($item);
                 // $item->setUnitPrice(58656);
                  //$resource->addItem($item);
            }
            }
            $event = $this->eventDispatcher->dispatchPreEvent(ResourceActions::UPDATE, $configuration, $resource);

            if ($event->isStopped() && !$configuration->isHtmlRequest()) {
                throw new HttpException($event->getErrorCode(), $event->getMessage());
            }
            if ($event->isStopped()) {
                $this->flashHelper->addFlashFromEvent($configuration, $event);

                return $this->redirectHandler->redirectToResource($configuration, $resource);
            }

            if ($configuration->hasStateMachine()) {
                $this->stateMachine->apply($configuration, $resource);
            }

            $this->eventDispatcher->dispatchPostEvent(ResourceActions::UPDATE, $configuration, $resource);

            if (!$configuration->isHtmlRequest()) {
                return $this->viewHandler->handle($configuration, View::create(null, Response::HTTP_NO_CONTENT));
            }

            $this->getEventDispatcher()->dispatch(SyliusCartEvents::CART_CHANGE, new GenericEvent($resource));
            $this->manager->flush();

            $this->flashHelper->addSuccessFlash($configuration, ResourceActions::UPDATE, $resource);

            return $this->redirectHandler->redirectToResource($configuration, $resource);
        }

        if (!$configuration->isHtmlRequest()) {
            return $this->viewHandler->handle($configuration, View::create($form, Response::HTTP_BAD_REQUEST));
        }

        $view = View::create()
            ->setData([
                'configuration' => $configuration,
                $this->metadata->getName() => $resource,
                'form' => $form->createView(),
                'cart' => $resource,
            ])
            ->setTemplate($configuration->getTemplate(ResourceActions::UPDATE . '.html'))
        ;

        return $this->viewHandler->handle($configuration, $view);
    }

}
