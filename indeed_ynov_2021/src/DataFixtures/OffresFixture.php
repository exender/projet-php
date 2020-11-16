<?php

namespace App\DataFixtures;

use App\Entity\Contrats;
use App\Entity\Offres;
use App\Entity\Typecontrats;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class OffresFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        //contrat
        $cdd = new Contrats();
        $cdd->setName('CDD');
        $manager->persist($cdd);

        $cdi = new Contrats();
        $cdi->setName('CDI');
        $manager->persist($cdi);

        $freelance = new Contrats();
        $freelance->setName('FREELANCE');
        $manager->persist($freelance);

        //type_contrat
        $temps_plein = new Typecontrats();
        $temps_plein->setType('Temps Plein');
        $manager->persist($temps_plein);

        $temps_partiel = new Typecontrats();
        $temps_partiel->setType(' Temps partiel');
        $manager->persist($temps_partiel);

        //offres
        for ($i=0; $i < 25; $i++) { 
           $contrat = $faker->randomElement($Array = array($cdd , $freelance, $cdi));
           $debut_contrat = $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now');
           if ($contrat != $cdi) {
               $fin_de_mission = $faker->dateTimeBetween($startDate ='now',$endDate ='5 years');
           }
           else {
               $fin_de_mission = null;
           }
           $offre = new Offres();
           $offre->setTitre($faker->sentence($nbWords = 10, $variableNbWords = true))
                 ->setDescription($faker->paragraph($nbSentences = 5, $variableNbSentences = true))
                 ->setAdresse($faker->address)
                 ->setCodepostal(str_replace(' ', '', $faker->postcode))
                 ->setVille($faker->city)
                 ->setCreatedat($debut_contrat)
                 ->setUpdatedat($faker->dateTimeBetween($startDate = $debut_contrat, $endDate = 'now', $timezone = null))
                 ->setMissionend($fin_de_mission)
                 ->setContrat($contrat)
                 ->setTypecontrat($faker->randomElement($array = array($temps_plein, $temps_partiel)));
           $manager->persist($offre);     
        }    
        $manager->flush();
    }
}
/////////fafefazef