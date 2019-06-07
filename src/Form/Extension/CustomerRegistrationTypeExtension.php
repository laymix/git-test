<?php


namespace App\Form\Extension;


use Sonata\Form\Type\BooleanType;
use Sylius\Bundle\CoreBundle\Form\Type\Customer\CustomerRegistrationType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final  class CustomerRegistrationTypeExtension extends AbstractTypeExtension
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

// Adding new fields works just like in the parent form type.
        //$builder->add('vendor', RadioType::class, [
        //    'attr' => ['readonly' => true],
       // ]);
    }
    /**
     * Return the class of the type being extended.
     */
    public static function getExtendedTypes(): iterable
    {
        // return FormType::class to modify (nearly) every field in the system
        return [CustomerRegistrationType::class];
    }


}
