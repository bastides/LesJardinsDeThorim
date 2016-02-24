<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadGallery.php

namespace LJDT\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use LJDT\AppBundle\Entity\Gallery;
use LJDT\AppBundle\Entity\Photo;

class LoadGallery implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $photo1 = new Photo();
        $photo1->setUrl('img/galerie1.jpg');
        $photo1->setAlt('Image Galerie N°1');
        
        $photo2 = new Photo();
        $photo2->setUrl('img/galerie2.jpg');
        $photo2->setAlt('Image Galerie N°2');
        
        $photo3 = new Photo();
        $photo3->setUrl('img/galerie3.jpg');
        $photo3->setAlt('Image Galerie N°3');
        
        $photo4 = new Photo();
        $photo4->setUrl('img/galerie4.jpg');
        $photo4->setAlt('Image Galerie N°4');
        
        $photo5 = new Photo();
        $photo5->setUrl('img/galerie5.jpg');
        $photo5->setAlt('Image Galerie N°5');
        
        $gallery1 = new Gallery();
        $gallery1->setTitle('Galerie N°1');
        $gallery1->setPhoto($photo1);
        
        $gallery2 = new Gallery();
        $gallery2->setTitle('Galerie N°2');
        $gallery2->setPhoto($photo2);
        
        $gallery3 = new Gallery();
        $gallery3->setTitle('Galerie N°3');
        $gallery3->setPhoto($photo3);
        
        $gallery4 = new Gallery();
        $gallery4->setTitle('Galerie N°4');
        $gallery4->setPhoto($photo4);
        
        $gallery5 = new Gallery();
        $gallery5->setTitle('Galerie N°5');
        $gallery5->setPhoto($photo5);
        
        $manager->persist($gallery1);
        $manager->persist($gallery2);
        $manager->persist($gallery3);
        $manager->persist($gallery4);
        $manager->persist($gallery5);
      
        $manager->flush();
    }
}