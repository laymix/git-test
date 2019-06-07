<?php


namespace App\Repository;


use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Sylius\Component\Core\Model\OrderInterface;

class CustomerRepository extends \Sylius\Bundle\CoreBundle\Doctrine\ORM\CustomerRepository
{
    /**
     * {@inheritdoc}
     */
    public function createsellerListQueryBuilder(): QueryBuilder
    {
        $roler="ROLE_SELLER";
        return $this->createQueryBuilder('o')
            ->innerJoin('o.user', 'user')
            ->andWhere('user.roles LIKE :role')
            ->setParameter('role','%"' . $roler . '"%');
    }
    /**
     * {@inheritdoc}
     */
    public function createcustomerListQueryBuilder(): QueryBuilder
    {
        $roler="ROLE_SELLER";
        return $this->createQueryBuilder('o')
            ->innerJoin('o.user', 'user')
            ->andWhere('user.roles not LIKE :role')
            ->setParameter('role','%"' . $roler . '"%');
    }
}
