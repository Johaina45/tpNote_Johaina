<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Acteur extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        /*    $acteur1 = new Acteur();
            $acteur1->setNom('Dupont');
            $acteur1->setPrenom('Jean');
            $acteur1->setDateNaissance(new \DateTime('1990-05-15'));
            $acteur1->setRole('principal');
            $manager->persist($acteur1);*/

        $manager->flush();
    }
}
