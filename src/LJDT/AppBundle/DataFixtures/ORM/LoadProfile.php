<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadProfile.php

namespace LJDT\AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use LJDT\AppBundle\Entity\Profile;
use LJDT\AppBundle\Entity\Photo;

class LoadProfile implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $photo1 = new Photo();
        $photo1->setUrl('img/profil1.jpg');
        $photo1->setAlt('Image Profil N°1');

        $photo2 = new Photo();
        $photo2->setUrl('img/profil2.jpg');
        $photo2->setAlt('Image Profil N°2');

        $photo3 = new Photo();
        $photo3->setUrl('img/profil3.jpg');
        $photo3->setAlt('Image Profil N°3');

        $photo4 = new Photo();
        $photo4->setUrl('img/profil4.jpg');
        $photo4->setAlt('Image Profil N°4');

        $photo5 = new Photo();
        $photo5->setUrl('img/profil5.jpg');
        $photo5->setAlt('Image Profil N°5');

        $profile1 = new Profile();
        $profile1->setName('L\'école de la motte');
        $profile1->setDescription('Ecole primaire du village de la Motte dispose d\'une vaste cour de récréation gazonnée d\'un aménagement ludique et hormonieux mélant zone de jeu et zone de repos pour le bien être des enfants et des professeurs.');
        $profile1->setFacebook('https://www.facebook.com/');
        $profile1->setTwitter('https://twitter.com/');
        $profile1->setLinkedin('https://fr.linkedin.com/');
        $profile1->setPhoto($photo1);

        $profile2 = new Profile();
        $profile2->setName('La mairie de Vichy');
        $profile2->setDescription('La mairie de Vichy soucieuse des normes de sécurité fait appel à nous lors de ses travaux d\'élagage notre matèriel adapter nous permet de travailler en toute sécurité et aussi de garantir la sécurité des riverains.');
        $profile2->setFacebook('https://www.facebook.com/');
        $profile2->setTwitter('https://twitter.com/');
        $profile2->setLinkedin('https://fr.linkedin.com/');
        $profile2->setPhoto($photo2);

        $profile3 = new Profile();
        $profile3->setName('Le stade de Clermont');
        $profile3->setDescription('Le stade de Clermont fait régulierement appel à nous pour entretenir la pelouse, la mettre en valeur et rafraichir les marquages au sol. Tonte minutieuse et éclairage sont nécessaire avant les grandes occasions.');
        $profile3->setFacebook('https://www.facebook.com/');
        $profile3->setTwitter('https://twitter.com/');
        $profile3->setLinkedin('https://fr.linkedin.com/');
        $profile3->setPhoto($photo3);

        $profile4 = new Profile();
        $profile4->setName('L\'ambassade de Tunisie');
        $profile4->setDescription('L\'ambassade de Tunisie nécessite une attention toute particulière. Arborant une végétation issues d\'un climat chaud, notre savoir faire nous permet de les faire pousser sous un climat tempéré.');
        $profile4->setFacebook('https://www.facebook.com/');
        $profile4->setTwitter('https://twitter.com/');
        $profile4->setLinkedin('https://fr.linkedin.com/');
        $profile4->setPhoto($photo4);

        $manager->persist($profile1);
        $manager->persist($profile2);
        $manager->persist($profile3);
        $manager->persist($profile4);

        $manager->flush();
    }
}
