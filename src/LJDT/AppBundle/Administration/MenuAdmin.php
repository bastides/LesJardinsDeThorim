<?php
// src/LJDT/AppBundle/Administration/MenuAdmin.php

namespace LJDT\AppBundle\Administration;

use Doctrine\ORM\EntityManagerInterface;

class MenuAdmin
{
  /**
   * @var EntityManagerInterface
   */
  private $em;

  // On injecte l'EntityManager
  public function __construct(EntityManagerInterface $em)
  {
    $this->em = $em;
  }

  public function menu($limit)
  {
      $listProducts = $this->em->getRepository('LJDTAppBundle:Product')->myFindBy($limit);
      $listProfiles = $this->em->getRepository('LJDTAppBundle:Profile')->myFindBy($limit);
      $listGalleries = $this->em->getRepository('LJDTAppBundle:Gallery')->myFindBy($limit);

      return $queries = Array(
        'listProducts' => $listProducts,
        'listProfiles' => $listProfiles,
        'listGalleries' => $listGalleries
      );
  }
}
