<?php


namespace App\Form\Extension;


use App\Entity\TierPrice\TierPrice;
use Brille24\SyliusTierPricePlugin\Form\TierPriceType;
use Sylius\Bundle\ChannelBundle\Form\Type\ChannelChoiceType;
use Sylius\Bundle\CoreBundle\Form\Type\Customer\CustomerRegistrationType;
use Sylius\Bundle\MoneyBundle\Form\Type\MoneyType;
use Sylius\Bundle\ProductBundle\Form\Type\ProductVariantType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

final class TierPriceTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder->add('priceuro', MoneyType::class, [
            'label'    => 'sylius.ui.price',
            'required' => true,
            'currency' => 'XOF',
        ]);

    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setRequired(['currency']);
        $resolver->setDefaults([
            'currency'   => 'XOF',
        ]);
    }
    /**
     * Return the class of the type being extended.
     */
    public static function getExtendedTypes(): array
    {
        // return FormType::class to modify (nearly) every field in the system
        return [TierPriceType::class];
    }


    /** {@inheritdoc} */
    public function getExtendedType(): string
    {
        return $this->getExtendedTypes()[0];
    }

}
