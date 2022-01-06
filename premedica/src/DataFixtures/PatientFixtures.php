<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Patient;

class PatientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $patient1 = new Patient();
        $patient1 -> setNom('dubois')
                 -> setPrenom('Charles')
                 -> setAge('32')
                 -> setEmail('patient@test.com')
                 -> setAdresse('12 rue des mouettes, 95130, paris')
                 -> setPassword('test');

        $patient2 = new Patient();
        $patient2 -> setNom('gueye')
                -> setPrenom('khady')
                -> setAge('21')
                -> setEmail('khady@test.com')
                -> setAdresse('12 rue des mouettes, 95130, paris')
                -> setPassword('test');


        $manager->persist($patient1);

        $manager->persist($patient2);

        $manager->flush();
    }
}
