<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Medecin;
use App\Entity\Etablissement;

class MedecinFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $etablissement = new Etablissement();
        $etablissement -> setNom('clinique les feuilles')
                 -> setTelephone('096546644')
                 -> setAdresse('12 rue des mouettes, 95130, paris');

        $manager->persist($etablissement);

        $medecin1 = new Medecin();
        $medecin1 -> setNom('lemon')
                 -> setPrenom('remi')
                 -> setEmail('medecin@test.com')
                 -> setTelephone('065354654')
                 -> setPassword('test')
                 -> setIdEtablissement($etablissement);

        $medecin2 = new Medecin();
        $medecin2 -> setNom('Michelle')
                -> setPrenom('Loli')
                -> setEmail('medecin2@test.com')
                -> setTelephone('065354654')
                -> setPassword('test')
                -> setIdEtablissement($etablissement);


        $manager->persist($medecin1);

        $manager->persist($medecin2);

        $manager->flush();
    }
}
