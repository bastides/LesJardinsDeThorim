<?php

namespace LJDT\AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * GalleryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GalleryRepository extends EntityRepository
{
    public function myFindBy($limit)
    {
        $queryBuilder = $this->_em->createQueryBuilder()
            ->select('g')
            ->from($this->_entityName, 'g')
            ->orderBy('g.id', 'asc')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
        ;

        return $queryBuilder;
    }
}
