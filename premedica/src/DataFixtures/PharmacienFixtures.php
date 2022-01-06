<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Pharmacien;
use App\Entity\Etablissement;

class PharmacienFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $etablissement2 = new Etablissement();
        $etablissement2 -> setNom('PHARMACIE LAFABLETTE')
                -> setAdresse('12 rue des mouettes, 95130, paris')
                -> setTelephone('096546644');

        $manager->persist($etablissement2);

        $pharmacien1 = new Pharmacien();
        $pharmacien1 -> setNom('Moron')
                 -> setPrenom('Manon')
                 -> setEmail('pharmacien@test.com')
                 -> setTelephone('065354654')
                 -> setPassword('test')
                 -> setIdEtablissement($etablissement2);

        $pharmacien2 = new Pharmacien();
        $pharmacien2 -> setNom('DuRegard')
                -> setPrenom('Paul')
                -> setEmail('pharmacien2@test.com')
                -> setTelephone('065354654')
                -> setPassword('test')
                -> setIdEtablissement($etablissement2);


        $manager->persist($pharmacien1);

        $manager->persist($pharmacien2);

        $manager->flush();
    }
}
