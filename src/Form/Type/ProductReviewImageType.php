<?php


namespace App\Form\Type;


use Sylius\Bundle\CoreBundle\Form\Type\ImageType;

class ProductReviewImageType extends ImageType
{

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'app_product_review_image';
    }
}
