<?php


namespace App\Form\Extension;


use App\Form\Type\ProductReviewImageType;
use Sylius\Bundle\CoreBundle\Form\Type\Product\ProductReviewType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;

final class ProductReviewTypeExtension extends AbstractTypeExtension
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('images',CollectionType::class, [
            'entry_type' => ProductReviewImageType::class,
            'allow_add' => true,
            'allow_delete' => true,
            'by_reference' => false,
            'label' => 'Images',
        ]);
    }
    /**
     * Return the class of the type being extended.
     */
    public static function getExtendedTypes(): array
    {
        // return FormType::class to modify (nearly) every field in the system
        return [ProductReviewType::class];
    }


    /** {@inheritdoc} */
    public function getExtendedType(): string
    {
        return $this->getExtendedTypes()[0];
    }

}
