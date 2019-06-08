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

namespace Sylius\Bundle\OrderBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Form\FormBuilderInterface;

class CartItemType extends AbstractResourceType
{
    /** @var DataMapperInterface */
    private $dataMapper;

    public function __construct(
        string $dataClass,
        array $validationGroups = [],
        DataMapperInterface $dataMapper
    ) {
        parent::__construct($dataClass, $validationGroups);

        $this->dataMapper = $dataMapper;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        //->add('quantity', ChoiceType::class, [
        // 'choices' => range(1,10,1),

        //    'label' => 'sylius.ui.quantity',
        //])
            ->add('quantity', IntegerType::class, [
               'attr' => ['max' => 10],
            'label' => 'sylius.ui.quantity',
            ])
            ->setDataMapper($this->dataMapper)
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'sylius_cart_item';
    }
}
