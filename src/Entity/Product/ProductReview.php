<?php

declare(strict_types=1);

namespace App\Entity\Product;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\MappedSuperclass;
use Doctrine\ORM\Mapping\Table;
use Sylius\Component\Core\Model\ImageInterface;
use Sylius\Component\Core\Model\ImagesAwareInterface;
use Sylius\Component\Core\Model\ProductReview as BaseProductReview;
use App\Entity\Product\ProductReviewImage;
use Doctrine\ORM\Mapping as ORM;

/**
 * @MappedSuperclass
 * @Table(name="sylius_product_review")
 */
class ProductReview extends BaseProductReview implements ImagesAwareInterface
{



    // ...
    /**
     * @var Collection|ImageInterface[]
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="ProductReviewImage", mappedBy="productreview")
     */
    protected $images;

    public function __construct()
    {
        parent::__construct();

        $this->images = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function getImages():Collection
    {
        return $this->images;
    }

    /**
     * {@inheritdoc}
     */
    public function getImagesByType(string $type): Collection
    {
        return $this->images->filter(function (ImageInterface $image) use ($type) {
            return $type === $image->getType();
        });
    }

    /**
     * {@inheritdoc}
     */
    public function hasImages(): bool
    {
        return !$this->images->isEmpty();
    }

    /**
     * {@inheritdoc}
     */
    public function hasImage(ImageInterface $image): bool
    {
        return $this->images->contains($image);
    }

    /**
     * {@inheritdoc}
     */
    public function addImage(ImageInterface $image): void
    {
        $image->setOwner($this);
        $this->images->add($image);
    }

    /**
     * {@inheritdoc}
     */
    public function removeImage(ImageInterface $image): void
    {
        if ($this->hasImage($image)) {
            $image->setOwner(null);
            $this->images->removeElement($image);
        }
    }
}
