<?php

namespace Odiseo\SyliusGeoPlugin\Form\Extension;

use Odiseo\SyliusGeoPlugin\Context\Geo\GeoContextInterface;
use Sylius\Bundle\AddressingBundle\Form\Type\AddressType;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\Form\AbstractTypeExtension;
use Sylius\Bundle\AddressingBundle\Form\Type\CountryCodeChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class AddressTypeExtension extends AbstractTypeExtension
{
    /**
     * @var GeoContextInterface
     */
    private $geoContext;

    /**
     * @var RepositoryInterface
     */
    private $countryRepository;

    /**
     * @param GeoContextInterface $geoContext
     * @param RepositoryInterface $countryRepository
     */
    public function __construct(GeoContextInterface $geoContext, RepositoryInterface $countryRepository)
    {
        $this->geoContext = $geoContext;
        $this->countryRepository = $countryRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $countryCode = $this->geoContext->getCountryCode();

        $country = $this->countryRepository->findOneByCode($countryCode);

        if ($countryCode) {
            $builder
                ->remove('lastName')
                ->remove('company')

                ->remove('city')

                ->remove('street')

                ->remove('postcode')


                ->remove('countryCode')

                ->add('countryCode', CountryCodeChoiceType::class, [
                    'label' => 'sylius.formfdfd.country',
                    'data' => $countryCode
                ]);
        }
    }

    /**
     * @inheritdoc
     */
    public function getExtendedType()
    {
        return AddressType::class;
    }
}
