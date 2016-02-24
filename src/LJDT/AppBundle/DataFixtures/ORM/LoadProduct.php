<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadProduct.php

namespace LJDT\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use LJDT\AppBundle\Entity\Product;
use LJDT\AppBundle\Entity\Photo;

class LoadProduct implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $photo1 = new Photo();
        $photo1->setUrl('img/produit1.jpg');
        $photo1->setAlt('Image Produit N°1');
        
        $photo2 = new Photo();
        $photo2->setUrl('img/produit2.jpg');
        $photo2->setAlt('Image Produit N°2');
        
        $photo3 = new Photo();
        $photo3->setUrl('img/produit1.jpg');
        $photo3->setAlt('Image Produit N°3');
        
        $photo4 = new Photo();
        $photo4->setUrl('img/produit2.jpg');
        $photo4->setAlt('Image Produit N°4');
        
        $photo5 = new Photo();
        $photo5->setUrl('img/produit1.jpg');
        $photo5->setAlt('Image Produit N°5');
        
        $product1 = new Product();
        $product1->setName('Entretien');
        $product1->setDescription('Cette formule comprend : les soins, la taille, l\'élagage, l\'arrosage et les traitements phytosanitaires (contrat d\'entretien possible).');
        $product1->setPhoto($photo1);
        
        $product2 = new Product();
        $product2->setName('Entretien Plus');
        $product2->setDescription('Cette formule comprend : les soins, la taille, l\'élagage, l\'arrosage les traitements phytosanitaires, l\'engazonnement, ainsi que la pose de plantes de saison.');
        $product2->setPhoto($photo2);
        
        $product3 = new Product();
        $product3->setName('Aménagement');
        $product3->setDescription('Cette formule comprend : la création complète de votre espace vert, l\'évolution au fil des saisons, une mise en valeur à l\'aide d\'éclairages, un arrosage automatique, ainsi qu\'un entretien régulier.');
        $product3->setPhoto($photo3);
        
        $manager->persist($product1);
        $manager->persist($product2);
        $manager->persist($product3);
      
        $manager->flush();
    }
}