<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Etablissement;

class EtablissementFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $etablissement = new Etablissement();
        $etablissement -> setNom('clinique les feuilles')
                 -> setTelephone('096546644')
                 -> setAdresse('12 rue des mouettes, 95130, paris');

        $etablissement2 = new Etablissement();
        $etablissement2 -> setNom('PHARMACIE LAFABLETTE')
                -> setAdresse('12 rue des mouettes, 95130, paris')
                -> setTelephone('096546644');


        $manager->persist($etablissement);

        $manager->persist($etablissement2);

        $manager->flush();
    }
}
