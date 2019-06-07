<?php

namespace App\Entity\Product;

use Sylius\Component\Core\Model\Image;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Product\ProductReviewImageRepository")
 */
class ProductReviewImage extends Image
{
    // ...
    /**
     * Many features have one product. This is the owning side.
     * @ORM\ManyToOne(targetEntity="ProductReview", inversedBy="images")
     * @ORM\JoinColumn(name="productreview_id", referencedColumnName="id",nullable=True)
     */
    protected $productreview;
}
