<?php
/**
 * This file is part of the Brille24 tierprice plugin.
 *
 * (c) Brille24 GmbH
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Brille24\SyliusTierPricePlugin\Form;

use Brille24\SyliusTierPricePlugin\Entity\TierPrice;
use Sylius\Bundle\ChannelBundle\Form\Type\ChannelChoiceType;
use Sylius\Bundle\MoneyBundle\Form\Type\MoneyType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

class TierPriceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('qty', NumberType::class, [
            'label'       => 'sylius.ui.amount',
            'required'    => true,
            'constraints' => [
                new Range([
                  'min'        => 0,
                  'groups'     => 'sylius',
                  'minMessage' => 'Quantity has to be positive',
                ]),
                new NotBlank(['groups' => 'sylius']),
            ],
        ]);

        $builder->add('price', MoneyType::class, [
            'required' => true,
            'currency' => $options['currency'],
            'label' => false
        ]);
        $builder->add('priceuro', MoneyType::class, [
            'required' => true,
            'currency' => 'EUR',
        ]);
        $builder->add('channel', ChannelChoiceType::class, [
            'attr'        => ['style' => 'display:none'],
            'constraints' => [
                new NotBlank(['groups' => 'sylius']),
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setRequired(['currency']);
        $resolver->setDefaults([
           'data_class' => TierPrice::class,
           'currency'   => 'XOF',
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'brille24_tier_price';
    }
}
