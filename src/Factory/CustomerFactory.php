<?php


namespace App\Factory;
use Sylius\Component\Product\Model\ProductInterface;
use Sylius\Component\Resource\Factory\Factory as BaseFactory;;
use Sylius\Component\Resource\Factory\FactoryInterface;
use App\Entity\Customer\Customer;
use Sylius\Component\Customer\Model\CustomerInterface;
use App\Entity\User\ShopUser;
use App\Factory\CustomerFactoryInterface as BaseFactoryInt;
use Sylius\Component\Core\Model\ShopUserInterface;
use Sylius\Bundle\CoreBundle\Fixture\OptionsResolver\LazyOption;
use Sylius\Component\Customer\Model\CustomerGroupInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
class CustomerFactory implements BaseFactoryInt
{
    /** @var BaseFactoryInt */
    private $customerFactory;
    /** @var BaseFactory */
    private $userFactory;

    private $id=0;

    public function __construct(
        FactoryInterface $factory,
        FactoryInterface $variantFactory
    ) {
        $this->customerFactory = $factory;
        $this->userFactory = $variantFactory;
    }



    /*

    /**
     * {@inheritdoc}
     */
    public function createNew():CustomerInterface
    {
       //$this->decoratedFactory= new BaseFactory(Customer::class);

        $customer= $this->customerFactory->createNew();

        return $customer;



    }
    public function createNewCustomer():CustomerInterface
    {
        //$this->decoratedFactory= new BaseFactory(Customer::class);

        $customer= $this->customerFactory->createNew();
        $customer->setVendor(false);

        return $customer;



    }



    /**
     * {@inheritdoc}
     */
    public function createSeller():CustomerInterface
    {
    $customer= $this->customerFactory->createNew();
    $user=$this->userFactory->createNew();
    //$user->removeRole(ShopUser::DEFAULT_ROLE);
        //$user->addRole('ROLE_ADMINISTRATION_ACCESS');
        $customer->setVendor(true);
        //$user->addRole('ROLE_SELLER');
        //$customer->setEmail('tesLtoo@snn.sn');
        //$customer->setUser($user);
        //$user->setPlainPassword("JLJDLKSJ");
        //$customer->setFirstname($user->getPlainPassword());
        return $customer;


    }

}
